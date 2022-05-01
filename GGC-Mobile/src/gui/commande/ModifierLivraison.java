/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.spinner.Picker;
import entities.Commande;
import entities.Livraison;
import entities.Livreur;
import java.util.ArrayList;
import services.ServiceCommande;
import services.ServiceLivraison;

/**
 *
 * @author Mr
 */
public class ModifierLivraison extends Form {

    public ModifierLivraison(Livraison l) {
        setTitle("Modifier Livraison");
        setLayout(BoxLayout.yCenter());

        Label label_commande = new Label("Commande");
        ComboBox<Integer> cb_commande = new ComboBox<>();
        ArrayList<Commande> commandes = ServiceCommande.getInstance().getAllCommandes();
        for (int i = 0; i < commandes.size(); i++) {
            cb_commande.addItem(commandes.get(i).getIdCommande());
        }
        cb_commande.setSelectedItem(l.getIdCommande());

        Label label_livreur = new Label("Livreur");
        ComboBox<Integer> cb_livreur = new ComboBox<>();
        ArrayList<Livreur> livreurs = ServiceLivraison.getInstance().getAllLivreurs();
        for (int i = 0; i < livreurs.size(); i++) {
            cb_livreur.addItem(livreurs.get(i).getIdlivreur());
        }
        cb_livreur.setSelectedItem(l.getIdLivreur());

        Label label_date = new Label("Date Livraison");
        Picker date = new Picker();
        date.setDate(l.getDateHeure());

        Button btnValider = new Button("Modifier");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(e -> new ListeLivraisons().showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((cb_commande.getSelectedItem() == null) || (cb_commande.getSelectedItem() == null) || (date.getDate() == null)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                    new ListeLivraisons().showBack(); // Revenir vers l'interface précédente

                } else {
                    try {
                        l.setIdCommande(cb_commande.getSelectedItem());
                        l.setIdLivreur(cb_livreur.getSelectedItem());
                        l.setDateHeure(date.getDate());

                        if (ServiceLivraison.getInstance().modifierLivraison(l,date)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new ListeLivraisons().showBack();
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(label_commande, cb_commande, label_livreur, cb_livreur, label_date, date,btnValider, btnRet);
        getToolbar()
                .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                        e -> new ListeLivraisons().showBack()); // Revenir vers l'interface précédente
    }

}
