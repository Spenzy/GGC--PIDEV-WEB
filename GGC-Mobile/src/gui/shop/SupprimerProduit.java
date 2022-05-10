/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class SupprimerProduit extends Form{
    public SupprimerProduit(Produit p, Form previous) {
        setTitle("Suppression Produit");
        setLayout(BoxLayout.yCenter());
        Label libelle=new Label("Libelle : "+p.getLibelle());
        Label categorie=new Label("Categorie : "+p.getCategorie());
        Label description=new Label("Description : "+p.getDescription());
        Label prix=new Label("Prix : "+p.getPrix());
        Label note=new Label("Note : "+p.getNote());
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");
        
            btnret.addActionListener(e -> new ListProduitForm(previous).showBack());
        
        
        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                    Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));
             
                    
                    if (ServiceProduit.getInstance().SupprimerProduit(p)) {
                        Dialog.show("Success", "suppression avec succes", new Command("OK"));
                        previous.showBack();
                    } else {
                        Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                    }
                        
                }
      
        });
        

        addAll(libelle,categorie,description,prix,note,btnSubmit,btnret);
      //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
}
