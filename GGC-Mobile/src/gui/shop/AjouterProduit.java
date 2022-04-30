/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.capture.Capture;
import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import java.io.IOException;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class AjouterProduit extends Form {
    private Image img;
    private String imgPath;

    public AjouterProduit(Form previous) {
       
            /*
            Le paramètre previous définit l'interface(Form) précédente.
            Quelque soit l'interface faisant appel à AddTask, on peut y revenir
            en utilisant le bouton back
            */
            setTitle("Ajouter un Produit");
            setLayout(BoxLayout.y());

            Label label_reference = new Label("Reference");
            TextField tf_reference = new TextField("", "", 20, TextArea.ANY);
            Label label_categorie = new Label("Categorie");
            TextField tf_categorie = new TextField("", "", 20, TextArea.ANY);
            Label label_libelle = new Label("Libelle");
            TextField tf_libelle = new TextField("", "", 20, TextArea.ANY);
            Label label_description = new Label("Description");
            TextField tf_description = new TextField("", "", 60, TextArea.ANY);
            Label label_prix = new Label("Prix");
            TextField tf_prix = new TextField("", "", 10, TextArea.DECIMAL);
            
            
           /* Label label_image = new Label("Image");
            TextField tf_image = new TextField();
            Button btnUploadImg = new Button("Add Image to DB");
            ImageViewer iv = new ImageViewer(Image.createImage("/placeholder2.png"));

            iv.addPointerReleasedListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            try {
                                imgPath = Capture.capturePhoto(Display.getInstance().getDisplayWidth(), -1);
                                img = Image.createImage(imgPath);
                                iv.setImage(img);
                            } catch (IOException ex) {
                                System.out.println(ex);
                            }
                        }
                    }
            );
            btnUploadImg.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            addImage(imgPath);
                        }

                private void addImage(String imgPath) {
                    
                }
                    });
            */
            Button btnAjout = new Button("ajouter");

            btnAjout.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            if ((tf_reference.getText().length() == 0) || (tf_libelle.getText().length() == 0) || (tf_categorie.getText().length() == 0) || (tf_description.getText().length() == 0) || (tf_prix.getText().length() == 0)) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    Produit p = new Produit(Integer.parseInt(tf_reference.getText()), tf_libelle.getText(), tf_categorie.getText(), tf_description.getText(), Float.parseFloat(tf_prix.getText()), "");
                                    if (ServiceProduit.getInstance().addProduct(p)) {
                                        Dialog.show("Success", "Connection accepted", new Command("OK"));
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

            addAll(label_reference, tf_reference, label_libelle, tf_libelle, label_categorie, tf_categorie, label_description, tf_description, label_prix, tf_prix, btnAjout);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    }

}
