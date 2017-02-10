<%-- 
    Document   : logout
    Created on : Nov 23, 2016, 9:08:58 PM
    Author     : Gerungan
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
 session.setAttribute("type",null);
 session.setAttribute("status",null);
 session.setAttribute("user", null);
 response.sendRedirect("index.jsp");
%>