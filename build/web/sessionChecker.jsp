<%-- 
    Document   : sessionChecker
    Created on : Nov 23, 2016, 8:40:17 PM
    Author     : Gerungan
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%
  String sessionType = null;
  String status = null;
  String user = null;
  if(session.getAttribute("type")!=null){
      sessionType = session.getAttribute("type").toString();
      status = session.getAttribute("status").toString();
      user = session.getAttribute("user").toString();
      System.out.println("Logged As : "+sessionType);
      System.out.println("Name : "+user);
      System.out.println("Status : "+status);
  }else{
      %>
      <script>window.location="http://localhost:8080/BDOCOMMUNITY/";</script>
      <%
  }
%>