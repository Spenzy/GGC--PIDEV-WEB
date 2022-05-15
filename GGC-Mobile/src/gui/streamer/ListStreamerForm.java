/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.streamer;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Streamer;
import services.ServiceStreamer;
import utils.Statics;

/**
 *
 * @author msi
 */
public class ListStreamerForm extends Form {

    public ListStreamerForm(Form previous) {
        setTitle("Liste des Streamer");
        setLayout(BoxLayout.yCenter());
        Button ajout=new Button("Ajouter");
        if (Statics.userid == 1) {
            add(ajout);
        }
        ajout.addActionListener(l->new AjouterStreamer(previous).show());
        for (Streamer p : ServiceStreamer.getInstance().getAllStreamers()) {
            Container c = new Container(BoxLayout.yCenter());
            
            MultiButton mb = new MultiButton("Informations : " + p.getInformations() +" LienStreaming : "+p.getLienStreaming());
            mb.addActionListener(a -> new DetailStreamer(p, previous).show());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierStreamer(p, previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(e -> new SupprimerStreamer(p, previous).show());

            
            Container c2 = new Container(BoxLayout.xCenter());
            if(Statics.userid==1){
            c2.add(delete);
            c2.add(update);}
            c.addAll(mb,c2);
            add(c);

        }
        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
