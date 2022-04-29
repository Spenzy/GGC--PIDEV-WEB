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
import com.codename1.ui.events.ActionListener;
import entities.Produit;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import utils.Statics;

/**
 *
 * @author dell
 */
public class ServiceProduit {

    public ArrayList<Produit> produits;

    public static ServiceProduit instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServiceProduit() {
        req = new ConnectionRequest();
    }

    public static ServiceProduit getInstance() {
        if (instance == null) {
            instance = new ServiceProduit();
        }
        return instance;
    }

//    public boolean addProduct(Produit t) {
//        String url = Statics.BASE_URL + "/produits/" + t.getName() + "/" + t.getStatus(); //création de l'URL
//        req.setUrl(url);// Insertion de l'URL de notre demande de connexion
//        req.addResponseListener(new ActionListener<NetworkEvent>() {
//            @Override
//            public void actionPerformed(NetworkEvent evt) {
//                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
//                req.removeResponseListener(this); //Supprimer cet actionListener
//                /* une fois que nous avons terminé de l'utiliser.
//                La ConnectionRequest req est unique pour tous les appels de 
//                n'importe quelle méthode du Service task, donc si on ne supprime
//                pas l'ActionListener il sera enregistré et donc éxécuté même si 
//                la réponse reçue correspond à une autre URL(get par exemple)*/
//                
//            }
//        });
//        NetworkManager.getInstance().addToQueueAndWait(req);
//        return resultOK;
//    }
    public ArrayList<Produit> parseProducts(String jsonText) {
        try {
            produits = new ArrayList<>();
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
                Produit t = new Produit();
                float reference = Float.parseFloat(obj.get("reference").toString());
                t.setReference((int) reference);
                t.setLibelle(obj.get("libelle").toString());
                t.setCategorie(obj.get("categorie").toString());
                t.setDescription(obj.get("description").toString());
                t.setPrix((float) Float.parseFloat(obj.get("prix").toString()));
                t.setNote((int) Float.parseFloat(obj.get("note").toString()));
                //Ajouter la tâche extraite de la réponse Json à la liste
                produits.add(t);
            }

        } catch (IOException ex) {

        }
        /*
            A ce niveau on a pu récupérer une liste des tâches à partir
        de la base de données à travers un service web
        
         */
        return produits;
    }

    public ArrayList<Produit> getAllProducts() {
        String url = Statics.BASE_URL + "/produit/getAll";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                produits = parseProducts(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return produits;
    }

    public boolean modifierProduit(Produit p) {
        String url = Statics.BASE_URL + "/edit/" + p.getReference()+ "?libelle=" + p.getLibelle()+ "&description=" + p.getDescription() + "&image=" + p.getImage() + "&prix=" + p.getPrix();
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

//    public Product Detailprod(int idProduit, Product p) {
//
//        String url = Statics.BASE_URL + "/product/list=?" + idProduit;
//        req.setUrl(url);
//
//        String str = new String(req.getResponseData());
//        req.addResponseListener(((evt) -> {
//
//            JSONParser jsonp = new JSONParser();
//            try {
//
//                Map<String, Object> obj = jsonp.parseJSON(new CharArrayReader(new String(str).toCharArray()));
//
//                p.setNomprod(obj.get("nomprod").toString());
//                p.setDescription(obj.get("description").toString());
//                p.setImage(obj.get("image").toString());
//                p.setPrix(Integer.parseInt(obj.get("prix").toString()));
//                p.setQuantity(Integer.parseInt(obj.get("quantity").toString()));
//
//            } catch (IOException ex) {
//                System.out.println("error related to sql :( " + ex.getMessage());
//            }
//
//            System.out.println("data === " + str);
//
//        }));
//
//        NetworkManager.getInstance().addToQueueAndWait(req);//execution ta3 request sinon yet3ada chy dima nal9awha
//
//        return p;
//
//    }
//
//    public boolean Delete(Product p) {
//        String url = Statics.BASE_URL + "product/Delete/" + p.getIdProduit();
//
//        req.setUrl(url);
//        req.setPost(false);
//        req.setFailSilently(true);
//        req.addResponseListener(new ActionListener<NetworkEvent>() {
//            @Override
//            public void actionPerformed(NetworkEvent evt) {
//                resultOK = req.getResponseCode() == 200;
//                req.removeResponseListener(this);
//            }
//
//        });
//        NetworkManager.getInstance().addToQueueAndWait(req);
//        return resultOK;
//
//    }

}
