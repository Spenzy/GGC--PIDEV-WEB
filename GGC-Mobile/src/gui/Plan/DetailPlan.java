/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.Plan;

import com.codename1.components.ImageViewer;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Plan;
import entities.Streamer;
import gui.streamer.ListStreamerForm;

/**
 *
 * @author msi
 */
public class DetailPlan extends Form {

    Form current;
    

    public DetailPlan(Plan p, Form previous) {
        setTitle("Detail Plan");
        setLayout(BoxLayout.yCenter());
        
       /* Label l = new Label(" ");
        l.setUIID("Separator");
        
        */
        
        
        Label nomstreamer = new Label("Streamer: "+ p.getNomstreamer());
        Label description=new Label("Description : "+p.getDescription());
        
        
        Label date=new Label("Date : "+p.getDate());
        
        Label heure = new Label("Heure "+ p.getHeure());
        Label duree = new Label("Duree "+ p.getDuree());
        
        Label idevent = new Label("Event id "+ p.getIdEvennement());
        
        addAll(description,date,nomstreamer,duree,heure,idevent);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new ListPlanForm(previous).showBack());

    }

}
