/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.Plan;

import static com.codename1.push.PushContent.setTitle;
import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Plan;
import entities.Streamer;
import gui.streamer.ListStreamerForm;
import services.ServicePlan;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class ModifierPlan extends Form {
    
    Form current;

    public ModifierPlan(Plan p, Form previous) {
        setTitle("Modification Plan");
        setLayout(BoxLayout.y());
        TextField idStreamer = new TextField(String.valueOf(p.getNomstreamer()), "Nom Streamer");
        TextField tfDesc = new TextField(p.getDescription(), "Description du plan");
        TextField tfDuree = new TextField(String.valueOf(p.getDuree()), "Duree du plan");
        
        
        Button btnValider = new Button("Modifier Plan");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(e -> new ListPlanForm(previous).showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfDesc.getText().length() == 0) ) {
                    Dialog.show("Alert", "Please fill the field", new Command("OK"));
                } else {
                    try {
                        Plan p = new Plan();
                                   p.setDuree(Integer.parseInt(tfDuree.getText()));
                                    
                                    p.setDescription(tfDesc.getText());
                        if (ServicePlan.getInstance().modifierPlan(p)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new ListPlanForm(previous).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(idStreamer, tfDesc, tfDuree,btnValider,btnRet);
        // getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> this.previous.showBack());

    }
    
}
