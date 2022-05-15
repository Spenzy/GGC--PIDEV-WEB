/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Evenement;
import entities.Produit;
import services.ServiceEvenement;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class AffichEvent extends Form {

    public AffichEvent(Form previous) {
        setTitle("Liste des Evenements");
        setLayout(BoxLayout.yCenter());

        for (Evenement e : ServiceEvenement.getInstance().affichageEvenement()) {
            Container c = new Container(BoxLayout.yCenter());

            MultiButton mb = new MultiButton("reference : " + e.getReference() + " titre : " + e.getTitre());
            mb.addActionListener(a -> new DetailsEvent(e, previous).show());
//            System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(a -> new ModifierEvenement(e, previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(a -> new SupprimerEvent(e, previous).show());

            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(delete);
            c2.add(update);
            c.addAll(mb, c2);
            add(c);

        }

        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
