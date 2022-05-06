/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package utils;

import com.itextpdf.text.Chapter;
import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Image;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.Rectangle;
import com.itextpdf.text.pdf.PdfWriter;
import entities.Commande;
import entities.Commentaire;
import entities.LigneCommande;
import entities.Produit;
import entities.Publication;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.util.List;
import javax.mail.MessagingException;

/**
 *
 * @author Spenz
 */
public class PdfAPI {

    public static void createAndSendForumPost(String mail, Publication p, List<Commentaire> commentaires) {
        try {
            Rectangle pageSize = new Rectangle(350, 720);
            Document document = new Document(pageSize);
            String filepath = "publication" + p.getId_publication()+".pdf";
            PdfWriter instance = PdfWriter.getInstance(document, new FileOutputStream(filepath));

            document.open();
            Image image1 = Image.getInstance("src/GUI/ressources/ggc.png");
            image1.scaleAbsolute(150, 130);
            
            Paragraph chapterTitle = new Paragraph("Publication de " + p.getNom_client() + " à la date " + p.getDatePub());
            Paragraph paragraph = new Paragraph("Publication: \n"
                    + "Titre : " + p.getTitre() + "\n"
                    + "Description : " + p.getDesc() + "\n"
                    + "NbrVotes : " + p.getNbrVote() + "\n \n");
            Paragraph paragraphsignature = new Paragraph("Gamer Geeks Community APP");
            Chapter chapter1 = new Chapter(chapterTitle, 1);
            chapter1.setNumberDepth(0);

            document.add(chapter1);
            document.add(paragraph);

            for (Commentaire c : commentaires) {
                document.add(new Paragraph(
                        "* " + p.getNom_client() + " " + c.getDatePost() + ": \n"
                        + "Commentaire : " + p.getDesc() + "\n"));
            }
            document.add(paragraphsignature);

            document.close();
            File fileToSend = new File(filepath);
            MailAPI.sendMailWithFile(mail, "Poste Forum GGC", fileToSend);
            fileToSend.delete();
        } catch (DocumentException | IOException | MessagingException e) {
            System.err.println(e.getMessage());
        }
        System.out.println("generation success");
    }

}
