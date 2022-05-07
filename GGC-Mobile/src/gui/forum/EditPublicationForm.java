/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import entities.Publication;
import services.ServicePublication;

/**
 *
 * @author Spenz
 */
public class EditPublicationForm extends Form{
    
    public EditPublicationForm(Form previous, Publication publication) {
        /*
        Le paramètre previous définit l'interface(Form) précédente.
        Quelque soit l'interface faisant appel à AddTask, on peut y revenir
        en utilisant le bouton back
        */
        previous.setTitle("Modifier Publication");
        previous.setLayout(BoxLayout.y());
        
        
        TextField tfTitre = new TextField("","Entrez votre question!");
        TextField tfDesc = new TextField("","Tapez votre commentaire");
        tfTitre.setText(publication.getTitre());
        tfDesc.setText(publication.getDesc());
        Button btnValider = new Button("Appliquer");
        
        btnValider.addActionListener((ActionListener) (ActionEvent evt) -> {
            if (tfTitre.getText().trim().length()==0) {
                Dialog.show("Alert", "Votre champ de question est vide!", new Command("OK"));
                
            }
//            else if (BadWordFilter.filterText(tfTitre.getText()))
//                Dialog.show("Alert", "Veuillez réviser votre titre(mot vulgère détectée)!", new Command("OK"));
//            else if (BadWordFilter.filterText(tfDesc.getText()))
//                Dialog.show("Alert", "Veuillez réviser votre description(mot vulgère détectée)!", new Command("OK"));
            else {
                publication.setTitre(tfTitre.getText());
                publication.setDesc(tfDesc.getText());
                if (ServicePublication.getInstance().modifPublication(publication)) {
                    Dialog.show("Success","Publication modifié",new Command("OK"));
                    new ListPublicationForm(previous).show();
                } else {
                    Dialog.show("ERROR", "Erreur serveur", new Command("OK"));
                }
            }
        });
        
        this.addAll(tfTitre, tfDesc, btnValider);
        this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK
                , e-> previous.showBack()); // Revenir vers l'interface précédente
                
    }
    
}
