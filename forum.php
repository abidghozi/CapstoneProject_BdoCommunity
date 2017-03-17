
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

                        <li>Hai, &nbsp;&nbsp;&nbsp;</li>
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
                    <a href="#" class="grey lighten-1">Admin Info</a></li>
                    <li><a href="redirect_daftarArtikel">Daftar Artikel</a></li>
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
                                Selamat datang
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col s7">
                                        <div class="collection">
                                            <a href="#!" class="collection-item">Nama Komunitas : <span class="badge">
                                                    <%
                                                        out.print(result.getString(6));
                                                    %>
                                                </span></a>
                                            <a href="#!" class="collection-item">Total Registered Member : <span class="badge">-</span></a>
                                        </div>
                                    </div>
                                    <div class="col s5">
                                        <div class="collection">
                                            <a href="#!" class="collection-item">Total Sumbited Article : <span class="badge"></span></a>
                                            <a href="#!" class="collection-item">Total Pending Article : <span class="badge"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="col s12">
                            <div class="card-panel s12 white-text light-green darken-4">
                                Informasi Admin
                                <hr>

                                <div class="row grey lighten-5" style="padding:20px; border-radius: 5px;">
                                <form class="col s12" action="func_NewAdmin" method="post">
                                    <div class="row teal-text">
                                        <div class="input-field col s6">
                                            <input name="uid" id="uid" type="text" class="hide" value="">
                                            <input name="uid" id="uid_fake" type="text" disabled value="">
                                            <label for="uid">UID</label>
                                        </div>
                                        <div class="input-field col s6">
                                            <input name="username" id="username" type="text" class="validate" value="">
                                            <label for="username">Username</label>
                                        </div>
                                    </div>
                                    <div class="row teal-text">
                                        <div class="input-field col s12">
                                            <input name="password" id="password" type="password" class="validate" value="">
                                            <label for="password">Password</label>
                                        </div>
                                    </div>
                                    <div class="row teal-text">
                                        <div class="input-field col s12">
                                            <input name="komunitas" id="komunitas" type="text" value="">
                                            <label for="komunitas">Komunitas</label>
                                        </div>
                                    </div>
                                            <div class="input-field col s12 hide">
                                                <input name="type" id="komunitas" type="text" value="edit" class="hide">
                                        </div>
                                    <input type="submit" value="Perbaharui Data Admin" class="modal-action modal-close waves-effect waves-green indigo btn">
                                </form>
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
