/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Livraison;
import services.ServiceLivraison;

/**
 *
 * @author Mr
 */
public class SupprimerLivraison extends Form{
    public SupprimerLivraison(Livraison l){
        setTitle("Suppression Livraison");
        setLayout(BoxLayout.yCenter());
        Label idcommande = new Label("Commande : " + l.getIdCommande());
        Label idlivreur = new Label("Livreur : " + l.getIdLivreur());
        Label date = new Label("Date : " + l.getDateHeure());
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");

        btnret.addActionListener(e -> new ListeLivraisons().showBack());

        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));

                if (ServiceLivraison.getInstance().SupprimerLivraison(l)) {
                    Dialog.show("Success", "suppression avec succes", new Command("OK"));
                    new ListeLivraisons().showBack(); // Revenir vers l'interface précédente
                } else {
                    Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                }

            }

        });

        addAll(idcommande, idlivreur,date, btnSubmit, btnret);
     
    }
}
