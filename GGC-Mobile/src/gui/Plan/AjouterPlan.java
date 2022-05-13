/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.Plan;

import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.spinner.Picker;
import entities.Livreur;
import entities.Streamer;
import java.util.ArrayList;
import services.ServiceLivraison;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class AjouterPlan extends Form {
    
    public AjouterPlan(Form previous) {
       
             /* 
            Le paramètre previous définit l'interface(Form) précédente.
            Quelque soit l'interface faisant appel à AddTask, on peut y revenir
            en utilisant le bouton back
            */
            setTitle("Ajouter un Plan");
            setLayout(BoxLayout.y());

            Label label_Streamer = new Label("Streamer");
        ComboBox<Integer> cb_streamer = new ComboBox<>();
        ArrayList<Streamer> streamers = ServiceStreamer.getInstance().getAllStreamers();
        for (int i = 0; i < streamers.size(); i++) {
            cb_streamer.addItem(streamers.get(i).getIdStreamer());
        }

        Label label_date = new Label("Date");
        Picker date = new Picker();
        
        Label label_heure = new Label("heure");
        Picker heure = new Picker();
        heure.setType(Display.PICKER_TYPE_TIME);
        
         /*
                
                + "?idPlan="+ p.getIdPlan()+ "&idStreamer=" + p.getIdStreamer() + "&date=" + p.getDate()
                + "&heure=" + p.getHeure()  + "&duree=" + p.getDuree()
                + "&description=" + p.getDescription()+ "&idEvennement=" + p.getIdEvennement();
                */
        
        
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
                            if ((cb_streamer.getName().length() == 0) || (tf_informations.getText().length() == 0) || (tf_lienStreaming.getText().length() == 0) ) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    Streamer p = new Streamer(Integer.parseInt(cb_streamer.getName()), tf_informations.getText(), tf_lienStreaming.getText());
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

            addAll(label_Streamer, cb_streamer, label_informations, tf_informations, label_lienStreaming, tf_lienStreaming, btnAjout);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    
    
    
    }
    }
    

