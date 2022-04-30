/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.components.MultiButton;
import com.codename1.ui.Button;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.layouts.BoxLayout;
import entities.Produit;
import services.ServiceProduit;

/**
 *
 * @author dell
 */
public class HomeShop extends Form{
    public HomeShop(int uid) {
        setTitle("Nos Produits");
        setLayout(BoxLayout.yCenter());

        for (Produit p : ServiceProduit.getInstance().getAllProducts()) {
            Container c = new Container(BoxLayout.yCenter());
            
            MultiButton mb = new MultiButton(p.getLibelle());
          //  mb.addActionListener(a -> new DetailProduit(p).show());
            
            Button btn_consulter = new Button("Consulter");
            Button btn_acheter = new Button("Acheter");

            btn_consulter.addActionListener(e -> new DetailProduitAvis(p,uid).show());
            btn_acheter.addActionListener(l->{ 
            //panier
            });

            
            Container c2 = new Container(BoxLayout.xCenter());
            c2.add(btn_consulter);
            c2.add(btn_acheter);
            c.addAll(mb,c2);
            add(c);

        }
        
        //getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> new HomeF.showBack());
    }
    
}
