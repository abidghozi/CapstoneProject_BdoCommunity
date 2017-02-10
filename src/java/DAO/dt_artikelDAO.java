/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAO;

import Connection.dbAccess;
import Model.dt_artikel;
import Model.dt_pengaduan;
import Model.user;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

/**
 *
 * @author Gerungan
 */
public class dt_artikelDAO {

    public static int addNewArtikel(dt_artikel x) {
        int result = 0;
        int id = lastIdArtikel();
        String sql = "INSERT INTO dt_artikel (idArtikel, judulArtikel, dtArtikel, tglArtikel, statusArtikel, creatorArtikel, tagArtikel, coverArtikel) VALUES ('" + id + "',?,?,?,?,?,?,?)";
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getJudulArtikel());
            pst.setString(2, x.getDtArtikel());
            pst.setString(3, x.getTglArtikel());
            pst.setString(4, x.getStatusArtikel());
            pst.setString(5, x.getCreatorArtikel());
            pst.setString(6, x.getTagArtikel());
            pst.setString(7, x.getCoverArtikel());
            result = pst.executeUpdate();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }

    public static int lastIdArtikel() {
        int result = 1;
        String sql = "SELECT idArtikel FROM dt_artikel ORDER BY idArtikel DESC LIMIT 1";
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery(sql);
            if (rs.next()) {
                result = Integer.parseInt(rs.getString(1));
                result = result + 1;
            }
            return result;
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }

    public static ResultSet getArtikelKomunitasData(String x) {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE creatorArtikel='"+x+"'";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getArtikelKomunitasAllData() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getArtikelKomunitasEdit(int x) {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE idArtikel='"+x+"'";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static int deleteArtikel(String x){
        int result = 0;
        String sql = "DELETE FROM dt_artikel WHERE idArtikel="+x;
        System.out.println(sql);
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static int editArtikel(dt_artikel x){
        int result = 0;
        String sql = "UPDATE dt_artikel SET judulArtikel=?, dtArtikel=?, tglArtikel=?, tagArtikel=? WHERE idArtikel=?";
        System.out.println("START UPDATE ARTIKEL");
        System.out.println(sql);
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getJudulArtikel());
            pst.setString(2, x.getDtArtikel());
            pst.setString(3, x.getTglArtikel());
            pst.setString(4, x.getTagArtikel());
            pst.setString(5, x.getIdArtikel());
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static int approveArtikel(String x){
        int result = 0;
        String sql = "UPDATE dt_artikel SET statusArtikel=? WHERE idArtikel=?";
        System.out.println("START APPROVE ARTIKEL");
        System.out.println(sql);
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, "Approved");
            pst.setString(2, x);
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getArtikelTagData() {
        ResultSet result = null;
        String sql = "SELECT DISTINCT tagArtikel FROM dt_artikel WHERE statusArtikel='Approved'";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getPublishedArtikel() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE statusArtikel='Approved' ORDER BY idArtikel DESC";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getUnPublishedArtikel() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE statusArtikel='Not Approved' ORDER BY idArtikel DESC";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getPublishedArtikelFromTag(String x) {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE statusArtikel='Approved' AND tagArtikel='"+x+"' ORDER BY idArtikel DESC";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static int getTotalSubmitedArtikel(String x) {
        int result = 0;
        String sql = "SELECT * FROM dt_artikel WHERE creatorArtikel='"+x+"'";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.last()){
                result = rs.getRow();
                return result;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static int getTotalPendingArtikel(String x) {
        int result = 0;
        String sql = "SELECT * FROM dt_artikel WHERE creatorArtikel='"+x+"' AND statusArtikel='Not Approved'";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.last()){
                result = rs.getRow();
                return result;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getThreeLatestArtikel() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_artikel WHERE statusArtikel='Approved' ORDER BY idArtikel DESC LIMIT 3";
        System.out.println(sql);
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next()){
                System.out.println("DONE");
                rs.beforeFirst();
                result = rs;
            }else{
                System.out.println("EMPTY SET");
            }
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
}
