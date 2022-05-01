/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commande;
import entities.LigneCommande;
import entities.Produit;
import services.ServicePanier;
import utils.Statics;
import com.codename1.ui.AutoCompleteTextField;

/**
 *
 * @author Mr
 */
public class AjouterCommande extends Form {

    String[] words = {"carthage", "carthage Byrsa", "Ariana", "sidi Bou said", "gammarth", "marsa", "kram", "manzah1", "manzah2", "manzah3", "manzah4", "manzah5", "manzah6", "manzah7", "manzah8", "manzah9", "nasr", "tunis", "monastir", "mahdia", "sousse", "sfax", "mednine", " selyenna", "beja", "benzart", "gammarth", "marssa", "tabarka", "aindrahem", "jandouba"
    };

    public AjouterCommande(Produit p,Form previous) {
        setTitle("Bienvenue");
        setLayout(BoxLayout.yCenter());

        Label titre = new Label("Veuillez saisir votre adresse");
//        TextField adresse = new TextField();
        AutoCompleteTextField adresse = new AutoCompleteTextField(words);

        Button Valier = new Button("Valider adresse");
        Valier.addActionListener(l -> {
            if (adresse.getText() != "") {
                ServicePanier.ajouterCommande(new Commande(Statics.userid, adresse.getText()));
                ServicePanier.ajouterLigne(new LigneCommande(0, p.getReference(), 1, p.getPrix()));
                new AfficherPanier(previous).show();
            }
        });
        add(titre);
        add(adresse);
        add(Valier);
    }
}
