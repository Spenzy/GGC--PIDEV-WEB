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
import gui.HomeForm;
import services.ServicePublication;

/**
 *
 * @author Spenz
 */
public class AddPublicationForm extends Form{
    
    public AddPublicationForm(Form previous) {
        /*
        Le paramètre previous définit l'interface(Form) précédente.
        Quelque soit l'interface faisant appel à AddTask, on peut y revenir
        en utilisant le bouton back
        */
        previous.setTitle("Ajouter Publication");
        previous.setLayout(BoxLayout.y());
        
        
        TextField tfTitre = new TextField("","Entrez votre question!");
        TextField tfDesc = new TextField("","Tapez votre commentaire");
        Button btnValider = new Button("Publier");
        
        btnValider.addActionListener((ActionListener) (ActionEvent evt) -> {
            if ((tfTitre.getText().length()==0))
                Dialog.show("Alert", "Votre champ de question est vide!", new Command("OK"));
            else
            {
                Publication p = new Publication();
                p.setDesc(tfDesc.getText());
                p.setTitre(tfTitre.getText());
                p.setId_client(HomeForm.userid);
                
                if( ServicePublication.getInstance().addPublication(p) ){
                    Dialog.show("Success","Publication ajouté",new Command("OK"));
                    previous.show();
                }
                else
                    Dialog.show("ERROR", "Erreur serveur", new Command("OK"));
            }
        });
        
        this.addAll(tfTitre,tfDesc,btnValider);
        this.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK
                , e-> previous.showBack()); // Revenir vers l'interface précédente
                
    }
    
}
