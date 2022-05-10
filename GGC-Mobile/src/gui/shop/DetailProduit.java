/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import gui.HomeForm;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class DetailProduit extends Form {

    Form current;
    Image imgg = null;
    ImageViewer iv = null;
    EncodedImage ec;

    public DetailProduit(Produit p, Form previous) {
        setTitle("Detail produit");
        setLayout(BoxLayout.yCenter());
        
        //ajout image
        
        //ajout informations
        Label libelle=new Label("Libelle : "+p.getLibelle());
        Label categorie=new Label("Categorie : "+p.getCategorie());
        Label description=new Label("Description : "+p.getDescription());
        Label prix=new Label("Prix : "+p.getPrix());
        Label note=new Label("Note : "+p.getNote());

        addAll(libelle,categorie,description,prix,note);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new ListProduitForm(previous).showBack());

    }

}
