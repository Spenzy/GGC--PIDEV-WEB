/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import gui.HomeForm;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class ModifierProduit extends Form {

    Form current;

    public ModifierProduit(Produit p, Form previous) {
        setTitle("Modification Produit");
        setLayout(BoxLayout.y());
        TextField reference = new TextField(String.valueOf(p.getReference()), "reference produit");
        TextField tfLibelle = new TextField(p.getLibelle(), "libelle produit");
        TextField tfCategorie = new TextField(p.getCategorie(), "categorie produit");
        TextField tfDesc = new TextField(p.getDescription(), "description produit");
        TextField tfPrix = new TextField(String.valueOf(p.getPrix()), "prix produit");

        Button btnValider = new Button("Modifier Produit");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(e -> new ListProduitForm(previous).showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfLibelle.getText().length() == 0) && (tfDesc.getText().length() == 0) && (tfPrix.getText().length() == 0) && (tfCategorie.getText().length() == 0)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                } else {
                    try {
                        Produit p = new Produit(Integer.parseInt(reference.getText()), tfLibelle.getText(), tfCategorie.getText(), tfDesc.getText(), Float.parseFloat(tfPrix.getText()), "");

                        if (ServiceProduit.getInstance().modifierProduit(p)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new ListProduitForm(previous).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(reference, tfLibelle, tfCategorie, tfDesc, tfPrix, btnValider, btnRet);
        // getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> this.previous.showBack());

    }

}
