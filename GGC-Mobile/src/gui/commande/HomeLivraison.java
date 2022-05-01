/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import gui.BaseForm;

/**
 *
 * @author Mr
 */
public class HomeLivraison extends BaseForm{
    public HomeLivraison() {
        setTitle("Livraisons");
        setLayout(BoxLayout.yCenter());

        Button btnAdd= new Button("Ajouter Livraison");
        Button btnList = new Button("Liste des Livraisons");

        btnAdd.addActionListener(e -> new AjouterLivraison().show());
        btnList.addActionListener(e -> new ListeLivraisons().show());
        addAll(btnAdd, btnList);

    }
}
