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
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.layouts.BoxLayout;
import entities.Commentaire;
import entities.Publication;
import gui.HomeForm;
import java.util.ArrayList;
import services.ServiceCommentaire;
import services.ServicePublication;

/**
 *
 * @author Spenz
 */
public class PublicationContainer extends Container{
    //constructor
    public PublicationContainer(Form previous, Publication publication) {
        
        //this
        this.setLayout(BoxLayout.yCenter());

        //conponents
        Label titre = new Label(publication.getTitre());
        titre.getAllStyles().setFgColor(0x808080);
 
        Label date = new Label(publication.getDatePub().toString());

        Label nbrVotes = new Label(Integer.toString(publication.getNbrVote()));
        Label nbrCommentaire = new Label(Integer.toString(publication.getNbrCommentaire()));

        Container publicationBody = new Container(BoxLayout.y());
        Container publicationInfo = new Container(BoxLayout.x());
        
        
        Button showBtn = new Button("Show");
        showBtn.addActionListener((connexion)->{
            ShowPublicationContainer showPub = new ShowPublicationContainer(previous, publication);
            Button btnMail = new Button("Email Pub");
            ArrayList<Commentaire> commentaires = ServiceCommentaire.getInstance().getAllCommentaire(publication.getId_publication());
            Form showPubForm = new Form();
            
            showPubForm.add(showPub);
            showPubForm.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
            
            //add mail btn
            btnMail.addActionListener((cnx)->{
//                PdfAPI.createAndSendForumPost("dridi.zied@esprit.tn", publication, commentaires);
            });
            showPubForm.add(btnMail);
            
            //init commentaires
            for(Commentaire c : commentaires){
                CommentaireContainer cc = new CommentaireContainer(previous, c);
                showPubForm.add(cc);
            }
            showPubForm.showBack();
        });
        
        Button btnModifier = new Button("Modifier");
        btnModifier.addActionListener((cnx)->{
            new EditPublicationForm(previous, publication).show();
        });
        Button btnSupp = new Button("Supprimer");
        btnSupp.addActionListener((ActionEvent evt) -> {
            Dialog.show("Alerte", "Etes-vous sur de cette suppression !!", new Command("OK"));

            if (ServicePublication.getInstance().supprimerPublication(publication.getId_publication())) {
                Dialog.show("Success", "suppression avec succes", new Command("OK"));
                previous.showBack();// Revenir vers l'interface précédente
            } else {
                Dialog.show("ERROR", "Erreur de suppression", new Command("OK"));
            }
            
        });
        
        
        Container cntEditSuppShow = new Container(BoxLayout.x());
        if(publication.getId_client()==HomeForm.userid)
            cntEditSuppShow.addAll(btnModifier, btnSupp, showBtn);
        else
            cntEditSuppShow.addAll(showBtn);
        
        publicationInfo.addAll(nbrVotes, nbrCommentaire);
        publicationBody.addAll(date, titre, publicationInfo, cntEditSuppShow);

        this.add(publicationBody);
    }
        
}
