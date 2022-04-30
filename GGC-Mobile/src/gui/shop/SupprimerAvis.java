/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Avis;
import entities.Produit;
import services.ServiceAvis;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class SupprimerAvis extends Form {

    public SupprimerAvis(Produit p, Avis av, int uid) {
        setTitle("Suppression Avis");
        setLayout(BoxLayout.yCenter());
        Label client = new Label("Client : " + av.nomclient);
        Label type = new Label("Type : " + av.getType());
        Label descriptionAvis = new Label("Description : " + av.getDescription());
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");

        btnret.addActionListener(e -> new DetailProduitAvis(p,uid).showBack());

        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));

                if (ServiceAvis.getInstance().SupprimerAvis(av)) {
                    Dialog.show("Success", "suppression avec succes", new Command("OK"));
                } else {
                    Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                }

            }

        });

        addAll(client,type,descriptionAvis, btnSubmit, btnret);
        //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
