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
public class ServicePublication {
    
    public ArrayList<Publication> publications;
    
    public static ServicePublication instance=null;
    public boolean resultOK;
    private ConnectionRequest req;

    private ServicePublication() {
         req = new ConnectionRequest();
    }

    public static ServicePublication getInstance() {
        if (instance == null) {
            instance = new ServicePublication();
        }
        return instance;
    }
    
    public ArrayList<Publication> parseTasks(String jsonText){
        try {
            publications=new ArrayList<>();
            JSONParser jp = new JSONParser();

            Map<String,Object> tasksListJson = jp.parseJSON(new CharArrayReader(jsonText.toCharArray()));
            
            List<Map<String,Object>> list = (List<Map<String,Object>>)tasksListJson.get("root");
            
            //Parcourir la liste des tâches Json
            for(Map<String,Object> obj : list){
                //Création des tâches et récupération de leurs données
                Publication p = new Publication();
                float idpub = Float.parseFloat(obj.get("idpublication").toString());
                String jsonDate = obj.get("date").toString();
                Date date = new SimpleDateFormat("yyyy-mm-dd").parse(jsonDate); 
                String jsonArchive = obj.get("archive").toString();
                float nbrComm = Float.parseFloat(obj.get("nbrCommentaire").toString());
                float nbrVote = Float.parseFloat(obj.get("nbrVote").toString());
                
                p.setId_publication((int)idpub);
                p.setTitre(obj.get("object").toString());
                p.setDesc(obj.get("description").toString());
                p.setDatePub(date);
                p.setArchive(jsonArchive.equals("true"));
                p.setId_client(0);
                p.setNbrCommentaire((int)nbrComm);
                p.setNbrVote((int)nbrVote);
                
                publications.add(p);
            }
            
        } catch (IOException | ParseException ex) {
        }

        return publications;
    }
    
    public ArrayList<Publication> getAllPublications(){
        String url = Statics.BASE_URL+"/forum/getAll";
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                publications = parseTasks(new String(req.getResponseData()));
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return publications;
    }
    
    public boolean addPublication(Publication p) {

        String url = Statics.BASE_URL + "/forum/new"; //création de l'URL
        req.setUrl(url);
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("object", p.getTitre());
        data.put("description", p.getDesc());
        data.put("idclient", p.getId_client());
        System.out.println(data);
        req.setRequestBody(data.toJSONString());
        req.addResponseListener(new ActionListener<NetworkEvent>() {
        @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this); //Supprimer cet actionListener
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);System.out.println("jawek behi ajout");
        return resultOK;
    }
    
    public boolean modifPublication(Publication p) {
        String url = Statics.BASE_URL + "/forum/edit/"+p.getId_publication(); //création de l'URL
        req.setUrl(url);//
        req.setPost(true);
        req.setContentType("application/json");
        JSONObject data=new JSONObject();    
        data.put("object", p.getTitre());
        data.put("description", p.getDesc());
        System.out.println(data.toJSONString());
        
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
    
    public boolean archiverPublication(int idpublication){
        String url = Statics.BASE_URL + "/forum/archiver/" + idpublication;

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