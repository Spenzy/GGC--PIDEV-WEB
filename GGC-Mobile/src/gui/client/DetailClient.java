/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.client;

import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Client;
import entities.Personne;
import gui.personne.HomePersonne;

/**
 *
 * @author Dell
 */
public class DetailClient extends Form{
    Form current;
    
//    public DetailClient(Client p, Form previous) {
//        setTitle("Detail Client");
//        setLayout(BoxLayout.yCenter());
//        
//        //ajout image
//        
//        //ajout informations
//        Label nom=new Label("Nom : "+p.getNom());
//        Label prenom=new Label("Prenom : "+p.getPrenom());
//        Label email=new Label("Email : "+p.getEmail());
//        Label telephone=new Label("Telephone : "+p.getTelephone());
//        Label date=new Label("DateNaissance : "+p.getDateNaissance());
//        Label nbrAvertissement=new Label("nbrAvertissement : "+p.getNbrAvertissement());
//
//
//        addAll(nom,prenom,email,telephone,date,nbrAvertissement);
//        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeClient(previous).showBack());
//
//    }
     public DetailClient(Client p, Form previous) {
        setTitle("Detail Client");
        setLayout(BoxLayout.yCenter());
        
        //ajout image
        
        //ajout informations
        Label id=new Label("idclient : "+p.getIdClient());
        Label ban=new Label("ban : "+p.getBan());
      
        Label nbrAvertissement=new Label("nbrAvertissement : "+p.getNbrAvertissement());


        addAll(id,ban,nbrAvertissement);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeClient(previous).showBack());

    }
    
}
