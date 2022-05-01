/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.components.MultiButton;
import com.codename1.components.SpanLabel;
import com.codename1.ui.Button;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class ListProduitForm extends Form {

    public ListProduitForm(Form previous) {
        setTitle("Liste des Produit");
        setLayout(BoxLayout.yCenter());

        for (Produit p : ServiceProduit.getInstance().getAllProducts()) {
            Container c = new Container(BoxLayout.yCenter());
            
            MultiButton mb = new MultiButton("Libelle : " + p.getLibelle() +" Prix : "+p.getPrix());
            mb.addActionListener(a -> new DetailProduit(p, previous).show());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierProduit(p, previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(e -> new SupprimerProduit(p, previous).show());

            
            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(delete);
            c2.add(update);
            c.addAll(mb,c2);
            add(c);

        }
        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
