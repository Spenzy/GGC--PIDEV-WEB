/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package services;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.l10n.ParseException;
import com.codename1.l10n.SimpleDateFormat;
import com.codename1.ui.events.ActionListener;
import entities.Commande;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class ServiceCommande {

    public ArrayList<Commande> commandes;
    
    public static ServiceCommande instance = null;
    public boolean resultOK;
    private ConnectionRequest req;
    
    private ServiceCommande() {
        req = new ConnectionRequest();
    }
    
    public static ServiceCommande getInstance() {
        if (instance == null) {
            instance = new ServiceCommande();
        }
        return instance;
    }
    
    public ArrayList<Commande> parseCommande(String jsonText) {
        try {
            commandes = new ArrayList<>();
            JSONParser j = new JSONParser();// Instanciation d'un objet JSONParser permettant le parsing du résultat json

            /*
                On doit convertir notre réponse texte en CharArray à fin de
            permettre au JSONParser de la lire et la manipuler d'ou vient 
            l'utilité de new CharArrayReader(json.toCharArray())
            
            La méthode parse json retourne une MAP<String,Object> ou String est 
            la clé principale de notre résultat.
            Dans notre cas la clé principale n'est pas définie cela ne veux pas
            dire qu'elle est manquante mais plutôt gardée à la valeur par defaut
            qui est root.
            En fait c'est la clé de l'objet qui englobe la totalité des objets 
                    c'est la clé définissant le tableau de tâches.
             */
            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));

            /* Ici on récupère l'objet contenant notre liste dans une liste 
            d'objets json List<MAP<String,Object>> ou chaque Map est une tâche.               
            
            Le format Json impose que l'objet soit définit sous forme
            de clé valeur avec la valeur elle même peut être un objet Json.
            Pour cela on utilise la structure Map comme elle est la structure la
            plus adéquate en Java pour stocker des couples Key/Value.
            
            Pour le cas d'un tableau (Json Array) contenant plusieurs objets
            sa valeur est une liste d'objets Json, donc une liste de Map
             */
            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");

            //Parcourir la liste des tâches Json
            for (Map<String, Object> obj : list) {
                //Création des tâches et récupération de leurs données
                Commande t = new Commande();
                float id = Float.parseFloat(obj.get("idcommande").toString());
                t.setIdCommande((int) id);
                t.setIdClient((int) Float.parseFloat(obj.get("idclient").toString()));
                if (obj.get("livree").toString() == "true") {
                    t.setLivree(true);
                } else {
                    t.setLivree(false);
                }
                t.setAdresse(obj.get("adresse").toString());
                t.setPrix(Float.parseFloat(obj.get("prix").toString()));
                
                Date date1;
                try {
                    date1 = new SimpleDateFormat("yyyy-mm-dd").parse(obj.get("datecommande").toString());
                    t.setDateCommande(date1);

                } catch (ParseException ex) {
                }
                t.nomclient = obj.get("nomclient").toString();
                //Ajouter la tâche extraite de la réponse Json à la liste
                commandes.add(t);
            }
            
        } catch (IOException ex) {
            
        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return commandes;
    }
    
    public ArrayList<Commande> getAllCommandes() {
        String url = Statics.BASE_URL + "/commande/getAll/";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                commandes = parseCommande(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return commandes;
    }
    
    public boolean supprimerCommande(Commande c){
        String url = Statics.BASE_URL + "/commande/delete/" + c.getIdCommande();

        req.setUrl(url);
        req.setPost(false);
        req.setFailSilently(true);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200;
                req.removeResponseListener(this);
            }

        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
    
}
