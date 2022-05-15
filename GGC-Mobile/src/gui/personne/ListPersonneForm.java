/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.personne;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Personne;
import entities.Produit;
import gui.shop.DetailProduit;
import gui.shop.ModifierProduit;
import gui.shop.SupprimerProduit;
import services.ServicePersonne;
import services.ServiceProduit;

/**
 *
 * @author Dell
 */
public class ListPersonneForm extends Form {
     public ListPersonneForm(Form previous) {
        setTitle("Liste des Personnes");
        setLayout(BoxLayout.yCenter());

        for (Personne p : ServicePersonne.getInstance().getAllPersonnes()) {
            Container c = new Container(BoxLayout.yCenter());
            
            MultiButton mb = new MultiButton("Nom : " + p.getNom()+" Email : "+p.getEmail());
            mb.addActionListener(a -> new DetailPersonne(p, previous).show());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierPersonne(p, previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(e -> new SupprimerPersonne(p, previous).show());

            
            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(delete);
            c2.add(update);
            c.addAll(mb,c2);
            add(c);

        }
        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
