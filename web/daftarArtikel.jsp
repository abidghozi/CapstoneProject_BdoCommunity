<%-- 
    Document   : daftarArtikel
    Created on : Nov 27, 2016, 3:40:04 AM
    Author     : Gerungan
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="Controller.func_SuperAdmin"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ include file="sessionChecker.jsp" %>
<%    if (session.getAttribute("type") != null) {
        if (sessionType.equalsIgnoreCase("Super_Admin")) {
            response.sendRedirect("redirect_dash");
        } else if (sessionType.equalsIgnoreCase("Admin")) {

        } else {
            response.sendRedirect("redirect_index");
        }
    } else {
%>
<script>window.location = "http://localhost:8080/BDOCOMMUNITY/";</script>
<%
    }

%>

<%    System.out.println(user);
    ResultSet result = func_SuperAdmin.getUsedAdminData(user);
    result.first();
    ResultSet result2 = func_SuperAdmin.getArtikelKomunitasData(result.getString(6));
%>
<!DOCTYPE html>
<html>
    <head>
        <title>BDO - Dashboard</title>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script>


        </script>

        <!-- Page Layout here -->

        <!-- Nav Bar -->
        <div class="navbar-fixed">
            <nav >
                <div class="nav-wrapper" >
                    <a href="#" class="brand-logo" style="margin-left:25px;">BDO COMMUNITY</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">

                        <li>Hai, <%=user%> &nbsp;&nbsp;&nbsp;</li>
                        <li><a href="redirect_index">Home</a></li>
                        <li><a href="redirect_forum">Forum</a></li>
                        <li><a class="waves-effect waves-light btn" href="redirect_logout">Logout</a></li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- Empty space -->

            <header class="col s2">
                <ul style="width:240px; margin-top:65px;" class="side-nav fixed">
                    <a href="redirect_dashlow">Admin Info</a></li>
                    <li><a href="#" class="grey lighten-1">Daftar Artikel</a></li>
                    <li><a href="redirect_newArtikel">Artikel Baru</a></li>   
                    <a href="redirect_daftarPengaduan">Lihat Pengaduan</a></li>
                </ul>      
            </header>


            <div class="col s10 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light">
                                Admin Dashboard

                            </h5>
                        </div>

                        <div class="row">
                            <div class="col s12">
                                <div class="card-panel teal lighten-2 s12 white-text" style="padding:20px;">
                                    Daftar Artikel, <%
                                        result.first();
                                        out.print(result.getString(6));
                                    %>
                                    <hr>
                                    <br>
                                    <table class="highlight teal-text text-lighten-2 grey lighten-3">
                                        <tr>
                                            <th style="padding-left:20px;" >Judul Artikel</th>
                                            <th>Tanggal Posting</th>
                                            <th>Tag Artikel</th>
                                            <th>Status Artikel</th>
                                            <th>Tools</th>
                                        </tr>


                                        <%
                                            if (result2 != null) {
                                                while (result2.next()) {
                                                    out.print(""
                                                            + "<tr>"
                                                            + "<th style='padding-left:20px;' >" + result2.getString(2) + "</th>"
                                                            + "<th>" + result2.getString(4) + "</th>"
                                                            + "<th>" + result2.getString(7) + "</th>"
                                                            + "<th>" + result2.getString(5) + "</th>"
                                                            + "<th>"
                                                            + "<a href='redirect_editArtikel?idA=" + result2.getString(1) + "&type=edit'>Edit</a>"
                                                            + " | "
                                                            + "<a href='func_Artikel?idA=" + result2.getString(1) + "&type=delete'>Delete</a></th>"
                                                            + "</tr>");
                                                }
                                            }else{
                                        %>
                                        <tr>
                                            <td colspan="5"><center>Anda Belum Memiliki Artikel</center></td>
                                        </tr>
                                        <% } %>
                                    </table>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>

            </div>

        </div>

    </body>
</html>