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
import entities.Plan;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;

import utils.Statics;

/**
 *
 * @author msi
 */
public class ServicePlan {
    
   

    public ArrayList<Plan> plans;

    public static ServicePlan instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServicePlan() {
        req = new ConnectionRequest();
    }

    public static ServicePlan getInstance() {
        if (instance == null) {
            instance = new ServicePlan();
        }
        return instance;
    }

    public boolean addPlan(Plan p) {
       
        String url = Statics.BASE_URL + "/plan/new" + "?idPlan="+ p.getIdPlan()+ "&idStreamer=" + p.getIdStreamer() + "&date=" + p.getDate()+ "&heure=" + p.getHeure()  + "&duree=" + p.getDuree()+ "&description=" + p.getDescription()+ "&idEvennement=" + p.getIdEvennement(); //création de l'URL
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
    
    public ArrayList<Plan> parsePlans(String jsonText) throws ParseException {
        try {
            plans = new ArrayList<>();
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
                
                /*
                
                + "?idPlan="+ p.getIdPlan()+ "&idStreamer=" + p.getIdStreamer() + "&date=" + p.getDate()
                + "&heure=" + p.getHeure()  + "&duree=" + p.getDuree()
                + "&description=" + p.getDescription()+ "&idEvennement=" + p.getIdEvennement();
                */
                
                
                
                //Création des tâches et récupération de leurs données
                Plan t = new Plan();
                float idPlan = Float.parseFloat(obj.get("idPlan").toString());
                t.setIdPlan((int) idPlan);
                float idStreamer = Float.parseFloat(obj.get("idStreamer").toString());
                t.setIdStreamer((int) idStreamer);
                
                Date date1;
                
                try {
                    date1 = new SimpleDateFormat("yyyy-mm-dd").parse(obj.get("date").toString());
                    t.setDate(date1);

                } catch (ParseException ex) {
                }
                
                
                Date date2;            
               
                try {
                date2 = new SimpleDateFormat("hh-mm-ss").parse(obj.get("heure").toString());
                    t.setHeure(date2);
                } catch (ParseException ex) {
                }
                t.setNomstreamer(obj.get("nomstreamer").toString());
                t.setDuree((int) Float.parseFloat(obj.get("duree").toString()));
                t.setDescription(obj.get("description").toString());
                t.setIdEvennement((int) Float.parseFloat(obj.get("idEvennement").toString()));
                
                //Ajouter la tâche extraite de la réponse Json à la liste
                plans.add(t);
            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return plans;
    }

    public ArrayList<Plan> getAllPlans() {
        String url = Statics.BASE_URL + "/plan/getAll/";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                try {
                    plans = parsePlans(new String(req.getResponseData()));
                    req.removeResponseListener(this);
                } catch (ParseException ex) {
                }
              
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return plans;
    }

    public boolean modifierPlan(Plan p) {
        String url = Statics.BASE_URL + "?idPlan="+ p.getIdPlan()+ "&idStreamer=" + p.getIdStreamer() + "&date=" + p.getDate()+ "&heure=" + p.getHeure()  + "&duree=" + p.getDuree()+ "&description=" + p.getDescription()+ "&idEvennement=" + p.getIdEvennement();
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

    public boolean SupprimerPlan(Plan p) {
        String url = Statics.BASE_URL + "/plan/delete/" +p.getIdPlan();
  
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
