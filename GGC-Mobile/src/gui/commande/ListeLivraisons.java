/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.commande;

import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import entities.Livraison;
import services.ServiceLivraison;

/**
 *
 * @author Mr
 */
public class ListeLivraisons extends Form{
      public ListeLivraisons(Form previous) {
        setTitle("Liste des Livraisons");
        setLayout(BoxLayout.yCenter());

        for (Livraison p : ServiceLivraison.getInstance().getAllLivraisons()) {
            Container c = new Container(BoxLayout.yCenter());
            
            
            Label idcommande=new Label("Commande: "+p.getIdCommande());
            Label idlivreur=new Label("Livreur: "+p.getIdLivreur());
            Label date=new Label("Date: "+p.getDateHeure());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierLivraison(p,previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(e -> new SupprimerLivraison(p,previous).show());

            
            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(delete);
            c2.add(update);
            c.addAll(idcommande,idlivreur,date,c2);
            add(c);

        }
        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeLivraison(previous).showBack());
    }

}
