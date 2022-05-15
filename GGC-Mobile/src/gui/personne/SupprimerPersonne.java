/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

import static com.codename1.push.PushContent.setTitle;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Livraison;
import entities.Personne;
import entities.Produit;
import gui.commande.ListeLivraisons;
import gui.shop.ListProduitForm;
import services.ServiceLivraison;
import services.ServicePersonne;
import services.ServiceProduit;



/**
 *
 * @author Dell
 */
public class SupprimerPersonne extends Form {
    public SupprimerPersonne(Personne p, Form previous) {
        setTitle("Suppression Produit");
        setLayout(BoxLayout.yCenter());
        Label nom=new Label("Libelle : "+p.getNom());
        Label prenom=new Label("Categorie : "+p.getPrenom());
        Label email=new Label("Description : "+p.getEmail());
        Label telephone=new Label("Prix : "+p.getTelephone());
        Label date=new Label("Note : "+p.getDateNaissance());
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
        

        addAll(nom,prenom,email,telephone,date,btnSubmit,btnret);
      //  this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
}
