/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
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
public class AjoutAvis extends Form {

    public AjoutAvis(Produit p, int uid) {
        setTitle("Donner votre avis");
        setLayout(BoxLayout.yCenter());

        Label label_type = new Label("Type");
        ComboBox<String> cb_type = new ComboBox<>();
        cb_type.addItem("excellent");
        cb_type.addItem("moyen");
        cb_type.addItem("mediocre");

        Label label_description = new Label("Description");
        TextField tf_description = new TextField("", "", 60, TextArea.ANY);

        Button btnAjout = new Button("ajouter");

        btnAjout.addActionListener(
                new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt
            ) {
                if ((cb_type.getSelectedItem() == null) || (tf_description.getText().length() == 0)) {
                    Dialog.show("Alerte", "Champs vides", new Command("OK"));
                } else {
                    try {
                        Avis a = new Avis(p.getReference(), uid, tf_description.getText(), cb_type.getSelectedItem());
                        if (ServiceAvis.getInstance().addAvis(a)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new DetailProduitAvis(p, uid).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }
        }
        );

        addAll(label_type, cb_type, label_description, tf_description, btnAjout);

        getToolbar()
                .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                        e -> new DetailProduitAvis(p, uid).showBack()); // Revenir vers l'interface précédente

    }

}
