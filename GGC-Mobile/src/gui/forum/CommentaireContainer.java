/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commentaire;
import services.ServiceCommentaire;

/**
 *
 * @author Spenz
 */
public class CommentaireContainer extends Container{
    //constructor
    public CommentaireContainer(Form previous, Commentaire commentaire) {
        
        //this
        this.setLayout(BoxLayout.yCenter());

        //conponents
        TextArea desc = new TextArea(commentaire.getDescription());
        desc.getAllStyles().setFgColor(0x808080);
 
        //Label date = new Label(commentaire.getDatePost().toString());
        Label date = new Label(commentaire.getDatePost().toString());

        Container publicationBody = new Container(BoxLayout.y());
        
        publicationBody.addAll(date,desc);
        Button btnModifier = new Button("Modifier");
        btnModifier.addActionListener((cnx)->{
            EditCommentaireForm editCommentaire = new EditCommentaireForm(previous, commentaire);
            editCommentaire.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
            editCommentaire.showBack();
        });
        Button btnSupp = new Button("Supprimer");
        btnSupp.addActionListener((ActionEvent evt) -> {
            Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));
            
            if (ServiceCommentaire.getInstance().supprimerCommentaire(commentaire.getId_commentaire())) {
                Dialog.show("Success", "suppression avec succes", new Command("OK"));
                previous.showBack();// Revenir vers l'interface précédente
            } else {
                Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
            }
        });
        
        
        Container cntEditSupp = new Container(BoxLayout.x());
        cntEditSupp.addAll(btnModifier, btnSupp);

        this.addAll(publicationBody, cntEditSupp);
    }
        
}
