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
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class RemiseProduitForm extends Form{

    public RemiseProduitForm(Form previous) {
       
            setTitle("Donner Remise");
            setLayout(BoxLayout.y());

            Label label_categorie = new Label("Categorie");
            TextField tf_categorie = new TextField("", "", 20, TextArea.ANY);
            Label label_montant = new Label("Montant");
            TextField tf_montant = new TextField("", "", 20, TextArea.ANY);

            Button btnRemise = new Button("Affecter");

            btnRemise.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            if ((tf_categorie.getText().length() == 0) || (tf_montant.getText().length() == 0)) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    if (ServiceProduit.getInstance().affecterRemise(tf_categorie.getText(),Float.parseFloat(tf_montant.getText()))) {
                                        Dialog.show("Success", "Connection accepted", new Command("OK"));
                                        //previous.showBack();
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

            addAll(label_categorie, tf_categorie, label_montant, tf_montant, btnRemise);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    
    }
    
}
