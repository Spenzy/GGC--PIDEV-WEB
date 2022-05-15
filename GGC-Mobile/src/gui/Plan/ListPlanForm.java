/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.Plan;

import com.codename1.components.MultiButton;
import static com.codename1.push.PushContent.setTitle;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Plan;
import gui.streamer.AjouterStreamer;

import services.ServicePlan;
import utils.Statics;

/**
 *
 * @author msi
 */
public class ListPlanForm extends Form {

    public ListPlanForm(Form previous) {
        setTitle("Liste des Plan");
        setLayout(BoxLayout.yCenter());

        Button ajout = new Button("Ajouter");
        if (Statics.userid == 1) {
            add(ajout);
        }
        ajout.addActionListener(l -> new AjouterPlan(previous).show());
        for (Plan p : ServicePlan.getInstance().getAllPlans()) {
            Container c = new Container(BoxLayout.yCenter());
            System.out.println("p");
            //public Plan(int idPlan, int idStreamer, Date date, Date heure, float duree, String Description, int idEvennement)
            MultiButton mb = new MultiButton("idStreamer : " + p.getNomstreamer() + " description : " + p.getDescription() + "date" + p.getDate() + "heure" + p.getHeure() + "duree" + p.getDuree() + "idEvennement" + p.getIdEvennement());
            mb.addActionListener(a -> new DetailPlan(p, previous).show());
            //System.out.println(user.getId());
            Button update = new Button("Modifier");

            update.addActionListener(e -> new ModifierPlan(p, previous).show());
            Button delete = new Button("Supprimer");

            delete.addActionListener(e -> new SupprimerPlan(p, previous).show());

            Container c2 = new Container(BoxLayout.xCenter());
            if (Statics.userid == 1) {
                c2.add(delete);
                c2.add(update);
            }
            c.addAll(mb, c2);
            this.add(c);

        }

        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
