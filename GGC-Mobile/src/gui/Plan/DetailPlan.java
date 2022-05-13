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
    Image imgg = null;
    ImageViewer iv = null;
    EncodedImage ec;

    public DetailPlan(Plan p, Form previous) {
        setTitle("Detail Plan");
        setLayout(BoxLayout.yCenter());
        
        Label l = new Label(" ");
        l.setUIID("Separator");
        
        
        Label description=new Label("Informations : "+p.getDescription());
        Label date=new Label("LienStreaming : "+p.getDate());
        Label nonstreamer = new Label("Streamer: "+ p.getNomstreamer());
        Label duree = new Label("Duree "+ p.getDuree());
        Label heure = new Label("Duree "+ p.getHeure());
        Label idevent = new Label("Event id "+ p.getIdEvennement());
        
        addAll(description,date,nonstreamer,duree,heure,idevent);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new ListStreamerForm(previous).showBack());

    }

}
