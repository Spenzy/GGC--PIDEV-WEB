/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.forum;

import com.codename1.components.OnOffSwitch;
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
public class ListArchivageForm extends Form {
    public ListArchivageForm(Form previous) {
        this.setTitle("Forum");
        
        this.setLayout(BoxLayout.yCenter());
        
        
        ArrayList<Publication> publications = ServicePublication.getInstance().getAllPublications();
        
        for(Publication p : publications){
            
            PubArchiveContainer pc = new PubArchiveContainer(this, p);
            
            OnOffSwitch archivee = new OnOffSwitch();
            archivee.setOff("non archivee");
            archivee.setOn("archivee");
            archivee.setTooltip("archivee ou non");
            archivee.setValue(p.isArchive());
            archivee.addActionListener(l -> ServicePublication.getInstance().archiverPublication(p.getId_publication()));

        add(archivee);
            
            this.add(pc);
        }
            
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
    }
}
