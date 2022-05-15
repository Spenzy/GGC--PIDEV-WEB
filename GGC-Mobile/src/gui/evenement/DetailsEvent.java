/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Evenement;
import entities.Produit;
import gui.HomeForm;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class DetailsEvent extends Form {

    Form current;
    Image imgg = null;
    ImageViewer iv = null;
    EncodedImage ec;

    public DetailsEvent(Evenement p, Form previous) {
        setTitle("Detail event");
        setLayout(BoxLayout.yCenter());
        
        //ajout image
        
        //ajout informations
        Label ref=new Label("reference : "+p.getReference());
        Label tit=new Label("titre : "+p.getTitre());
        Label desc=new Label("Description : "+p.getDescription());
        Label loc=new Label("Localisation : "+p.getLocalisation());
//        Label nbr=new Label("nbrpart : "+p.getNbrParticipant());

        addAll(ref,tit,desc,loc);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new AffichEvent(previous).showBack());

    }

}
