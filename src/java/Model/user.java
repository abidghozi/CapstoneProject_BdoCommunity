/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author Abid_Main
 */
public class user {
    int uid;
    String username;
    String password;
    int previlege;
    String detail;

    public user(int uid) {
        this.uid = uid;
    }

    public user(int uid, String username, String password, String detail) {
        this.uid = uid;
        this.username = username;
        this.password = password;
        this.detail = detail;
    }
    
    public user(String username, String password, String detail) {
        this.username = username;
        this.password = password;
        this.detail = detail;
    }

    public String getDetail() {
        return detail;
    }

    public void setDetail(String detail) {
        this.detail = detail;
    }

    public user(String username, String password, int previlege, String detail) {
        this.username = username;
        this.password = password;
        this.previlege = previlege;
        this.detail = detail;
    }

    public user(int uid, String username, String password, int previlege) {
        this.uid = uid;
        this.username = username;
        this.password = password;
        this.previlege = previlege;
    }

    public user(String username, String password) {
        this.username = username;
        this.password = password;
    }

    public int getUid() {
        return uid;
    }

    public void setUid(int uid) {
        this.uid = uid;
    }

    public String getUsername() {
        return username;
    }

    public void setUsername(String username) {
        this.username = username;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public int getPrevilege() {
        return previlege;
    }

    public void setPrevilege(int previlege) {
        this.previlege = previlege;
    }
    
    
}
