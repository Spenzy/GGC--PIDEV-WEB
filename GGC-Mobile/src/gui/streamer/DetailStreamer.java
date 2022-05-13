/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.streamer;

import com.codename1.components.ImageViewer;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Streamer;

/**
 *
 * @author msi
 */
public class DetailStreamer extends Form {

    Form current;
    

    public DetailStreamer(Streamer p, Form previous) {
        setTitle("Detail Streamer");
        setLayout(BoxLayout.yCenter());
        
        
        Label informations=new Label("Informations : "+p.getInformations());
        Label lienStreaming=new Label("LienStreaming : "+p.getLienStreaming());
        
        addAll(informations,lienStreaming);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new ListStreamerForm(previous).showBack());

    }

}