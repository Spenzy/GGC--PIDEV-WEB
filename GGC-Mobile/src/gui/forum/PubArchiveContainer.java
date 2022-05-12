/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.components.OnOffSwitch;
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
import utils.Statics;

/**
 *
 * @author Spenz
 */
public class PubArchiveContainer extends Container{
    //constructor
    public PubArchiveContainer(Form previous, Publication publication) {
        
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
        
        
        
        publicationInfo.addAll(nbrVotes, nbrCommentaire);
        publicationBody.addAll(date, titre, publicationInfo);

        this.add(publicationBody);
    }
        
}
