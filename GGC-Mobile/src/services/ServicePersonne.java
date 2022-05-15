/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package services;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionListener;
import entities.Personne;
import entities.Produit;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;
import utils.Statics;

/**
 *
 * @author Dell
 */
public class ServicePersonne {

    public ArrayList<Personne> personnes;

    public static ServicePersonne instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServicePersonne() {
        req = new ConnectionRequest();
    }

    public static ServicePersonne getInstance() {
        if (instance == null) {
            instance = new ServicePersonne();
        }
        return instance;
    }

    public boolean addPersonne(Personne p) {

        String url = Statics.BASE_URL + "/personne/ajoutercl/new" + "?nom=" + p.getNom() + "&prenom=" + p.getPrenom() + "&dateNaissance=" + p.getDateNaissance() + "&email=" + p.getEmail() + "&telephone=" + p.getTelephone() + "&password=" + p.getPassword(); //création de l'URL
        req.setUrl(url);// Insertion de l'URL de notre demande de connexion
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this); //Supprimer cet actionListener
                /* une fois que nous avons terminé de l'utiliser.
                La ConnectionRequest req est unique pour tous les appels de 
                n'importe quelle méthode du Service task, donc si on ne supprime
                pas l'ActionListener il sera enregistré et donc éxécuté même si 
                la réponse reçue correspond à une autre URL(get par exemple)*/

            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }

    public ArrayList<Personne> parsePersonnes(String jsonText) {
        try {
            personnes = new ArrayList<>();
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
                Personne t = new Personne();
                float id = Float.parseFloat(obj.get("idPersonne").toString());
                t.setId_personne((int) id);
                t.setNom(obj.get("nom").toString());
                t.setPrenom(obj.get("prenom").toString());
                // t.setDateNaissance((Date) obj.get("dateNaissance"));
                t.setEmail((obj.get("email").toString()));
//                 int tel = Integer.parseInt(obj.get("telephone").toString());
                //        System.out.println(tel);
                //t.setTelephone(tel);
                t.setPassword((obj.get("password").toString()));
                //Ajouter la tâche extraite de la réponse Json à la liste
                personnes.add(t);
            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return personnes;
    }

    public ArrayList<Personne> getAllPersonnes() {
        String url = Statics.BASE_URL + "/personne/liste/api";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                personnes = parsePersonnes(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return personnes;
    }

    public boolean modifierPersonne(Personne p) {
        String url = Statics.BASE_URL + "/personne/modifier/" + p.getId_personne() + "?nom=" + p.getNom() + "&prenom=" + p.getPrenom() + "&dateNaissance=" + p.getDateNaissance() + "&email=" + p.getEmail() + "&telephone=" + p.getTelephone() + "&password=" + p.getPassword();
        req.setUrl(url);

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

    public boolean SupprimerPersonne(Personne p) {
        String url = Statics.BASE_URL + "/personne/deleteblApi/" + p.getId_personne();

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

    public void login(String address, String password) {
        String url = Statics.BASE_URL + "/personne/login/0?email=" + address + "&password=" + password;
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                try{
                String res = new String(req.getResponseData());
                System.out.println(res);
                Statics.userid=Integer.parseInt(res.subSequence(12,13).toString());
                    System.out.println(res.subSequence(12,13));
                    
                }catch(NumberFormatException ex){
                }
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
    }

}
