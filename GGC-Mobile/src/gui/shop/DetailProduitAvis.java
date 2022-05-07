/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.components.ImageViewer;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.URLImage;
import com.codename1.ui.layouts.BoxLayout;
import entities.Avis;
import entities.Produit;
import java.io.IOException;
import services.ServiceAvis;

/**
 *
 * @author dell
 */
public class DetailProduitAvis extends Form {

    EncodedImage enc;
    Image imgs;
    ImageViewer imgv;
    String url = "http://localhost/GGC/";

    public DetailProduitAvis(Produit p, int uid, Form previous) {
        setTitle("Details produit");
        setLayout(BoxLayout.y());

        //image
        try {
            enc = EncodedImage.create("/load.png");
        } catch (IOException ex) {
        }
        imgs = URLImage.createToStorage(enc, url + p.getImage(), url + p.getImage(), URLImage.RESIZE_SCALE);
        imgv = new ImageViewer(imgs);

        
        //ajout informations
        Label libelle = new Label("Libelle : " + p.getLibelle());
        Label categorie = new Label("Categorie : " + p.getCategorie());
        Label description = new Label("Description : " + p.getDescription());
        Label prix = new Label("Prix : " + p.getPrix());
        Label note = new Label("Note : " + p.getNote());
        Container pr = new Container(BoxLayout.yCenter());
        pr.addAll(imgv,libelle, categorie, description, prix, note);
        add(pr);

        //ajout des avis
        for (Avis av : ServiceAvis.getInstance().getAllAvis(p)) {
            Container c = new Container(BoxLayout.yCenter());

            //splitpane
            Label client = new Label("Client : " + av.nomclient);
            Label type = new Label("Type : " + av.getType());
            Label descriptionAvis = new Label("Description : " + av.getDescription());

            if (uid == av.getIdClient()) {
                Button update = new Button("Modifier");

                update.addActionListener(e -> new ModifierAvis(p, av, uid, previous).show());
                Button delete = new Button("Supprimer");

                delete.addActionListener(e -> new SupprimerAvis(p, av, uid, previous).show());
                Container c2 = new Container(BoxLayout.xCenter());
                c2.add(delete);
                c2.add(update);
                c.addAll(client, type, descriptionAvis, c2);
            } else {
                c.addAll(client, type, descriptionAvis);
            }
            add(c);

        }

        Button ajouter = new Button("Donner Avis");
        ajouter.addActionListener(e -> new AjoutAvis(p, uid, previous).show());
        add(ajouter);

        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeShop(uid, previous).showBack());
    }

}
