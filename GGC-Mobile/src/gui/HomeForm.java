/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui;

import com.codename1.ui.Button;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.Toolbar;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;
import gui.Plan.ListPlanForm;
import gui.client.HomeClient;
import gui.commande.HomeLivraison;
import gui.commande.ListeCommande;
import gui.evenement.AffichEventClient;
import gui.evenement.HomeEvenement;
import gui.forum.ListArchivageForm;
import gui.shop.HomeProduit;
import gui.shop.HomeShop;
import utils.Statics;
import gui.forum.ListPublicationForm;
import gui.personne.HomePersonne;
import gui.streamer.ListStreamerForm;
import services.ServicePersonne;

/**
 *
 * @author Spenz
 */
public class HomeForm extends Form {
        
    public Resources theme;
    Form current;

    /*Garder traçe de la Form en cours pour la passer en paramètres 
    aux interfaces suivantes pour pouvoir y revenir plus tard en utilisant
    la méthode showBack*/
    public HomeForm(Resources res) {
        current = this; //Récupération de l'interface(Form) en cours
        setTitle("Sign in");
        setLayout(BoxLayout.y());

        TextField address = new TextField("", "E-Mail", 40, TextArea.EMAILADDR);
        TextField password = new TextField("", "Password", 30, TextField.PASSWORD);
        Button connect = new Button("Se Connecter");
        
        Button register = new Button("register");
        addAll(address, password, connect, register);
        register.addActionListener(e -> {
        Form menuFormm = new Form("Sign in", BoxLayout.y());
        new HomePersonne(menuFormm).show();
        showBack();
        });
        

        //Tester asresse et password
        connect.addActionListener((connexion) -> {
            if (address.getText().equals("admin@gmail.com") && password.getText().equals("pwd")) {
                //adresse et mot de passe valide welcome menu
                Statics.userid=1;
                Form menuForm = new Form("Espace Administrateur", BoxLayout.y());
                menuForm.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, (e) -> {
                    showBack();
                });

                Toolbar tb = menuForm.getToolbar();

                menuForm.getToolbar().addMaterialCommandToRightBar("Déconnexion", FontImage.MATERIAL_LOGOUT, (evt4) -> {
                    address.setText("");
                    password.setText("");
                    showBack();

                });

                //remplir les modules            
                menuForm.getToolbar().addCommandToSideMenu("Gestion des utilisateurs", null, (gu) -> {
                     new HomeClient(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion du forum", null, (gf) -> {
                    new ListArchivageForm(current).show();

                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion des evennements", null, (gp) -> {
                    new HomeEvenement(menuForm,res).show();

                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion des produits", null, (gp) -> {
                    new HomeProduit(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion des livraisons", null, (gl) -> {
                    new HomeLivraison(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion des streamers", null, (gl) -> {
                    new ListStreamerForm(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Gestion des plans", null, (gl) -> {
                    new ListPlanForm(menuForm).show();
                });

                menuForm.show();

            } else {
                
                //Session
                ServicePersonne.getInstance().login(address.getText(),password.getText());
                System.out.println("useerid ");
                System.out.println(Statics.userid);
                if(Statics.userid!=0){
                
                Form menuForm = new Form("Bienvenue", BoxLayout.y());
                menuForm.getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, (e) -> {
                    showBack();
                });

                Toolbar tb = menuForm.getToolbar();
                //Image logo = theme.getImage("LogoGGC.png");
                //logo.scaledSmallerRatio(10 , 10);
                //   Container topBar = BorderLayout.east(new Label(logo));
                //topBar.add(BorderLayout.SOUTH, new Label("Cool App Tagline...", "SidemenuTagline"));
                //  topBar.setUIID("SideCommand");
                //   tb.addComponentToSideMenu(topBar);
                menuForm.getToolbar().addMaterialCommandToRightBar("", FontImage.MATERIAL_LOGOUT, (evt4) -> {
                    address.setText("");
                    password.setText("");
                    showBack();

                });
                //remplir les modules            
                menuForm.getToolbar().addCommandToSideMenu("Streamers", null, (gu) -> {
                    new ListStreamerForm(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Plan", null, (gu) -> {
                    new ListPlanForm(menuForm).show();
                });
                
                menuForm.getToolbar().addCommandToSideMenu("Forum", null, (gf) -> {
                    new ListPublicationForm(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Evennement", null, (gf) -> {
                    new AffichEventClient(menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Shop", null, (gp) -> {
                    int uid=Statics.userid;
                    new HomeShop(uid,menuForm).show();
                });
                menuForm.getToolbar().addCommandToSideMenu("Commande", null, (gl) -> {
                    new ListeCommande(menuForm).show();
                    
                });

                menuForm.show();
            } else{
                   
                Dialog.show("Alerte","Vos coordonnées sont incorrectes","OK",null);
               
                } 
      

    } } );
    }
    
}
