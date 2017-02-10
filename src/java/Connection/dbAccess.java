/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Connection;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author Abid_Main
 */
public class dbAccess {
    private static final String driver_nm = "com.mysql.jdbc.Driver";
    private static final String username_db = "root";
    private static final String password_db = "";
    private static final String url_db = "jdbc:mysql://localhost/bdo_community";
    private static Connection conn;
    
    static{
        try{
            Class.forName(driver_nm);
            conn = DriverManager.getConnection(url_db, username_db, password_db);
        }catch(Exception e){
            e.printStackTrace();
        }
    }
    
    public static Connection getConnection(){
        return conn;
    }
    
//    public void connect() throws SQLException{
//        conn = DriverManager.getConnection(url_db, username_db, password_db);
//    }
//    
//    public dbAccess() throws Exception{
//        try{
//            Class.forName("com.mysql.jdbc.Driver").newInstance();
//            connect();
//        }catch(SQLException e){
//            e.printStackTrace();
//            throw new Exception();
//        }
//    }
//    
//    public static dbAccess getInstance(){
//        if(_instance == null){
//            try{
//                _instance = new dbAccess();
//            }catch(Exception e){
//                e.printStackTrace();
//            }
//        }
//        return _instance;
//    }
    
    
}
