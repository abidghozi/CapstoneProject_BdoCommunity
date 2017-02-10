/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAO;

import Connection.dbAccess;
import Model.user;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

/**
 *
 * @author Abid_Main
 */
public class userDAO {
    public static ResultSet validate(user x){
        boolean stat = false;
        ResultSet result = null;
        String sql = "SELECT * FROM user WHERE username=? AND pass=?";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getUsername());
            pst.setString(2, x.getPassword());
            ResultSet rs = pst.executeQuery();
            result = rs;
            
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getAdminData(){
        boolean stat = false;
        ResultSet result = null;
        String sql = "SELECT * FROM user WHERE previlege=2";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            result = rs;
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getUsedAdminData(String x){
        boolean stat = false;
        ResultSet result = null;
        String sql = "SELECT * FROM user WHERE username='"+x+"'";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            result = rs;
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getAdminDataForEdit(int x){
        boolean stat = false;
        ResultSet result = null;
        String sql = "SELECT * FROM user WHERE uid="+x;
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            result = rs;
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static String lastKdKomunitas(){
        String result = null;
        int temp = 0;
        String sql = "SELECT * FROM user ORDER BY uid DESC LIMIT 1 ";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            if(rs.next())
            result = rs.getString(5);
            result = result.substring(4);
            temp = Integer.parseInt(result)+1;
            result = String.valueOf(temp);
            result = "kom_"+result;
            System.out.println(result);
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static int addNewAdmin(user x){
        int result = 0;
        String sql = "INSERT INTO user (username, pass, previlege, kd_komunitas, detail) VALUES (?,?,"+2+",?,?)";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getUsername());
            pst.setString(2, x.getPassword());
            pst.setString(3, lastKdKomunitas());
            pst.setString(4, x.getDetail());
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static int editAdmin(user x){
        int result = 0;
        String sql = "UPDATE user SET username=?, pass=?, detail=? WHERE uid="+x.getUid();
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getUsername());
            pst.setString(2, x.getPassword());
            pst.setString(3, x.getDetail());
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static int delAdmin(user x){
        int result = 0;
        String sql = "DELETE FROM user WHERE uid="+x.getUid();
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
}
