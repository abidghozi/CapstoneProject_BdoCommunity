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
import static java.lang.System.out;
import java.sql.ResultSet;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

/**
 *
 * @author Abid_Main
 */
@WebServlet(name = "func_login", urlPatterns = {"/func_login"})
public class func_Login extends HttpServlet {

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
        String username = request.getParameter("id");
        String password = request.getParameter("pass");
        user x = new user(username, password);
        System.out.println(username + password);
        ResultSet result = userDAO.validate(x);
        HttpSession session = request.getSession();
        
        try {
            if (result.next()) {
                if (result.getString(4).equals("1")) {
                    session.setAttribute("type", "Super_Admin");
                    session.setAttribute("status", "logged");
                    session.setAttribute("user", result.getString(2));
                    response.sendRedirect("redirect_dash");
                } else if (result.getString(4).equals("2")) {
                    session.setAttribute("type", "Admin");
                    session.setAttribute("status", "logged");
                    session.setAttribute("user", result.getString(2));
                    response.sendRedirect("redirect_dashlow");
                }
            } else {
                response.sendRedirect("index.jsp");
            }
        } catch (Exception e) {
            e.printStackTrace();
            response.sendRedirect("index.jsp");
        }

//        if(stat){
//            response.sendRedirect("dash.jsp");
//        }else{
//            response.setContentType("text/html;charset=UTF-8");
//            PrintWriter out = response.getWriter();
//            try {
//                out.println("<!DOCTYPE html>");
//                out.println("<html>");
//                out.println("<head>");  
//                out.println("<script>alert('Username Atau Password Salah');</script>");
//                out.println("<script>window.location='http://localhost:8080/BDOCOMMUNITY/';</script>");
//                out.println("</head>");
//                out.println("<body>");
//                out.println("</body>");
//                out.println("</html>");
//                //response.sendRedirect("index.jsp");
//            }finally{
//                out.close();
//                
//            }
//        }
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
        processRequest(request, response);
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
