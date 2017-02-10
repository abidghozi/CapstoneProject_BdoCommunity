<%-- 
    Document   : dash
    Created on : Nov 18, 2016, 1:02:06 PM
    Author     : Gerungan
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="Controller.func_SuperAdmin"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ include file="sessionChecker.jsp" %>
<% 
if(session.getAttribute("type")!=null){
    if (sessionType.equalsIgnoreCase("Super_Admin")) {
    } else if (sessionType.equalsIgnoreCase("Admin")) {
        response.sendRedirect("redirect_dashlow");
    } else {
        response.sendRedirect("redirect_index");
    }
    } else {
%>
      <script>window.location="http://localhost:8080/BDOCOMMUNITY/";</script>
<%
    }
%>

<% 
    ResultSet result = func_SuperAdmin.getAdminData(); 
    ResultSet result2 = func_SuperAdmin.getPengaduanData();
    int totalPostedArtikel = func_SuperAdmin.getTotalPostedArtikel();
    int totalWaitingArtikel = func_SuperAdmin.getTotalWaitingArtikel();
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
            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modalNewAdmin').modal();
            });

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
            
            <!-- New Admin Modal Structure -->
            <div id="modalNewAdmin" class="modal modalNewAdmin" style="width:35%;">
                <div class="modal-content">
                    <h4>Tambah Admin</h4>
                    <p>
                    <div class="row">
                        <form class="col s12" action="func_NewAdmin" method="post"> 
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="id" id="user" type="text" class="validate">
                                    <label for="user">Username</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="pass" id="pass" type="password" class="validate">
                                    <label for="pass">Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input name="komunitas" id="komunitas" type="text" class="validate">
                                    <label for="komunitas">Komunitas</label>
                                </div>
                            </div>
                            <input value="Daftar" type="submit" class="modal-action modal-close waves-effect waves-green btn"/>
                    </form>
                        
                    </div>
                    </p>
                </div>
            </div>
            
            <header class="col s2">
                <ul style="width:240px; margin-top:65px;" class="side-nav fixed">
                    <a href="redirect_dash" class="grey lighten-1">Pengaturan Admin</a></li>
                    <li><a href="redirect_suntingArtikel">Sunting Artikel</a></li>
                    <a href="redirect_daftarPengaduan">Sunting Pengaduan</a></li>
                </ul>      
            </header>


            <div class="col s10 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light">
                                Super Admin Dashboard

                            </h5>
                        </div>
                        <!-- Start Admin Content -->
                        <div class="row">

                            <div class="card-panel teal lighten-2 s12 white-text" style="padding:20px;">
                                Informasi Admin
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col s6">
                                        <div class="collection">
                                            <a href="#!" class="collection-item">Total Admin Komunitas : <span class="badge">
                                                <% 
                                                    result.last();
                                                    out.print(result.getRow());
                                                    result.beforeFirst();
                                                %>
                                                </span></a>
                                                <a href="#!" class="collection-item">Total Pengaduan : <span class="badge">
                                                <% 
                                                    result2.last();
                                                    out.print(result2.getRow());
                                                    result2.beforeFirst();
                                                %>
                                                </span></a>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="collection">
                                                    <a href="#!" class="collection-item">Total Artikel di Post : <span class="badge">
                                                <% 
                                                    out.print(totalPostedArtikel);
                                                %>
                                                </span></a>
                                                <a href="#!" class="collection-item">Total Artikel Siap Sunting : <span class="badge">
                                                <% 
                                                    out.print(totalWaitingArtikel);
                                                %>
                                                </span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-panel green lighten-2 s12 white-text" style="padding:20px;">
                                Data Admin Komunitas
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col s12">
                                        <table class="highlight teal-text text-lighten-2 grey lighten-3">
                                            <tr>
                                                <th style="padding-left:20px;" >Uid</th>
                                                <th>Name</th>
                                                <th>Previlege</th>
                                                <th>Detail</th>
                                                <th>Pengaturan</th>
                                            </tr>


                                            <%
                                                while (result.next()) {
                                                    out.print(""
                                                            + "<tr>"
                                                            + "<th style='padding-left:20px;' >"+result.getString(1)+"</th>"
                                                            + "<th>"+result.getString(2)+"</th>"
                                                            + "<th>Level "+result.getString(4)+"</th>"
                                                            + "<th>"+result.getString(6)+"</th>"
                                                            + "<th>"
                                                            + "<a href='edit_admin.jsp?uid="+result.getString(1)+"&type=edit'>Edit</a>"
                                                            + " | "
                                                            + "<a href='func_NewAdmin?uid="+result.getString(1)+"&type=delete'>Delete</a></th>"
                                                            + "</tr>");
                                                } 
                                                
                                            %>
                                                

                                        </table>
                                        <div style="margin-top:15px;" class="row">
                                            <div class="col s1 offset-s11">
                                                <a href="#modalNewAdmin" class="right btn-floating btn-large waves-effect waves-light indigo"><i class="material-icons">add</i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="card-panel teal lighten-2 s12 white-text" style="padding:20px;">
                                Notifikasi
                                <hr>
                                <br>
                                <div class="row">

                                </div>
                            </div>

                        </div>
                        <!-- End Admin Content -->
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>