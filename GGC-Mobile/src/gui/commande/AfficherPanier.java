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
import entities.LigneCommande;
import gui.shop.HomeShop;
import services.ServiceCommande;
import services.ServicePanier;
import utils.Statics;

/**
 *
 * @author Mr
 */
public class AfficherPanier extends Form {

    public AfficherPanier(Form previous) {
        setTitle("Voici votre Panier");
        setLayout(BoxLayout.yCenter());

        float total = 0;
        if (ServicePanier.lignes.isEmpty()) {
            Label vide = new Label("Votre panier est vide");
            add(vide);
        } else {

            for (LigneCommande lc : ServicePanier.lignes) {

                Container c = new Container(BoxLayout.xCenter());
                Label libelle = new Label(lc.getIdProduit() + "");
                Button btnplus = new Button("+");
                btnplus.addActionListener(e -> {
                    float prixU = lc.getPrix() / lc.getQuantite();
                    lc.setQuantite(lc.getQuantite() + 1);
                    lc.setPrix(prixU * lc.getQuantite());
                    new AfficherPanier(previous).show();
                });
                Label quantite = new Label(lc.getQuantite() + "");
                Button btnminus = new Button("-");
                btnminus.addActionListener(e -> {
                    float prixU = lc.getPrix() / lc.getQuantite();
                    lc.setQuantite(lc.getQuantite() - 1);
                    lc.setPrix(prixU * lc.getQuantite());
                    if (lc.getQuantite() == 0) {
                        ServicePanier.supprimerLigne(lc);
                    }
                    new AfficherPanier(previous).show();
                });
                Label prix = new Label(lc.getPrix() + " dt");
                total += lc.getPrix();
                c.addAll(libelle, btnplus, quantite, btnminus, prix);
                add(c);
            }

            Label prixTotal = new Label("Prix Total : " + total + " DT");
            Container c1 = new Container(BoxLayout.xCenter());
            c1.add(prixTotal);
            add(c1);
            Container c2 = new Container(BoxLayout.xCenter());
            Button btn_valider = new Button("Valier");
            ServicePanier.commande.setPrix(total);
            btn_valider.addActionListener(v -> {
                ServiceCommande.getInstance().addCommande();
                ServicePanier.viderPanier();
                new ListeCommande(previous).show();
            });
            Button btn_annuler = new Button("Annuler");
            btn_annuler.addActionListener(v -> {
                ServicePanier.viderPanier();
                new AfficherPanier(previous).show();
            });
            c2.addAll(btn_valider, btn_annuler);
            add(c2);
        }

        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeShop(Statics.userid,previous).showBack());
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_LIST, e -> new ListeCommande(previous).show());
    }

}
