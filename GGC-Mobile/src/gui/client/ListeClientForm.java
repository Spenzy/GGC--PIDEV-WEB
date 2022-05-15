/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package gui.client;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Client;
import entities.Personne;
import gui.personne.DetailPersonne;
import gui.personne.ModifierPersonne;
import gui.personne.SupprimerPersonne;
import services.ServiceClient;
import services.ServicePersonne;

/**
 *
 * @author Dell
 */
public class ListeClientForm extends Form{
     public ListeClientForm(Form previous) {
        setTitle("Liste des Personnes");
        setLayout(BoxLayout.yCenter());

        for (Client p : ServiceClient.getInstance().getAllClient()) {
            Container c = new Container(BoxLayout.yCenter());
            
            MultiButton mb = new MultiButton(" nbrAvertissement : "+p.getNbrAvertissement()+" ban : " + p.getBan());
            mb.addActionListener(a -> new DetailClient(p, previous).show());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierPersonne(p, previous).show());
            Button delete = new Button("Supprimer");
            delete.addActionListener(e -> new SupprimerClient(p, previous).show());

            
            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(delete);
            c2.add(update);
            c.addAll(mb,c2);
            add(c);

        }
        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
}
