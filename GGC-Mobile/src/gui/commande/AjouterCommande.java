/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commande;
import entities.LigneCommande;
import entities.Produit;
import services.ServicePanier;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class AjouterCommande extends Form{
    public AjouterCommande(Produit p){
        setTitle("Bienvenue");
        setLayout(BoxLayout.yCenter());
        
        Label titre=new Label("Veuillez saisir votre adresse");
        TextField adresse=new TextField();
        Button Valier=new Button("Valider adresse");
        Valier.addActionListener(l->{
            if(adresse.getText()!=""){
                ServicePanier.ajouterCommande(new Commande(Statics.userid,adresse.getText()));
                ServicePanier.ajouterLigne(new LigneCommande(0,p.getReference(),1,p.getPrix()));
                new AfficherPanier().show();
            }
        });
        add(titre);
        add(adresse);
        add(Valier);
    }
}
