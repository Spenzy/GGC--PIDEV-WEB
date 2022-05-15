/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.spinner.Picker;
import entities.Personne;
import entities.Produit;
import gui.shop.ListProduitForm;
import services.ServicePersonne;
import services.ServiceProduit;

/**
 *
 * @author Dell
 */
public class ModifierPersonne extends Form {
    Form current;

    public ModifierPersonne(Personne p, Form previous) {
        setTitle("edit personne");
        setLayout(BoxLayout.y());
        int id = p.getId_personne();
        TextField nom = new TextField(p.getNom(), "nom");
        TextField prenom = new TextField(p.getPrenom(), "prenom");
        Picker date = new Picker();
        TextField email = new TextField(p.getEmail(), "email");
        TextField telephone = new TextField(String.valueOf(p.getTelephone()), "telephone");
        TextField password = new TextField(String.valueOf(p.getPassword()), "password");

        Button btnValider = new Button("Modifier Personne");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(e -> new ListPersonneForm(previous).showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((nom.getText().length() == 0) && (prenom.getText().length() == 0) && (email.getText().length() == 0) && (telephone.getText().length() == 0)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                } else {
                    try {
                        Personne p = new Personne(id, nom.getText(), prenom.getText(), date.getDate(), email.getText(),  Integer.parseInt(telephone.getText()), password.getText());

                        if (ServicePersonne.getInstance().modifierPersonne(p)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new ListPersonneForm(previous).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(nom, prenom, date, email, telephone, password, btnValider, btnRet);
        // getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> this.previous.showBack());

    }

}
