/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package gui.shop;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import services.ServiceProduit;
import utils.PdfAPI;

/**
 *
 * @author dell
 */
public class HomeProduit extends Form {

    Form current;

    /*Garder traçe de la Form en cours pour la passer en paramètres 
    aux interfaces suivantes pour pouvoir y revenir plus tard en utilisant
    la méthode showBack*/

    public HomeProduit(Form previous) {
        current = this; //Récupération de l'interface(Form) en cours
        setTitle("Shop");
        setLayout(BoxLayout.yCenter());

        add(new Label("Choisissez une option"));
        Button btnAdd = new Button("Ajouter Produit");
        Button btnList = new Button("Liste des Produits");
        Button btnRemise = new Button("Affecter Remise");
        Button btnNote = new Button("Affecter Note");
        Button btnPdf = new Button("Télécharger PDF");

        btnAdd.addActionListener(e -> new AjouterProduit(current).show());
        btnList.addActionListener(e -> new ListProduitForm(current).show());
        btnRemise.addActionListener(e -> new RemiseProduitForm(current).show());
        btnNote.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                if (ServiceProduit.getInstance().affecterNote()) {
                    Dialog.show("Success", "note affectee", new Command("OK"));
                    //previous.showBack();
                } else {
                    Dialog.show("ERROR", "erreur", new Command("OK"));
                }
            }
        });
        btnPdf.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                PdfAPI.createAndSendListProduit("gamergeekscommunity@gmail.com");
                    Dialog.show("Success", "fichier pdf envoyé par mail", new Command("OK"));
            }
        });
        addAll(btnAdd, btnList, btnRemise, btnNote ,btnPdf);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }

}
