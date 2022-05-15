/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.evenement;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Evenement;
import entities.Produit;
import gui.HomeForm;
import services.ServiceEvenement;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class ModifierEvenement extends Form {

    Form current;

    public ModifierEvenement(Evenement e, Form previous) {
        setTitle("edit event");
        setLayout(BoxLayout.y());
        TextField reference = new TextField(String.valueOf(e.getReference()), "reference evenement");
        TextField tflocalisation = new TextField(e.getLocalisation(), "localisation evenement");
        TextField tfdescription = new TextField(e.getDescription(), "description evenement");
        TextField tfNbrParticipant = new TextField(String.valueOf(e.getNbrParticipant()), "nbrParticipant evenement");
        TextField tftitre = new TextField(e.getTitre(), "titre evenement");

        Button btnValider = new Button("Modifier Evenement");
        Button btnRet = new Button("Retour");
        btnRet.addActionListener(a -> new AffichEvent(previous).showBack());

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((reference.getText().length() == 0) && (tflocalisation.getText().length() == 0) && (tfdescription.getText().length() == 0) && (tfNbrParticipant.getText().length() == 0) && (tftitre.getText().length() == 0)) {
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                } else {
                    try {
                        Evenement e = new Evenement(Integer.parseInt(reference.getText()), tflocalisation.getText(), tfdescription.getText(), Integer.parseInt(tfNbrParticipant.getText()), tftitre.getText());
                        if (ServiceEvenement.getInstance().modifierEvent(e)) {
                            Dialog.show("Success", "Connection accepted", new Command("OK"));
                            new AffichEvent(previous).showBack(); // Revenir vers l'interface précédente
                        } else {
                            Dialog.show("ERROR", "Server error", new Command("OK"));
                        }
                    } catch (NumberFormatException e) {
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }

                }

            }

        });

        addAll(reference, tflocalisation, tfdescription, tfNbrParticipant, tftitre, btnValider, btnRet);
        // getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> this.previous.showBack());

    }

}
