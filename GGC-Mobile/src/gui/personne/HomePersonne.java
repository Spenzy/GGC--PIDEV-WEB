/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

import gui.client.AjouterClient;
import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import gui.commande.AjouterLivraison;
import gui.commande.ListeLivraisons;
import gui.shop.ListProduitForm;
import services.ServiceLivraison;

/**
 *
 * @author Dell
 */
public class HomePersonne extends Form {
    Form current;
    public HomePersonne(Form previous) {
        current = this;
        setTitle("Personnes");
        setLayout(BoxLayout.yCenter());

        Button btnAdd = new Button("Ajouter Personne");
        Button btnList = new Button("Liste des Personnes");
        

        btnAdd.addActionListener(e -> new AjouterClient(previous).show());
//        btnList.addActionListener(e -> new ListPersonneForm(current).show());
       
        addAll(btnAdd);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());

    }
    
    
}
