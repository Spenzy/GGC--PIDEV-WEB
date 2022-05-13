/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.streamer;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Streamer;
import gui.shop.ListProduitForm;
import services.ServiceProduit;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class SupprimerStreamer extends Form{
    
    
    public SupprimerStreamer(Streamer p, Form previous) {
        setTitle("Suppression Streamer");
        setLayout(BoxLayout.yCenter());
        Label Informations=new Label("Informations : "+p.getInformations());
        Label lienStreaming=new Label("Categorie : "+p.getLienStreaming());
        
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");
        
            btnret.addActionListener(e -> new ListStreamerForm(previous).showBack());
        
        
        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                    Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));
             
                    
                    if (ServiceStreamer.getInstance().SupprimerStreamer(p)) {
                        Dialog.show("Success", "suppression avec succes", new Command("OK"));
                        previous.showBack();
                    } else {
                        Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                    }
                        
                }
      
        });
        

        addAll(Informations,lienStreaming,btnSubmit,btnret);
      //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
}
