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
import entities.Livraison;
import entities.Livreur;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;
import org.json.simple.JSONObject;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class ServiceLivraison {

    public ArrayList<Livraison> livraisons;
    public ArrayList<Livreur> livreurs;

    public static ServiceLivraison instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServiceLivraison() {
        req = new ConnectionRequest();
    }

    public static ServiceLivraison getInstance() {
        if (instance == null) {
            instance = new ServiceLivraison();
        }
        return instance;
    }

    public boolean addLivraison(Livraison l) {
        String url = Statics.BASE_URL + "/livraison/new"; //création de l'URL
        req.setUrl(url);
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("idcommande",l.getIdCommande());
        data.put("idlivreur",l.getIdLivreur());
        data.put("dateheure",l.getDateHeure().toString());
                 
        req.setRequestBody(data.toJSONString());
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this); //Supprimer cet actionListener
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;

    }

    public ArrayList<Livreur> parseLivreur(String jsonText) {
        try {
            livreurs = new ArrayList<>();
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
                Livreur t = new Livreur();
                float id = Float.parseFloat(obj.get("idlivreur").toString());
                t.setIdlivreur((int) id);
                t.setDisponibilite(true);

                //Ajouter la tâche extraite de la réponse Json à la liste
                livreurs.add(t);
            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return livreurs;
    }

    public ArrayList<Livreur> getAllLivreurs() {
        String url = Statics.BASE_URL + "/livraison/getAllLivreurs/";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                livreurs = parseLivreur(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return livreurs;
    }

    public ArrayList<Livraison> parseLivraison(String jsonText) {
        try {
            livraisons = new ArrayList<>();
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
                Livraison t = new Livraison();
                float id = Float.parseFloat(obj.get("idlivreur").toString());
                t.setIdLivreur((int) id);
                t.setIdCommande((int) Float.parseFloat(obj.get("idcommande").toString()));
                Date date1;
                try {
                    date1 = new SimpleDateFormat("yyyy-mm-dd").parse(obj.get("dateheure").toString());
                    t.setDateHeure(date1);
                    //Ajouter la tâche extraite de la réponse Json à la liste
                    livraisons.add(t);

                } catch (ParseException ex) {
                }

            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return livraisons;
    }

    public ArrayList<Livraison> getAllLivraisons() {
        String url = Statics.BASE_URL + "/livraison/getAll/";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                livraisons = parseLivraison(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return livraisons;
    }

    public boolean modifierLivraison(Livraison l) {

        String url = Statics.BASE_URL + "/livraison/edit"; //création de l'URL
        req.setUrl(url);
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("idcommande",l.getIdCommande());
        data.put("idlivreur",l.getIdLivreur());
        data.put("dateheure",l.getDateHeure().toString());
         
        req.setRequestBody(data.toJSONString());
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200;  // Code response Http 200 ok
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);//execution ta3 request sinon yet3ada chy dima nal9awha
        return resultOK;
    }

    public boolean SupprimerLivraison(Livraison l) {
        String url = Statics.BASE_URL + "/livraison/delete/" + l.getIdCommande();

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
