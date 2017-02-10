/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author hafiz_000
 */
public class dt_pengaduan {
    
    String idPengaduan;
    String dtPengaduan;
    String lokasiPengaduan;
    String tglPengaduan;
    String creatorPengaduan;

    public dt_pengaduan(String dtPengaduan, String lokasiPengaduan, String tglPengaduan, String creatorPengaduan) {
        this.dtPengaduan = dtPengaduan;
        this.lokasiPengaduan = lokasiPengaduan;
        this.tglPengaduan = tglPengaduan;
        this.creatorPengaduan = creatorPengaduan;
    }
    
    public String getIdPengaduan() {
        return idPengaduan;
    }

    public void setIdPengaduan(String idPengaduan) {
        this.idPengaduan = idPengaduan;
    }

    public String getDtPengaduan() {
        return dtPengaduan;
    }

    public void setDtPengaduan(String dtPengaduan) {
        this.dtPengaduan = dtPengaduan;
    }

    public String getLokasiPengaduan() {
        return lokasiPengaduan;
    }

    public void setLokasiPengaduan(String lokasiPengaduan) {
        this.lokasiPengaduan = lokasiPengaduan;
    }

    public String getTglPengaduan() {
        return tglPengaduan;
    }

    public void setTglPengaduan(String tglPengaduan) {
        this.tglPengaduan = tglPengaduan;
    }

    public String getCreatorPengaduan() {
        return creatorPengaduan;
    }

    public void setCreatorPengaduan(String creatorPengaduan) {
        this.creatorPengaduan = creatorPengaduan;
    }

    

   
    
   


}
