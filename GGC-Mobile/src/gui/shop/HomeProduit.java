/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;

/**
 *
 * @author dell
 */
public class HomeProduit extends Form {

    Form current;

    /*Garder traçe de la Form en cours pour la passer en paramètres 
    aux interfaces suivantes pour pouvoir y revenir plus tard en utilisant
    la méthode showBack*/

    public HomeProduit(Form previous) {
        current = this; //Récupération de l'interface(Form) en cours
        setTitle("Shop");
        setLayout(BoxLayout.yCenter());

        add(new Label("Choisissez une option"));
        Button btnAdd = new Button("Ajouter Produit");
        Button btnList = new Button("Liste des Produits");

        btnAdd.addActionListener(e -> new AjouterProduit(current).show());
        btnList.addActionListener(e -> new ListProduitForm(current).show());
        addAll(btnAdd, btnList);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());

    }

}
