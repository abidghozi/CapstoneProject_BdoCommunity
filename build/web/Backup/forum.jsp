<%-- 
    Document   : forum
    Created on : Nov 23, 2016, 9:24:46 PM
    Author     : Gerungan
--%>

<%@page import="Controller.func_SuperAdmin"%>
<%@page import="java.sql.ResultSet"%>
<%
    ResultSet resultArtikel = null;
    ResultSet result = func_SuperAdmin.getArtikelTagData();
    if (request.getParameter("tags") != null) {
        String x = request.getParameter("tags").toString();
        resultArtikel = func_SuperAdmin.getPublishedArtikelFromTag(x);
    } else {
        resultArtikel = func_SuperAdmin.getPublishedArtikel();
    }
%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
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
                $('.modalLogin').modal();
            });

        </script>

        <!-- Page Layout here -->

        <!-- Nav Bar -->
        <div class="navbar-fixed">
            <nav >
                <div class="nav-wrapper" >
                    <a href="#" class="brand-logo" style="margin-left:25px;">BDO COMMUNITY</a>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">

                        <%
                            if (session.getAttribute("type") == null) {
                        %>
                        <%
                        } else {
                        %>
                        <li><a href="redirect_dash">Hai, <% out.print(session.getAttribute("user").toString()); %> &nbsp;&nbsp;&nbsp;</a></li>
                            <%
                                }
                            %>
                        <li><a href="redirect_index">Home</a></li>
                        <li><a href="redirect_forum">Forum</a></li>
                            <%
                                if (session.getAttribute("type") == null) {
                            %>
                        <li><a class="waves-effect waves-light btn" href="#modalLogin">Log In</a></li>
                            <%
                            } else {
                            %>
                        <li><a class="waves-effect waves-light btn" href="redirect_logout">Logout</a></li>
                            <%
                                }
                            %>


                    </ul>
                </div>
            </nav>
        </div>

        <div class="row">
            <!-- Empty space -->

            <!-- Login Modal Structure -->
            <div id="modalLogin" class="modal modalLogin" style="width:35%;">
                <div class="modal-content">
                    <h4>User Login</h4>
                    <p>
                    <div class="row">
                        <form class="col s12" action="func_login" method="post"> 
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
                            <input type="submit" class="modal-action modal-close waves-effect waves-green btn"/>
                            <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Daftar</a>
                        </form>

                    </div>
                    </p>
                </div>
            </div>

            <header class="col s2 white-text">
                <ul style="width:240px; margin-top:65px;" class="white-text side-nav fixed teal lighten-2">
                    <li><a href="#" class="subheader" style="margin-bottom:10px; color:white;">TAGS : <hr></a></li>
                    <li><a href="redirect_forum" style="color:white;">#AllArtikel</a></li>
                            <% if (result.next() != false) {
                                    result.beforeFirst();
                                    while (result.next()) {%>
                    <li><a href="redirect_forum?tags=<%=result.getString(1).substring(1) %>" style="color:white;"><%=result.getString(1)%></a></li>
                        <% }
                            }%>
                </ul>      
            </header>


            <div class="col s10 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light">Artikel <% if((request.getParameter("tags") != null)){ %>
                                <%= "#"+request.getParameter("tags") %>
                                <% }else{ %>#ALLPOST</h5><% } %>
                        </div>
                        <%
                            if ((resultArtikel.next()) != false) {
                                resultArtikel.beforeFirst();
                                while (resultArtikel.next()) {
                        %>
                        <div class="col s12">
                            <div class="card horizontal">
                                <div class="card-image">
                                    <img src="images/img1.JPG" width="240" height="240" >
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <h5><%=resultArtikel.getString(2)%></h5>
                                        <p>
                                            <%=func_SuperAdmin.removeHTMLTag(resultArtikel.getString(3))%>
                                        </p>
                                    </div>
                                    <div class="card-action">
                                        <a href="redirect_artikel?idA=<%=resultArtikel.getString(1)%>">Baca lebih lanjut </a> | <%=resultArtikel.getString(7)%>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <%  }
    }%>
                    </div>
                </div>

            </div>

        </div>

    </body>
</html>