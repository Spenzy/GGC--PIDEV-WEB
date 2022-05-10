/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.layouts.BoxLayout;
import entities.Publication;

/**
 *
 * @author Spenz
 */
public class ShowPublicationContainer extends Container{
    //constructor
    public ShowPublicationContainer(Form previous, Publication publication) {
        
        //this
        this.setLayout(BoxLayout.y());
        previous.setTitle("Publication");

        //conponents
        TextArea titre = new TextArea(publication.getTitre());
        titre.setEditable(false);
        titre.getAllStyles().setFgColor(0x808080);
        
        TextArea desc = new TextArea(publication.getDesc());
        desc.setEditable(false);
        
        Label date = new Label(publication.getDatePub().toString());
        
        Label nbrVotes = new Label(Integer.toString(publication.getNbrVote()));
        Label nbrCommentaire = new Label(Integer.toString(publication.getNbrCommentaire()));

        Container publicationBody = new Container(BoxLayout.y());
        Container publicationInfo = new Container(BoxLayout.x());
        
        publicationInfo.addAll(nbrVotes, nbrCommentaire);
        publicationBody.addAll(date,titre,desc, publicationInfo);
        
        
        
        Button btnCommenter = new Button("Commenter");
        btnCommenter.addActionListener((connexion)->{
            AddCommentaireForm addCommentaire = new AddCommentaireForm(previous, publication.getId_publication());
            addCommentaire.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
            addCommentaire.showBack();
        });
        this.addAll(publicationBody, btnCommenter);
    }

}
