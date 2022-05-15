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
import com.codename1.ui.events.ActionListener;
import entities.Client;
import entities.Personne;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import utils.Statics;

/**
 *
 * @author Dell
 */
public class ServiceClient {
    public ArrayList<Client> clients;

    public static ServiceClient instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServiceClient() {
        req = new ConnectionRequest();
    }

    public static ServiceClient getInstance() {
        if (instance == null) {
            instance = new ServiceClient();
        }
        return instance;
    }

    public boolean addClient(Client p) {
       
        String url = Statics.BASE_URL + "/client/ajoutercl1/new" + "?nom="+ p.getNom()+ "&prenom=" + p.getPrenom()+ "&dateNaissance=" + p.getDateNaissance()+ "&email=" + p.getEmail()+ "&telephone=" + p.getTelephone()+ "&password=" + p.getPassword(); //création de l'URL
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
    
//    public ArrayList<Client> parseClient(String jsonText) {
//        try {
//            clients = new ArrayList<>();
//            JSONParser j = new JSONParser();
//
//           
//           
//            Map<String, Object> tasksListJson = j.parseJSON(new CharArrayReader(jsonText.toCharArray()));
//
//          
//            
//            List<Map<String, Object>> list = (List<Map<String, Object>>) tasksListJson.get("root");
//
//            for (Map<String, Object> obj : list) {
//                Client t = new Client();
//                int id = Integer.parseInt(obj.get("id_personne").toString());
//                t.setIdClient((int) id);
////                t.setNom(obj.get("nom").toString());
////                t.setPrenom(obj.get("prenom").toString());
////                t.setDateNaissance((Date) obj.get("dateNaissance"));
////                t.setEmail((obj.get("email").toString()));
////                 int tel = Integer.parseInt(obj.get("telephone").toString());
////                 System.out.println(tel);
////                 t.setTelephone(tel);
////                t.setPassword((obj.get("password").toString()));
////                Ajouter la tâche extraite de la réponse Json à la liste
////                clients.add(t);
//            }
//
//        } catch (IOException ex) {
//
//        }
//      
//        return clients;
//    }
    public ArrayList<Client> parseClient(String jsonText) {
        try {
            clients = new ArrayList<>();
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
                Client t = new Client();
                float idclient = Float.parseFloat(obj.get("idclient").toString());
                t.setIdClient((int) idclient);
                   float nbr = Float.parseFloat(obj.get("nbravertissement").toString());
                t.setNbrAvertissement((int)nbr);
                float ban = Float.parseFloat(obj.get("ban").toString());
                t.setBan((int)ban);
                
                
               
                
                //Ajouter la tâche extraite de la réponse Json à la liste
                clients.add(t);
            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return clients;
    }

    public ArrayList<Client> getAllClient() {
        String url = Statics.BASE_URL + "/client/liste/apii";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                clients = parseClient(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return clients;
    }

    public boolean modifierPersonne(Personne p) {
        String url = Statics.BASE_URL + "/personne/modifier/"+ p.getId_personne()+ "?nom="+ p.getNom()+ "&prenom=" + p.getPrenom()+ "&dateNaissance=" + p.getDateNaissance()+ "&email=" + p.getEmail()+ "&telephone=" + p.getTelephone()+ "&password=" + p.getPassword();
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

    public boolean SupprimerClient(Personne p) {
        String url = Statics.BASE_URL + "/personne/deleteblApi/" +p.getId_personne();
  
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
