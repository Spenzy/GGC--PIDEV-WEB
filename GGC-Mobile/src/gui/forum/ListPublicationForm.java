/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Publication;
import java.util.ArrayList;
import services.ServicePublication;

/**
 *
 * @author Spenz
 */
public class ListPublicationForm extends Form {
    public ListPublicationForm(Form previous) {
        this.setTitle("Forum");
        
        this.setLayout(BoxLayout.yCenter());
        
        //ajout publication
        Button btnPublier = new Button("Publier");
        btnPublier.addActionListener((connexion)->{
            new AddPublicationForm(previous).show();
        });
        this.add(btnPublier);
        
        ArrayList<Publication> publications = ServicePublication.getInstance().getAllPublications();
        
        for(Publication p : publications){
            PublicationContainer pc = new PublicationContainer(this, p);
            
            this.add(pc);
        }
            
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
    }
}
