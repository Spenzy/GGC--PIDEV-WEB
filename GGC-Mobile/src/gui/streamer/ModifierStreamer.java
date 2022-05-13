/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.streamer;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Streamer;
import services.ServiceStreamer;

/**
 *
 * @author msi
 */
public class ModifierStreamer extends Form {
    

    Form current;

    public ModifierStreamer(Streamer p, Form previous) {
        setTitle("Modification Streamer");
        setLayout(BoxLayout.y());
        TextField idStreamer = new TextField(String.valueOf(p.getIdStreamer()), "Id Streamer");
        TextField tfInfo = new TextField(p.getInformations(), "Informations du streamer");
        TextField tfLS = new TextField(p.getLienStreaming(), "Lien Streaming");
        
        Button btnValider = new Button("Modifier Streamer");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(e -> new ListStreamerForm(previous).showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfLS.getText().length() == 0) && (tfInfo.getText().length() == 0)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                } else {
                    try {
                        Streamer p = new Streamer(Integer.parseInt(idStreamer.getText()), tfInfo.getText(), tfLS.getText());

                        if (ServiceStreamer.getInstance().modifierStreamer(p)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new ListStreamerForm(previous).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(idStreamer, tfInfo, tfLS);
        // getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> this.previous.showBack());

    }

    
}
