/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

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
import com.codename1.ui.spinner.Picker;
import entities.Personne;
import entities.Produit;

import java.util.Date;
import services.ServicePersonne;
import services.ServiceProduit;

/**
 *
 * @author Dell
 */
public class AjouterPersonne extends Form {
    public AjouterPersonne(Form previous) {
       
            /*
            Le paramètre previous définit l'interface(Form) précédente.
            Quelque soit l'interface faisant appel à AddTask, on peut y revenir
            en utilisant le bouton back
            */
            setTitle("Ajouter un Personne");
            setLayout(BoxLayout.y());

            Label label_nom = new Label("Nom");
            TextField tf_nom = new TextField("", "", 20, TextArea.ANY);
            Label label_prenom = new Label("Prenom");
            TextField tf_prenom = new TextField("", "", 20, TextArea.ANY);
            Label label_dateNaissance = new Label("DateNaissance");
            Picker date = new Picker();
            Label label_email = new Label("Email");
            TextField tf_email = new TextField("", "", 60, TextArea.ANY);
            Label label_telephone = new Label("Telephone");
            TextField tf_telephone = new TextField("", "", 10, TextArea.DECIMAL);
            Label label_password = new Label("Password");
            TextField tf_password = new TextField("", "", 20, TextArea.ANY);
            
            
        
                    
        
            Button btnAjout = new Button("inscrir");

            btnAjout.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            if ((tf_nom.getText().length() == 0) || (tf_prenom.getText().length() == 0) || (tf_telephone.getText().length() == 0) || (tf_email.getText().length() == 0) || (tf_password.getText().length() == 0)) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    Personne p = new Personne(tf_nom.getText(), tf_prenom.getText(), date.getDate(), tf_email.getText(), Integer.parseInt(tf_telephone.getText()), tf_password.getText());
                                    if (ServicePersonne.getInstance().addPersonne(p)) {
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

            addAll(label_nom, tf_nom, label_prenom, tf_prenom, label_dateNaissance, date, label_email, tf_email, label_telephone, tf_telephone, label_password, tf_password,btnAjout);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    }

}
