/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import DAO.dt_artikelDAO;
import DAO.dt_pengaduanDAO;
import DAO.userDAO;
import Model.dt_pengaduan;
import Model.dt_artikel;
import Model.user;
import java.io.IOException;
import java.io.PrintWriter;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author Gerungan
 */
@WebServlet(name = "func_Artikel", urlPatterns = {"/func_Artikel"})
public class func_Artikel extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processAddNewArtikel(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String judulArtikel = request.getParameter("judulArtikel");
        String dtArtikel = request.getParameter("dtArtikel");
        DateFormat df = new SimpleDateFormat("dd/MM/yy");
        Date dateobj = new Date();
        String tglArtikel = df.format(dateobj);
        String statusArtikel = "Not Approved";
        String creatorArtikel = request.getParameter("creatorArtikel");
        String tagArtikel = request.getParameter("tagArtikel");
        String coverArtikel = "null";

        System.out.println(judulArtikel + dtArtikel);
        System.out.println((tglArtikel + statusArtikel + creatorArtikel + tagArtikel));

        dt_artikel x = new dt_artikel(judulArtikel, dtArtikel, tglArtikel, statusArtikel, creatorArtikel, tagArtikel, coverArtikel);

        int result = dt_artikelDAO.addNewArtikel(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_dashlow");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_dashlow");
        }

    }

    protected void processDeleteArtikel(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String id = request.getParameter("idA");

        System.out.println("START DELETE idA : " + id);

        int result = dt_artikelDAO.deleteArtikel(id);
        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_daftarArtikel");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_daftarArtikel");
        }
    }

    protected void processUpdate(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String idArtikel = request.getParameter("idArtikel");
        String judulArtikel = request.getParameter("judulArtikel");
        String dtArtikel = request.getParameter("dtArtikel");
        DateFormat df = new SimpleDateFormat("dd/MM/yy");
        Date dateobj = new Date();
        String tglArtikel = df.format(dateobj);
        String tagArtikel = request.getParameter("tagArtikel");

        dt_artikel x = new dt_artikel(idArtikel, judulArtikel, dtArtikel, tglArtikel, tagArtikel);

        int result = dt_artikelDAO.editArtikel(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_dash");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_dash");
        }

    }
    
    protected void processApproveArtikel(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String id = request.getParameter("idA");

        System.out.println("START APPROVE idA : " + id);

        int result = dt_artikelDAO.approveArtikel(id);
        if (result != 0) {
            System.out.println("APPROVED");
            response.sendRedirect("redirect_suntingArtikel");
        } else {
            System.out.println("FAIL");
            response.sendRedirect("redirect_suntingArtikel");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        if (request.getParameter("idA") != null) {
            if (request.getParameter("type").equalsIgnoreCase("delete")) {
                System.out.println("DELETE ARTIKEL");
                processDeleteArtikel(request, response);
            }else if(request.getParameter("type").equalsIgnoreCase("approve")){ 
                System.out.println("START APPROVAL");
                processApproveArtikel(request, response);
            }else {
                System.out.println("FAIL type");
            }
        } else {
            System.out.println("FAIL idA");
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        if (request.getParameter("type") != null) {
            if (request.getParameter("type").equalsIgnoreCase("new")) {
                System.out.println("NEW ARTIKEL");
                processAddNewArtikel(request, response);
            }else if(request.getParameter("type").equalsIgnoreCase("edit")){
                processUpdate(request, response);
            }else
                response.sendRedirect("redirect_daftarArtikel");
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
