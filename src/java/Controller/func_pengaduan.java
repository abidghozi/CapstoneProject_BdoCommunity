/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

/**
 *
 * @author hafiz_000
 */
import DAO.dt_pengaduanDAO;
import DAO.userDAO;
import Model.dt_pengaduan;
import Model.user;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.ResultSet;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet(name = "func_pengaduan", urlPatterns = {"/func_pengaduan"})
public class func_pengaduan extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String nama = request.getParameter("nama");
        String lokasi = request.getParameter("lokasi");
        String pengaduan = request.getParameter("pengaduan");

        DateFormat df = new SimpleDateFormat("dd/MM/yy");
        Date dateobj = new Date();
        String tglPengaduan = df.format(dateobj);

        dt_pengaduan x = new dt_pengaduan(pengaduan, lokasi, tglPengaduan, nama);

        int result = dt_pengaduanDAO.addNewPengaduan(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_index");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_index");
        }
    }

    protected void processDeletePengaduan(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String id = request.getParameter("idP");

        int result = dt_pengaduanDAO.deletePengaduan(id);
        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_daftarPengaduan");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_daftarPengaduan");
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
        if (request.getParameter("idP") != null) {
            if (request.getParameter("type").equalsIgnoreCase("delete")) {
                System.out.println("DELETE PENGADUAN");
                processDeletePengaduan(request, response);
            } else {
                System.out.println("FAIL type");
            }
        } else {
            System.out.println("FAIL idP");
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
        processRequest(request, response);
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
