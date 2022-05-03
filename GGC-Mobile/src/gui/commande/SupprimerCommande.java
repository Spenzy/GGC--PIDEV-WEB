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
import entities.Commande;
import services.ServiceCommande;

/**
 *
 * @author Mr
 */
public class SupprimerCommande extends Form {

    public SupprimerCommande(Commande c,Form previous) {
        setTitle("Details Commande");
        setLayout(BoxLayout.yCenter());
        Label idcommande = new Label("Commande : " + c.getIdCommande());
        Label date = new Label("Date : " + c.getDateCommande());
        Label adresse = new Label("Adresse : " + c.getAdresse());
        Label prix = new Label("Prix : " + c.getPrix());
        Label etat = new Label();
        if (c.isLivree()) {
            etat.setText("Etat : livree");
        }else  {
             etat.setText("Etat : non livree"); 
        }
        
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");

        btnret.addActionListener(e -> new ListeCommande(previous).showBack());

        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));

                if (ServiceCommande.getInstance().supprimerCommande(c)) {
                    Dialog.show("Success", "suppression avec succes", new Command("OK"));
                    new ListeCommande(previous).showBack(); // Revenir vers l'interface précédente
                } else {
                    Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                }

            }

        });

        addAll(idcommande, date,adresse,prix,etat, btnSubmit, btnret);

    }
}
