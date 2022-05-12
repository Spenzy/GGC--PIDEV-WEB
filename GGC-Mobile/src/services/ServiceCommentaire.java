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
import entities.Commentaire;
import entities.Publication;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;
import org.json.simple.JSONObject;
import utils.Statics;

/**
 *
 * @author Spenz
 */
public class ServiceCommentaire {
    
    public ArrayList<Commentaire> commentaires;
    
    public static ServiceCommentaire instance=null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServiceCommentaire() {
         req = new ConnectionRequest();
    }

    public static ServiceCommentaire getInstance() {
        if (instance == null) {
            instance = new ServiceCommentaire();
        }
        return instance;
    }
    
    public ArrayList<Commentaire> parseComments(String jsonText){
        try {
            commentaires=new ArrayList<>();
            JSONParser jp = new JSONParser();

            Map<String,Object> tasksListJson = jp.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            
            List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            
            //Parcourir la liste des tâches Json
            for(Map<String,Object> obj : list){
                //Création des tâches et récupération de leurs données
                Commentaire c = new Commentaire();
                float idpub = Float.parseFloat(obj.get("idpublication").toString());
                float idCommentaire = Float.parseFloat(obj.get("idcommentaire").toString());
                float idClient = Float.parseFloat(obj.get("idclient").toString());

                String jsonDate = obj.get("date").toString();
                Date date=new SimpleDateFormat("yyyy-mm-dd").parse(jsonDate); 

                c.setId_publication((int)idpub);
                c.setId_commentaire((int)idCommentaire);
                c.setIdClient((int)idClient);
                c.setDescription(obj.get("nomclient").toString());
                c.setDescription(obj.get("description").toString());
                c.setDatePost(date);
                

                commentaires.add(c);
            }
            
        } catch (IOException | ParseException ex) {
            
        }

        return commentaires;
    }
    
    public ArrayList<Commentaire> getAllCommentaire(int idpub){
        String url = Statics.BASE_URL+"/commentaire/get/"+idpub;
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                commentaires = parseComments(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return commentaires;
    }
    
    public boolean addCommentaire(Commentaire c) {

        String url = Statics.BASE_URL + "/commentaire/new/"; //création de l'URL
        req.setUrl(url);
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("idpublication", c.getId_publication());
        data.put("description", c.getDescription());
        data.put("idclient", c.getIdClient());
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
    
    public boolean modifCommentaire(Commentaire c) {
        String url = Statics.BASE_URL + "/commentaire/edit/"+c.getId_commentaire(); //création de l'URL
        req.setUrl(url);//
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("description", c.getDescription());
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
    
    public boolean supprimerCommentaire(int idcommentaire){
        String url = Statics.BASE_URL + "/commentaire/delete/" + idcommentaire;

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
