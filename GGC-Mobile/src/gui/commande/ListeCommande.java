/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commande;
import gui.HomeForm;
import gui.shop.SupprimerProduit;
import java.util.ArrayList;
import services.ServiceCommande;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class ListeCommande extends Form {

    public ListeCommande() {
        setTitle("Vos Commandes");
        setLayout(BoxLayout.yCenter());
        ArrayList<Commande> commandes = ServiceCommande.getInstance().getAllCommandes();
        for (Commande c: commandes) {
            if (c.getIdClient() == Statics.userid) {
                System.out.println(c);
                Container c1 = new Container(BoxLayout.yCenter());
                Label idcommande = new Label("Commande N° " + c.getIdCommande());
                Button btn_Detail = new Button("Details");
                Button btn_Supprimer = new Button("Supprimer");
                btn_Detail.addActionListener((cnx) -> {

                });
                btn_Supprimer.addActionListener((cnx) -> new SupprimerCommande(c).show() );
                Container c2 = new Container(BoxLayout.xCenter());
                c2.addAll(btn_Detail, btn_Supprimer);
                c1.addAll(idcommande, c2);
                add(c1);

            }
        }
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeForm().showBack());
        getToolbar().addMaterialCommandToRightBar("", FontImage.MATERIAL_ADD_SHOPPING_CART, (evt4) -> {
            new AfficherPanier().showBack();

        });
    }

}
