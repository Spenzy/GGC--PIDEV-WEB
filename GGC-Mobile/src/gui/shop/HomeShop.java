/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.LigneCommande;
import entities.Produit;
import gui.commande.AfficherPanier;
import gui.commande.AjouterCommande;
import services.ServicePanier;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class HomeShop extends Form {

    public HomeShop(int uid,Form previous) {
        setTitle("Nos Produits");
        setLayout(BoxLayout.yCenter());

        for (Produit p : ServiceProduit.getInstance().getAllProducts()) {
            Container c = new Container(BoxLayout.yCenter());

            MultiButton mb = new MultiButton(p.getLibelle());
            //  mb.addActionListener(a -> new DetailProduit(p).show());

            Button btn_consulter = new Button("Consulter");
            Button btn_acheter = new Button("Acheter");

            btn_consulter.addActionListener(e -> new DetailProduitAvis(p, uid,previous).show());
            btn_acheter.addActionListener(l -> {
                //redirection vers ajoucommandeForm
                if (ServicePanier.commande == null) {
                    new AjouterCommande(p,previous).show();
                } else {
                    boolean here = false;
                    for (LigneCommande lc : ServicePanier.lignes) {
                        if (lc.getIdProduit() == p.getReference()) {
                            lc.setQuantite(lc.getQuantite() + 1);
                            here = true;
                            break;
                        }
                    }
                        if (!here) {
                            ServicePanier.ajouterLigne(new LigneCommande(0, p.getReference(), 1, p.getPrix()));
                        }

                        new AfficherPanier(previous).show();
                    

                }
            }
            );

            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(btn_consulter);
            c2.add(btn_acheter);
            c.addAll(mb, c2);
            add(c);

        }
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
