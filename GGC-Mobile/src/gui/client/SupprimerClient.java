/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.client;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Client;
import entities.Personne;
import gui.shop.ListProduitForm;
import services.ServicePersonne;

/**
 *
 * @author Dell
 */
public class SupprimerClient extends Form {
    public SupprimerClient(Client p, Form previous) {
        setTitle("Suppression Produit");
        setLayout(BoxLayout.yCenter());
        Label nbr=new Label("nbr : "+p.getNbrAvertissement());
        Label ban=new Label("ban : "+p.getBan());
      
        Button btnSubmit = new Button("Supprimer");
        Button btnret = new Button("retour");
        
            btnret.addActionListener(e -> new ListProduitForm(previous).showBack());
        
        
        btnSubmit.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                    Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));
             
                    
                    if (ServicePersonne.getInstance().SupprimerPersonne(p)) {
                        Dialog.show("Success", "suppression avec succes", new Command("OK"));
                        previous.showBack();
                    } else {
                        Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
                    }
                        
                }
      
        });
        

        addAll(nbr,ban,btnSubmit,btnret);
      //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
    
}
