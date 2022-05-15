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
import entities.Evenement;
import java.util.ArrayList;
import java.util.List;
import java.util.Map;
import utils.Statics;

/**
 *
 * @author Azer
 */
public class ServiceEvenement {

    public static ServiceEvenement instance = null;
    private ConnectionRequest req;
    public static boolean resultOk = true;

    public static ServiceEvenement getInstance() {
        if (instance == null) {
            instance = new ServiceEvenement();
        }
        return instance;
    }
    public ArrayList<Evenement> getEvenement;

    private ServiceEvenement() {
        req = new ConnectionRequest();
    }
    public boolean resultOK;

//    public boolean ajouterEvenement(Evenement e) {
//        String url = Statics.BASE_URL + "addevent?reference=" + e.getReference() + "&localisation=" + e.getLocalisation()+ "&description=" + e.getDescription()+ "&nbrParticipant=" + e.getNbrParticipant()+ "&titre=" + e.getTitre();
//        req.setUrl(url);
//        req.addResponseListener((a) -> {
//            resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
//            String str = new String(req.getResponseData());
//            System.out.println("data" + str);
//        });
//        NetworkManager.getInstance().addToQueueAndWait(req);
//        return resultOK;
//
//    }
    
    public boolean ajouterEvenement(Evenement e) {
        String url = Statics.BASE_URL + "/evennement/addevent?reference=" + e.getReference() + "&localisation=" + e.getLocalisation()+ "&description=" + e.getDescription()+ "&nbrParticipant=" + e.getNbrParticipant()+ "&titre=" + e.getTitre();
        req.setUrl(url);
        req.addResponseListener((a) -> {
            resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK
            String str = new String(req.getResponseData());
            System.out.println("data" + str);
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;

    }

    public ArrayList<Evenement> affichageEvenement() {
        ArrayList<Evenement> result = new ArrayList<>();
        String url = Statics.BASE_URL + "/evennement/Allevents";
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                JSONParser jsonp;
                jsonp = new JSONParser();
                try {
                    //renvoi une map avec clé = root et valeur le reste
                    Map<String, Object> mapEvent = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));

                    List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapEvent.get("root");

                    for (Map<String, Object> obj : listOfMaps) {
                        Evenement e = new Evenement();
                        int id = (int) Float.parseFloat(obj.get("reference").toString());
                        String description = obj.get("description").toString();
                        String localisation = obj.get("localisation").toString();
//                        int nbr= (int) Float.parseFloat(obj.get("nbrParticipant").toString());
                        String titre = obj.get("titre").toString();

                        e.setReference((int) id);
                        e.setDescription(description);
                        e.setLocalisation(localisation);
//                        e.setNbrParticipant((int) nbr);
                        e.setTitre(titre);
                        

//                        String DateConverter=obj.get("date").toString().substring(obj.get("Date").toString().indexOf("timestamp")+10 , obj.get("Date").toString().lastIndexOf("}"));      
                        //             Date currentTime = new Date(Double.valueOf(DateConverter).longValue() * 1000);
                        //             SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd");
                        //            String dateString = formatter.format(currentTime);
                        //            v.setDate(dateString);
                        result.add(e);

                    }
                } catch (Exception e) {
                    e.printStackTrace();
                }
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);

        return result;
    }

    public boolean deleteEvent(int reference) {
        String url = Statics.BASE_URL + "/evennement/deleteEvent/" + reference + "";

        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {

                req.removeResponseCodeListener(this);
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOk;
    }
    //Update 

    public boolean modifierEvent(Evenement e) {
        String url = Statics.BASE_URL + "/evennement/updateEvent?reference=" + e.getReference()+ "&dateDebut=" + e.getDateDebut()+ "&dateFin=" + e.getDateFin() + "&localisation=" + e.getLocalisation()+ "&description=" + e.getDescription()+ "&nbrParticipant=" + e.getNbrParticipant()+ "&titre=" + e.getTitre();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOk = req.getResponseCode() == 200;  // Code response Http 200 ok
                req.removeResponseListener(this);
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);//execution ta3 request sinon yet3ada chy dima nal9awha
        return resultOk;

    }
}