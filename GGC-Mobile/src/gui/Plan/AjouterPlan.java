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
import entities.Plan;
import entities.Streamer;
import java.util.ArrayList;
import services.ServicePlan;
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
        
         Label label_duree = new Label("duree");
         TextField tf_duree = new TextField("", "", 20, TextArea.ANY);
         
         Label label_description = new Label("description");
         TextField tf_description = new TextField("", "", 20, TextArea.ANY);
         
         Label label_idEvennement = new Label("idEvennement");
         TextField tf_idEvennement = new TextField("", "", 20, TextArea.ANY);
        
        
            Button btnAjout = new Button("ajouter");

            btnAjout.addActionListener(
                    new ActionListener() {
                        @Override
                        public void actionPerformed(ActionEvent evt
                        ) {
                            if ((cb_streamer.getName().length() == 0) || (tf_description.getText().length() == 0) ) {
                                Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                            } else {
                                try {
                                    
                                    /*
                
                + "?idPlan="+ p.getIdPlan()+ "&idStreamer=" + p.getIdStreamer() + "&date=" + p.getDate()
                + "&heure=" + p.getHeure()  + "&duree=" + p.getDuree()
                + "&description=" + p.getDescription()+ "&idEvennement=" + p.getIdEvennement();
                                    
                                    //public Plan(int idPlan, int idStreamer, Date date, Date heure, float duree, String Description, int idEvennement)
                */
                                    
                                    Plan c = new Plan();
                                    c.setIdStreamer(cb_streamer.getSelectedItem());
                                    c.setDate(date.getDate());
                                    c.setHeure(heure.getDate());
                                    c.setDuree(Integer.parseInt(tf_duree.getText()));
                                    
                                    c.setDescription(tf_description.getText());
                                    c.setIdEvennement(Integer.parseInt(tf_idEvennement.getText()));
                                    
                                    
                                    
                                    if (ServicePlan.getInstance().addPlan(c)) {
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

            addAll(label_Streamer, cb_streamer,label_date,date,label_heure,heure,label_duree,tf_duree, label_description, tf_description, label_idEvennement, tf_idEvennement, btnAjout);

            getToolbar()
                    .addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK,
                            e -> previous.showBack()); // Revenir vers l'interface précédente
        
        
    
    
    
    }
    }
    

