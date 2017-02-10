<%-- 
    Document   : edit_admin
    Created on : Nov 25, 2016, 12:30:16 PM
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
    int x = Integer.valueOf(request.getParameter("uid").toString());
    ResultSet result = func_SuperAdmin.getAdminDataForEdit(x); 
%>
<!DOCTYPE html>
<html>
    <head>
        <title>BDO - Editor</title>
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
        <script type="text/javascript" src="js/materialize.js"></script>
        <script>

        </script>

        <!-- Page Layout here -->

        <!-- Nav Bar -->
        <div class="navbar-fixed">
            <nav >
                <div class="nav-wrapper" >
                    <a href="#" class="brand-logo" style="margin-left:25px;">BDO COMMUNITY</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <li><a class="waves-effect waves-light btn" href="redirect_logout">Logout</a></li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- Empty space -->


            <div class="col s12 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light">Admin Editor</h5>
                        </div>
                        <div class="container">

                            <div class="row">
                                <form class="col s12" action="func_NewAdmin" method="post">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <input name="uid" id="uid" type="text" class="hide" value="<% 
                                                    result.first();
                                                    out.print(result.getString(1));
                                                %>">
                                            <input name="uid" id="uid_fake" type="text" disabled value="<% 
                                                    result.first();
                                                    out.print(result.getString(1));
                                                %>">
                                            <label for="uid">UID</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="username" id="username" type="text" class="validate" value="<% 
                                                    result.first();
                                                    out.print(result.getString(2));
                                                %>">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="password" id="password" type="password" class="validate" value="<% 
                                                    result.first();
                                                    out.print(result.getString(2));
                                                %>">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input name="komunitas" id="komunitas" type="text" value="<% 
                                                    result.first();
                                                    out.print(result.getString(6));
                                                %>">
                                            <label for="komunitas">Komunitas</label>
                                        </div>
                                    </div>
                                            <div class="input-field col s12 hide">
                                                <input name="type" id="komunitas" type="text" value="edit" class="hide">
                                        </div>
                                    <input type="submit" value="Perbaharui Data Admin" class="modal-action modal-close waves-effect waves-green indigo btn">
                                </form>
                            </div>

                            <br>
                            <hr>
                            <br>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </body>
</html>