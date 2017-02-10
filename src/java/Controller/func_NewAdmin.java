/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Controller;

import DAO.userDAO;
import Model.user;
import java.io.IOException;
import java.io.PrintWriter;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Gerungan
 */
@WebServlet(name = "func_NewAdmin", urlPatterns = {"/func_NewAdmin"})
public class func_NewAdmin extends HttpServlet {

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

        String user = request.getParameter("id");
        String pass = request.getParameter("pass");
        String detail = request.getParameter("komunitas");

        user x = new user(user, pass, detail);

        int result = userDAO.addNewAdmin(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_dash");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_dash");
        }

    }

    protected void processDelete(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        int uid = Integer.parseInt(request.getParameter("uid"));
        System.out.println("UID : " + uid);
        user x = new user(uid);

        int result = userDAO.delAdmin(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_dash");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_dash");
        }

    }

    protected void processUpdate(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        System.out.println("UPDATE START HERE");
        String uidx = request.getParameter("uid");
        System.out.println("UIDX : " + uidx);
        int uid = Integer.parseInt(uidx);
        String username = request.getParameter("username");
        String password = request.getParameter("password");
        String komunitas = request.getParameter("komunitas");

        System.out.println("PAREMETER : " + uid + username + password + komunitas);

        user x = new user(uid, username, password, komunitas);

        int result = userDAO.editAdmin(x);

        if (result != 0) {
            System.out.println("Berhasil");
            response.sendRedirect("redirect_dash");
        } else {
            System.out.println("Gagal");
            response.sendRedirect("redirect_dash");
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

        if (request.getParameter("uid") != null) {
            if (request.getParameter("type").equalsIgnoreCase("delete")) {
                processDelete(request, response);
            }
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
            if (request.getParameter("type").equalsIgnoreCase("edit")) {
                System.out.println("START PROSES UPDATE");
                processUpdate(request, response);
            }
        } else {
            processRequest(request, response);
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
