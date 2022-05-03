/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Class.java to edit this template
 */
package entities;

/**
 *
 * @author Mr
 */
public class Livreur {
    private int idlivreur;
    private boolean disponibilite;

    public Livreur() {
    }

    
    public Livreur(int idlivreur, boolean disponibilite) {
        this.idlivreur = idlivreur;
        this.disponibilite = disponibilite;
    }

    public int getIdlivreur() {
        return idlivreur;
    }

    public boolean isDisponibilite() {
        return disponibilite;
    }

    public void setIdlivreur(int idlivreur) {
        this.idlivreur = idlivreur;
    }

    public void setDisponibilite(boolean disponibilite) {
        this.disponibilite = disponibilite;
    }

    @Override
    public String toString() {
        return "Livreur{" + "idlivreur=" + idlivreur + ", disponibilite=" + disponibilite + '}';
    }
    
    
    
}
