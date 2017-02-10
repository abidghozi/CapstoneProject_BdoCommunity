<%-- 
    Document   : editArtikel
    Created on : Nov 27, 2016, 5:32:57 AM
    Author     : Gerungan
--%>

<%@page import="java.sql.ResultSet"%>
<%@page import="Controller.func_SuperAdmin"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@ include file="sessionChecker.jsp" %>

<%    if (session.getAttribute("type") != null) {
        if (sessionType.equalsIgnoreCase("Super_Admin")) {
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
    ResultSet result2 = func_SuperAdmin.getArtikelKomunitasEdit(Integer.parseInt(request.getParameter("idA").toString()));
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

        <!-- Froala CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/froala_editor.css">
        <link rel="stylesheet" href="css/froala_style.css">
        <link rel="stylesheet" href="css/plugins/code_view.css">
        <link rel="stylesheet" href="css/plugins/colors.css">
        <link rel="stylesheet" href="css/plugins/emoticons.css">
        <link rel="stylesheet" href="css/plugins/image_manager.css">
        <link rel="stylesheet" href="css/plugins/image.css">
        <link rel="stylesheet" href="css/plugins/line_breaker.css">
        <link rel="stylesheet" href="css/plugins/table.css">
        <link rel="stylesheet" href="css/plugins/char_counter.css">
        <link rel="stylesheet" href="css/plugins/video.css">
        <link rel="stylesheet" href="css/plugins/fullscreen.css">
        <link rel="stylesheet" href="css/plugins/file.css">
        <link rel="stylesheet" href="css/plugins/quick_insert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    </head>

    <body>
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <%   
                if (sessionType.equalsIgnoreCase("Super_Admin")) {
        %>
        <script>
    function back() {
        window.location = "redirect_suntingArtikel";
    }</script>
            <%
            } else if (sessionType.equalsIgnoreCase("Admin")) {
            %>
        <script>
            function back() {
                window.location = "redirect_daftarArtikel";
            }
        </script>
        <%
            }
        %>


        <script>
            function getVal() {
                var res = $('#edit').froalaEditor('html.get');
                document.getElementById("dtArtikel").value = res;
            }
        </script>
        <!-- Page Layout here -->

        <!-- Nav Bar -->
        <div class="navbar">
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


            <div class="col s12 grey lighten-5">
                <!-- Teal page content  -->

                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <div class="row center">
                            <h5 class="header col s12 light">
                                <%
                                %>
                                Artikel Editor, <%
                                    result.first();
                                    out.print(result.getString(6));
                                    result2.first();
                                %>

                            </h5>
                        </div>

                        <div class="row">
                            <div class="col s12 ">
                                <form action="func_Artikel" method="post">
                                    <div class="card-panel grey lighten-5 s12" style="padding:20px;">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <input name="idArtikel" id="idArtikel" type="text" class="hide" value="<%= result2.getString(1)%>">
                                            </div>
                                            <div class="input-field col s12">
                                                <input name="judulArtikel" id="judulArtikel" type="text" class="validate" required="true" value="<%= result2.getString(2)%>">
                                                <label for="judulArtikel">Judul Artikel</label>
                                            </div>

                                        </div>

                                        <div id="edit"><%= result2.getString(3)%></div>
                                        <div class="input-field col s12 hide">
                                            <textarea name="dtArtikel" id="dtArtikel"><%= result2.getString(3)%></textarea>
                                        </div>

                                        <div style="padding: 20p;">
                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <input name="tagArtikel" id="tagArtikel" type="text" class="validate" required="true" value="<%= result2.getString(7)%>">
                                                    <label for="tagArtikel">Tag Artikel</label>
                                                </div>
                                                <div class="input-field col s12 hide">
                                                    <input name="type" id="type" type="text" class="validate" value="edit">
                                                </div>
                                                <div class="input-field col s12 hide">
                                                    <input name="creatorArtikel" value="<%
                                                        result.first();
                                                        out.print(result.getString(6));
                                                           %>" id="creatorArtikel" type="text" class="validate">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s3 offset-s6">
                                                    <input onclick="back();" type="button" value="Kembali" class="modal-action modal-close waves-effect waves-green red btn">
                                                </div>
                                                <div class="col s3">
                                                    <input onclick="getVal();" type="submit" value="Perbaharui Artikel" class="modal-action modal-close waves-effect waves-green indigo btn">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>

    </div>

    <!-- Froala JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <script type="text/javascript" src="js/froala_editor.min.js" ></script>
    <script type="text/javascript" src="js/plugins/align.min.js"></script>
    <script type="text/javascript" src="js/plugins/char_counter.min.js"></script>
    <script type="text/javascript" src="js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="js/plugins/code_view.min.js"></script>
    <script type="text/javascript" src="js/plugins/colors.min.js"></script>
    <script type="text/javascript" src="js/plugins/draggable.min.js"></script>
    <script type="text/javascript" src="js/plugins/emoticons.min.js"></script>
    <script type="text/javascript" src="js/plugins/entities.min.js"></script>
    <script type="text/javascript" src="js/plugins/file.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="js/plugins/fullscreen.min.js"></script>
    <script type="text/javascript" src="js/plugins/image.min.js"></script>
    <script type="text/javascript" src="js/plugins/image_manager.min.js"></script>
    <script type="text/javascript" src="js/plugins/line_breaker.min.js"></script>
    <script type="text/javascript" src="js/plugins/inline_style.min.js"></script>
    <script type="text/javascript" src="js/plugins/link.min.js"></script>
    <script type="text/javascript" src="js/plugins/lists.min.js"></script>
    <script type="text/javascript" src="js/plugins/paragraph_format.min.js"></script>
    <script type="text/javascript" src="js/plugins/paragraph_style.min.js"></script>
    <script type="text/javascript" src="js/plugins/quick_insert.min.js"></script>
    <script type="text/javascript" src="js/plugins/quote.min.js"></script>
    <script type="text/javascript" src="js/plugins/table.min.js"></script>
    <script type="text/javascript" src="js/plugins/save.min.js"></script>
    <script type="text/javascript" src="js/plugins/url.min.js"></script>
    <script type="text/javascript" src="js/plugins/video.min.js"></script>

    <script>
                                                        $(function () {
                                                            $('#edit').froalaEditor()
                                                        });
    </script>

</body>
</html>