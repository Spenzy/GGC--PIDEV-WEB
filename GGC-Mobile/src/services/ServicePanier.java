/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package services;

import com.codename1.io.ConnectionRequest;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.spinner.Picker;
import entities.Commande;
import entities.LigneCommande;
import entities.Livraison;
import java.util.ArrayList;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class ServicePanier {

    public static Commande commande = null;
    public static ArrayList<LigneCommande> lignes = new ArrayList<>();

    public static ServicePanier instance = null;
    public boolean resultOK;
    private ConnectionRequest req;

    public boolean ajouterPanier() {

        String url = Statics.BASE_URL + "/commande/new" ;
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
    
    private ServicePanier() {
        req = new ConnectionRequest();
    }

    public static ServicePanier getInstance() {
        if (instance == null) {
            instance = new ServicePanier();
        }
        return instance;
    }

    public static void viderPanier() {
        commande = null;
        lignes = new ArrayList<>();

    }

    public static void ajouterCommande(Commande c) {
        commande = c;
    }

    public static void ajouterLigne(LigneCommande lc) {
        lignes.add(lc);
    }

    public static void supprimerLigne(LigneCommande lc) {
        lignes.remove(lc);
    }
    
    public static ArrayList<String> validerPanier(){
        ArrayList<String> lignesJson = new ArrayList<>();
        for(LigneCommande lc : lignes){
            lignesJson.add(lc.toString());
        }
        return lignesJson;
    }

}
