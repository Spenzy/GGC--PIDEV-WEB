/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Evenement;
import services.ServiceEvenement;

/**
 *
 * @author dell
 */
public class AjouterEvent extends Form {

    private Image img;
    private String imgPath;

    public AjouterEvent(Form previous) {

        /*
            Le paramètre previous définit l'interface(Form) précédente.
            Quelque soit l'interface faisant appel à AddTask, on peut y revenir
            en utilisant le bouton back
         */
        setTitle("Ajouter un Evenement");
        setLayout(BoxLayout.y());

        Label label_reference = new Label("Reference");
        TextField tf_reference = new TextField("", "", 20, TextArea.ANY);
        
        Label label_localisation = new Label("localisation");
        TextField tf_localisation = new TextField("", "", 20, TextArea.ANY);
        
         Label label_description = new Label("description");
        TextField tf_description = new TextField("", "", 20, TextArea.ANY);
        
        Label label_nbrParticipant = new Label("nbrParticipant");
        TextField tf_nbrParticipant = new TextField("", "", 60, TextArea.DECIMAL);
        
        Label label_titre = new Label("titre");
        TextField tf_titre = new TextField("", "", 10,TextArea.ANY);

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
                if ((tf_reference.getText().length() == 0) || (tf_description.getText().length() == 0) || (tf_nbrParticipant.getText().length() == 0) || (tf_titre.getText().length() == 0)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                } else {
                    try {
//                        Evenement e = new Evenement(Integer.parseInt(tf_reference.getText()), tf_description.getText(), tf_nbrParticipant.getText(), tf_titre.getText());
                        Evenement e = new Evenement(Integer.parseInt(tf_reference.getText()),tf_localisation.getText(), tf_description.getText(), Integer.parseInt(tf_nbrParticipant.getText()), tf_titre.getText());
                    
                        if (ServiceEvenement.getInstance().ajouterEvenement(e)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            previous.showBack();
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

        addAll(label_reference, tf_reference, label_localisation, tf_localisation  ,label_description ,tf_description, label_nbrParticipant,tf_nbrParticipant,label_titre, tf_titre, btnAjout);

        getToolbar()
                .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                        e -> previous.showBack()); // Revenir vers l'interface précédente

    }

}
