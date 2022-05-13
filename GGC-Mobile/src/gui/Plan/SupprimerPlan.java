/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.Plan;

import static com.codename1.push.PushContent.setTitle;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Plan;
import entities.Streamer;
import gui.streamer.ListStreamerForm;
import services.ServicePlan;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class SupprimerPlan extends Form {
    public SupprimerPlan(Plan p, Form previous) {
        setTitle("Suppression Plan");
        setLayout(BoxLayout.yCenter());
        Label nomstreamer = new Label("idStreamer: "+ p.getNomstreamer());
        Label description=new Label("description : "+p.getDescription());
        
        
        Label date=new Label("date : "+p.getDate());
        
        Label heure = new Label("Heure "+ p.getHeure());
        Label duree = new Label("Duree "+ p.getDuree());
        
        Label idevent = new Label("Event id "+ p.getIdEvennement());
        
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");
        
            btnret.addActionListener(e -> new ListPlanForm(previous).showBack());
        
        
        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                    Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));
             
                    
                    if (ServicePlan.getInstance().SupprimerPlan(p)) {
                        Dialog.show("Success", "suppression avec succes", new Command("OK"));
                        previous.showBack();
                    } else {
                        Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                    }
                        
                }
      
        });
        

        addAll(nomstreamer,description,date,heure,duree,idevent,btnSubmit,btnret,btnSubmit);
      //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
    
}
