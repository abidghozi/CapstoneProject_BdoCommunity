/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import DAO.dt_artikelDAO;
import DAO.dt_pengaduanDAO;
import DAO.userDAO;
import Model.user;
import java.sql.ResultSet;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Gerungan
 */
public class func_SuperAdmin {

    public static ResultSet getAdminData() {
        ResultSet result = userDAO.getAdminData();
        return result;
    }

    public static ResultSet getUsedAdminData(String x) {
        ResultSet result = userDAO.getUsedAdminData(x);
        return result;
    }

    public static ResultSet getAdminDataForEdit(int x) {
        ResultSet result = userDAO.getAdminDataForEdit(x);
        return result;
    }

    public static ResultSet getPengaduanData() {
        ResultSet result = dt_pengaduanDAO.getPengaduanData();
        return result;
    }

    public static ResultSet getArtikelKomunitasData(String x) {
        ResultSet result = dt_artikelDAO.getArtikelKomunitasData(x);
        return result;
    }

    public static ResultSet getArtikelKomunitasAllData() {
        ResultSet result = dt_artikelDAO.getArtikelKomunitasAllData();
        return result;
    }

    public static ResultSet getArtikelKomunitasEdit(int x) {
        ResultSet result = dt_artikelDAO.getArtikelKomunitasEdit(x);
        return result;
    }

    public static ResultSet getArtikelTagData() {
        ResultSet result = dt_artikelDAO.getArtikelTagData();
        return result;
    }

    public static ResultSet getPublishedArtikel() {
        ResultSet result = dt_artikelDAO.getPublishedArtikel();
        return result;
    }
    
    public static ResultSet getPublishedArtikelFromTag(String x) {
        System.out.println("TAG : "+x);
        x = "#"+x;
        ResultSet result = dt_artikelDAO.getPublishedArtikelFromTag(x);
        return result;
    }
    
    public static int getTotalSubmitedArtikel(String x){
        int result = dt_artikelDAO.getTotalSubmitedArtikel(x);
        return result;
    }
    
    public static int getTotalPendingArtikel(String x){
        int result = dt_artikelDAO.getTotalPendingArtikel(x);
        return result;
    }
    
    public static int getTotalPostedArtikel(){
        ResultSet result = dt_artikelDAO.getPublishedArtikel();
        int nilai = 0;
        try{
        if(result.last()){
                nilai = result.getRow();
            }else{
                System.out.println("EMPTY SET");
            }
        }catch(Exception e){
            e.printStackTrace();
        }
        return nilai;
    }
    
    public static int getTotalWaitingArtikel(){
        ResultSet result = dt_artikelDAO.getUnPublishedArtikel();
        int nilai = 0;
        try{
        if(result.last()){
                nilai = result.getRow();
            }else{
                System.out.println("EMPTY SET");
            }
        }catch(Exception e){
            e.printStackTrace();
        }
        return nilai;
    }
    
    public static String removeHTMLTag(String x) {
        String noHTMLString = x.replaceAll("\\<.*?\\>", "");
        try {
            noHTMLString = noHTMLString.substring(0, 240)+"...";
        } catch (Exception e) {
            noHTMLString = noHTMLString.substring(0, 20);
        }

        return noHTMLString;
    }
    
    public static ResultSet getThreeLatestArtikel(){
        ResultSet result = dt_artikelDAO.getThreeLatestArtikel();
        return result;
    }
    
    public static ResultSet getSixLatestKeluhan(){
        ResultSet result = dt_pengaduanDAO.getSixLatestKeluhan();
        return result;
    }
    
}
