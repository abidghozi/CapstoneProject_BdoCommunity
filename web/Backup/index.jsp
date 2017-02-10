<%-- 
    Document   : index
    Created on : Nov 23, 2016, 12:28:28 AM
    Author     : Gerungan
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>

<!DOCTYPE html>
<html>
    <head>
        <title>BDO - HOME</title>
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

            $(document).ready(function () {
                // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
                $('.modalAdu').modal();
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
                        <li><a class="waves-effect waves-light btn" href="#modalLogin">Log In Admin</a></li>
                            <%
                            } else {
                            %>
                        <li><a href="redirect_dash">Hai, <% out.print(session.getAttribute("user").toString()); %> &nbsp;&nbsp;&nbsp;</a></li>
                            <%
                                }
                            %>

                        <li><a href="redirect_index">Home</a></li>
                        <li><a href="redirect_forum">Forum</a></li>
                        <li><a class="waves-effect waves-light btn" href="#modalAdu">Layanan Pengaduan</a></li>

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
                            <input value="Submit" type="submit" class="modal-action modal-close waves-effect waves-green btn"/>
                            <a href="#" class=" modal-action modal-close waves-effect waves-green btn-flat">Daftar</a>
                        </form>

                    </div>
                    </p>
                </div>
            </div>

            <!-- Pengaduan Modal Structure -->
            <div id="modalAdu" class="modal modalAdu">
                <div class="modal-content">
                    <h4>Form Pengaduan</h4>
                    <p>
                    <div class="row">
                        <form class="col s12" action="func_pengaduan" method="POST"> 
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">perm_identity</i>
                                    <input name="nama" id="nama" type="text" class="validate">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix">location_on</i>
                                    <input name="lokasi" id="lokasi" type="text" class="validate">
                                    <label for="lokasi">Lokasi</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="material-icons prefix">mode_edit</i>
                                    <textarea name="pengaduan" id="icon_prefix2" class="materialize-textarea"></textarea>
                                    <label for="icon_prefix2">Keluhan</label>
                                </div>
                            </div>


                            <div class="row">
                                <label>Upload Foto Lokasi</label>
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>Browse</span>
                                        <input type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text" placeholder="Upload foto">
                                    </div>
                                </div>
                            </div>

                            <input value="Adu Kan!" type="submit" class="modal-action modal-close waves-effect waves-green btn"/>
                        </form>
                    </div>
                    </p>
                </div>
            </div>

            <div class="col s12 grey lighten-5">
                <!-- Teal page content  -->


                <div class="section no-pad-bot grey lighten-5" id="index-banner">
                    <div class="container">
                        <br><br>
                        <h1 class="header center orange-text">Bandung Community</h1>
                        <div class="row center">
                            <h5 class="header col s12 light">Portal Informasi</h5>
                        </div>
                        <br><br>

                        <div class="row">

                            <div class="col s4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/img1.JPG">
                                        <span class="card-title">Hot Title</span>
                                    </div>
                                    <div class="card-content">
                                        <p>Komunitas ini telah berada di bandung selama 20 tahun dimana selalu memiliki peringkat terbaik.</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">Baca lebih lanjut</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/img1.JPG">
                                        <span class="card-title">Hot Title</span>
                                    </div>
                                    <div class="card-content">
                                        <p>Kegitan riding pada hari minggu di kota bandung saaat ini guna untuk peduli lingkungan telah dilakukan
                                            selama 1 tahun terakhir.</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">baca lebih lanjut</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col s4">
                                <div class="card">
                                    <div class="card-image">
                                        <img src="images/img1.JPG">
                                        <span class="card-title">Hot Title</span>
                                    </div>
                                    <div class="card-content">
                                        <p>Kegitan riding pada hari minggu di kota bandung saaat ini guna untuk peduli lingkungan telah dilakukan
                                            selama 1 tahun terakhir.</p>
                                    </div>
                                    <div class="card-action">
                                        <a href="#">baca lebih lanjut</a>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>


            </div>
        </div>

    </div>

</div>

</body>
</html>