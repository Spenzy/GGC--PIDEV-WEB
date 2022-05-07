/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commentaire;
import gui.HomeForm;
import services.ServiceCommentaire;

/**
 *
 * @author Spenz
 */
public class EditCommentaireForm extends Form{
    
    public EditCommentaireForm(Form previous, Commentaire c) {
        /*
        Le paramètre previous définit l'interface(Form) précédente.
        Quelque soit l'interface faisant appel à AddTask, on peut y revenir
        en utilisant le bouton back
        */
        this.setTitle("Modifier Commentaire");
        this.setLayout(BoxLayout.y());
        
        TextField tfDesc = new TextField("","Tapez votre commentaire");
        tfDesc.setText(c.getDescription());
        Button btnValider = new Button("Appliquer");
        
        btnValider.addActionListener((ActionListener) (ActionEvent evt) -> {
            if ((tfDesc.getText().length()==0))
                Dialog.show("Alert", "Votre commentaire est vide!", new Command("OK"));
//            else if (BadWordFilter.filterText(tfDesc.getText()))
//                Dialog.show("Alert", "Veuillez réviser votre commentaire(mot vulgère détectée)!", new Command("OK"));
            else
            {
                c.setDescription(tfDesc.getText());
                
                if( ServiceCommentaire.getInstance().modifCommentaire(c) ){
                    Dialog.show("Success","Commentaire modifié",new Command("OK"));
                    previous.show();
                }
                else
                    Dialog.show("ERROR", "Erreur serveur", new Command("OK"));
            }
        });
        
        this.addAll(tfDesc,btnValider);
        this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK
                , e-> previous.showBack()); // Revenir vers l'interface précédente
                
    }
    
}
