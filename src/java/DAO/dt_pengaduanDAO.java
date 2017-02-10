/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package DAO;

import Connection.dbAccess;
import static DAO.userDAO.lastKdKomunitas;
import Model.dt_pengaduan;
import Model.user;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

/**
 *
 * @author hafiz_000
 */
public class dt_pengaduanDAO {

    public static int addNewPengaduan(dt_pengaduan x) {
        int result = 0;
        System.out.println(x.getDtPengaduan());
        System.out.println(x.getLokasiPengaduan());
        System.out.println(x.getTglPengaduan());
        System.out.println(x.getCreatorPengaduan());
        String sql = "INSERT INTO dt_pengaduan (dtPengaduan, lokasiPengaduan, tglPengaduan, creatorPengaduan, pathImgPengaduan) VALUES (?,?,?,?,?)";
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            pst.setString(1, x.getDtPengaduan());
            pst.setString(2, x.getLokasiPengaduan());
            pst.setString(3, x.getTglPengaduan());
            pst.setString(4, x.getCreatorPengaduan());
            pst.setString(5, "EMPTY");
            result = pst.executeUpdate();
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }

    public static ResultSet getPengaduanData() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_pengaduan";
        try {
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            ResultSet rs = pst.executeQuery();
            result = rs;
        } catch (Exception e) {
            e.printStackTrace();
        }
        return result;
    }
    
    public static int deletePengaduan(String x){
        int result = 0;
        String sql = "DELETE FROM dt_pengaduan WHERE idPengaduan='"+x+"'";
        try{
            Connection conn = dbAccess.getConnection();
            PreparedStatement pst = conn.prepareStatement(sql);
            result = pst.executeUpdate();
        }catch(Exception e){
            e.printStackTrace();
        }
        return result;
    }
    
    public static ResultSet getSixLatestKeluhan() {
        ResultSet result = null;
        String sql = "SELECT * FROM dt_pengaduan ORDER BY idPengaduan DESC LIMIT 6";
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
