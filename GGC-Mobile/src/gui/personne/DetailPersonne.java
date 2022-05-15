/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

import com.codename1.components.ImageViewer;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Personne;
import entities.Produit;
import gui.shop.ListProduitForm;

/**
 *
 * @author Dell
 */
public class DetailPersonne extends Form {
    Form current;
    
    public DetailPersonne(Personne p, Form previous) {
        setTitle("Detail personne");
        setLayout(BoxLayout.yCenter());
        
        //ajout image
        
        //ajout informations
        Label nom=new Label("Nom : "+p.getNom());
        Label prenom=new Label("Prenom : "+p.getPrenom());
        Label email=new Label("Email : "+p.getEmail());
        Label telephone=new Label("Telephone : "+p.getTelephone());
        Label date=new Label("Date : "+p.getDateNaissance());

        addAll(nom,prenom,email,telephone,date);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomePersonne(previous).showBack());

    }

}
