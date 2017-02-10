/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Model;

/**
 *
 * @author Gerungan
 */
public class dt_artikel {
    String idArtikel;
    String judulArtikel;
    String dtArtikel;
    String tglArtikel;
    String statusArtikel;
    String creatorArtikel;
    String tagArtikel;
    String coverArtikel;

    public dt_artikel(String judulArtikel, String dtArtikel, String tglArtikel, String statusArtikel, String creatorArtikel, String tagArtikel, String coverArtikel) {
        this.judulArtikel = judulArtikel;
        this.dtArtikel = dtArtikel;
        this.tglArtikel = tglArtikel;
        this.statusArtikel = statusArtikel;
        this.creatorArtikel = creatorArtikel;
        this.tagArtikel = tagArtikel;
        this.coverArtikel = coverArtikel;
    }

    public dt_artikel(String idArtikel, String judulArtikel, String dtArtikel, String tglArtikel, String tagArtikel) {
        this.idArtikel = idArtikel;
        this.judulArtikel = judulArtikel;
        this.dtArtikel = dtArtikel;
        this.tglArtikel = tglArtikel;
        this.tagArtikel = tagArtikel;
    }
    
    public String getIdArtikel() {
        return idArtikel;
    }

    public String getJudulArtikel() {
        return judulArtikel;
    }

    public void setJudulArtikel(String judulArtikel) {
        this.judulArtikel = judulArtikel;
    }

    public String getCoverArtikel() {
        return coverArtikel;
    }

    public void setCoverArtikel(String coverArtikel) {
        this.coverArtikel = coverArtikel;
    }
    
    public void setIdArtikel(String idArtikel) {
        this.idArtikel = idArtikel;
    }

    public String getDtArtikel() {
        return dtArtikel;
    }

    public void setDtArtikel(String dtArtikel) {
        this.dtArtikel = dtArtikel;
    }

    public String getTglArtikel() {
        return tglArtikel;
    }

    public void setTglArtikel(String tglArtikel) {
        this.tglArtikel = tglArtikel;
    }

    public String getStatusArtikel() {
        return statusArtikel;
    }

    public void setStatusArtikel(String statusArtikel) {
        this.statusArtikel = statusArtikel;
    }

    public String getCreatorArtikel() {
        return creatorArtikel;
    }

    public void setCreatorArtikel(String creatorArtikel) {
        this.creatorArtikel = creatorArtikel;
    }

    public String getTagArtikel() {
        return tagArtikel;
    }

    public void setTagArtikel(String tagArtikel) {
        this.tagArtikel = tagArtikel;
    }
    
    
}
