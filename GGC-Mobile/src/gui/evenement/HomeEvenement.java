/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import gui.evenement.AffichEvent;
import gui.evenement.AjouterEvent;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class HomeEvenement extends Form {

    Form current;

    /*Garder traçe de la Form en cours pour la passer en paramètres 
    aux interfaces suivantes pour pouvoir y revenir plus tard en utilisant
    la méthode showBack*/

    public HomeEvenement(Form previous,Resources res) {
        Form current; //Récupération de l'interface(Form) en cours
        setTitle("Evenement");
        setLayout(BoxLayout.yCenter());

        add(new Label("Choisissez une option"));
        Button btnAdd = new Button("Ajouter Evenement");
        Button btnList = new Button("Liste des Evenements");
        Button btnModifier = new Button("Modifier Evenement");
        Button btnSupprimer = new Button("Supprimer Evenement");
  Button btnmap = new Button("map");
        btnAdd.addActionListener(e -> new AjouterEvent(this).show());
        btnList.addActionListener(e -> new AffichEvent(this).show());
         //btnmap.addActionListener(e -> new MapForm(res,this));
        addAll(btnAdd, btnList,btnmap);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}

