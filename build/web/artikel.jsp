<%-- 
    Document   : artikel
    Created on : Nov 23, 2016, 10:26:04 PM
    Author     : Gerungan
--%>
<%@page import="Controller.func_SuperAdmin"%>
<%@page import="java.sql.ResultSet"%>
<%      
    
    ResultSet result = null;
    if (request.getParameter("idA") != null) {
        result = func_SuperAdmin.getArtikelKomunitasEdit(Integer.parseInt(request.getParameter("idA")));
        result.first();
    }else{
        String x = "404, Artikel Not Found";
    }
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
        <script type="text/javascript" src="js/materialize.js"></script>
        <script>

            (function ($) {
                $(function () {

                    $('.button-collapse').sideNav({
                        menuWidth: 1000, // Default is 240
                        edge: 'left', // Choose the horizontal origin
                        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                        draggable: true // Choose whether you can drag to open on touch screens
                    });

                }); // end of document ready
            })(jQuery); // end of jQuery name space
        </script>
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
                    <h4>Admin Login</h4>
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
                            
                        </form>

                    </div>
                    </p>
                </div>
            </div>
            
            <ul id="slide-out" class="side-nav">
                <li><div class="userView">
                        <div class="background brown darken-1">
                        </div>
                        <a href="#!name"><span class="white-text name"><% 
                            out.print(result.getString(2));%></span></a>
                        <a href="#!email"><span class="white-text email">Halaman Komentar</span></a>
                    </div></li>

                <li><a class="subheader">Input Comment</a></li>
                <div class="row">
                    <form class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix">mode_edit</i>
                                <textarea id="icon_prefix2" class="materialize-textarea"></textarea>
                                <label for="icon_prefix2">Your Comment</label>
                            </div>
                        </div>
                        <a href="#" class=" modal-action modal-close waves-effect waves-green btn">Insert Comment</a>
                    </form>
                </div>
                <li><a class="subheader">Comment</a></li>
                <div class="row">
                    <div class="col s4">
                        <div class="card-panel">
                            <span class="blue-text text-darken-2">Lokasi Komentar 1</span>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel">
                            <span class="blue-text text-darken-2">Lokasi Komentar 2</span>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card-panel">
                            <span class="blue-text text-darken-2">Lokasi Komentar 3</span>
                        </div>
                    </div>

                </div>
            </ul>




            <div class="col s12 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light"><% 
                            out.print(result.getString(2));%></h5>
                            <hr>
                        </div>

                        <div class="container">
                            <% 
                            out.print(result.getString(3));%>
                            
                            <br>
                            <a class="waves-effect waves-light btn button-collapse show-on-large" data-activates="slide-out"><i class="material-icons left">comment</i>Show Comment</a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </body>
</html>
