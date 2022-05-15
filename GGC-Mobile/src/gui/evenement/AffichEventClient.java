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
public class AffichEventClient extends Form {

    public AffichEventClient(Form previous) {
        setTitle("Liste des Evenements");
        setLayout(BoxLayout.yCenter());

        for (Evenement e : ServiceEvenement.getInstance().affichageEvenement()) {
            Container c = new Container(BoxLayout.yCenter());

            MultiButton mb = new MultiButton(" titre : " + e.getTitre()  +"    "+   " Ville : " + e.getLocalisation());
            mb.addActionListener(a -> new DetailsEventClient(e, previous).show());

            Container c2 = new Container(BoxLayout.xCenter());

            c.addAll(mb, c2);
            add(c);

        }

        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
