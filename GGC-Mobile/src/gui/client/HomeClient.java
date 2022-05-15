/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.client;

import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import gui.personne.ListPersonneForm;

/**
 *
 * @author Dell
 */
public class HomeClient extends Form{
     Form current;
    public HomeClient(Form previous) {
        current = this;
        setTitle("Gestion user");
        setLayout(BoxLayout.yCenter());

        Button btnList = new Button("Liste des Utilisateurs");
        

//        btnList.addActionListener(e -> new ListeClientForm(current).show());
        btnList.addActionListener(e -> new ListPersonneForm(current).show());       
        addAll(btnList);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());

    }
    
}
