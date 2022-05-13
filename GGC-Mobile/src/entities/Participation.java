/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package entities;

/**
 *
 * @author Azer Lahmer
 */
public class Participation {

    private int idParticipation;
    private int idClient;
    private int idEvent;
  

    public Participation() {

    }

    public Participation(int idClient, int idEvent) {
        
        this.idClient = idClient;
        this.idEvent = idEvent;
       
        
    }

    public int getIdParticipation() {
        return idParticipation;
    }

    public void setIdParticipation(int idParticipation) {
        this.idParticipation = idParticipation;
    }

    public int getIdClient() {
        return idClient;
    }

    public int getIdEvent() {
        return idEvent;
    }

    public void setIdClient(int idClient) {
        this.idClient = idClient;
    }

    public void setIdEvent(int idEvent) {
        this.idEvent = idEvent;
    }

    @Override
    public String toString() {
        return "Participation{" + "idParticipation=" + idParticipation + ", idClient=" + idClient + ", idEvent=" + idEvent + '}';
    }

    
   
    

}
