/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
/**
 *
 * @author Mr
 */
public class HomeLivraison extends Form {

    public HomeLivraison(Form previous) {
        setTitle("Livraisons");
        setLayout(BoxLayout.yCenter());

        Button btnAdd = new Button("Ajouter Livraison");
        Button btnList = new Button("Liste des Livraisons");

        btnAdd.addActionListener(e -> new AjouterLivraison(previous).show());
        btnList.addActionListener(e -> new ListeLivraisons(previous).show());
        addAll(btnAdd, btnList);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());

    }
}
