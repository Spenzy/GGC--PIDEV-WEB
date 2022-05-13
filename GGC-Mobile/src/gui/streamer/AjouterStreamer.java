/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.streamer;

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
import entities.Streamer;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class AjouterStreamer extends Form {
    
    
    public AjouterStreamer(Form previous) {
       
            /*
            Le paramètre previous définit l'interface(Form) précédente.
            Quelque soit l'interface faisant appel à AddTask, on peut y revenir
            en utilisant le bouton back
            */
            setTitle("Ajouter un Streamer");
            setLayout(BoxLayout.y());

            Label label_idStreamer = new Label("Id Streamer");
            TextField tf_idStreamer = new TextField("", "", 20, TextArea.ANY);
            Label label_informations = new Label("informations");
            TextField tf_informations = new TextField("", "", 20, TextArea.ANY);
            Label label_lienStreaming = new Label("lienStreaming");
            TextField tf_lienStreaming = new TextField("", "", 20, TextArea.ANY);
    
    
    

    
            Button btnAjout = new Button("ajouter");

            btnAjout.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            if ((tf_idStreamer.getText().length() == 0) || (tf_informations.getText().length() == 0) || (tf_lienStreaming.getText().length() == 0) ) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    Streamer p = new Streamer(Integer.parseInt(tf_idStreamer.getText()), tf_informations.getText(), tf_lienStreaming.getText());
                                    if (ServiceStreamer.getInstance().addStreamer(p)) {
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

            addAll(label_idStreamer, tf_idStreamer, label_informations, tf_informations, label_lienStreaming, tf_lienStreaming, btnAjout);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    
    
    
    }
    }
