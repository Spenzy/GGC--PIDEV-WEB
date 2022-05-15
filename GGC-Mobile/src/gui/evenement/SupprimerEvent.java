/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Evenement;
import entities.Produit;
import services.ServiceEvenement;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class SupprimerEvent extends Form {
    

    public SupprimerEvent(Evenement e, Form previous) {
        setTitle("Suppression Evenement");
        setLayout(BoxLayout.yCenter());
        Label reference = new Label("reference : " + e.getReference());
        Label localisation = new Label("localisation : " + e.getLocalisation());
        Label description = new Label("Description : " + e.getDescription());
        Label nbrParticipant = new Label("nbrParticipant : " + e.getNbrParticipant());
        Label titre = new Label("titre : " + e.getTitre());
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");

        btnret.addActionListener(a -> new AffichEvent(previous).showBack());

        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));

                if (ServiceEvenement.getInstance().deleteEvent(e.getReference())) {
                    Dialog.show("Success", "suppression avec succes", new Command("OK"));
                    previous.showBack();
                } else {
                    Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                }

            }

        });

        addAll(reference, localisation, description, nbrParticipant, titre, btnSubmit, btnret);
        //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
}
