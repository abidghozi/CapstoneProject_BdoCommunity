<?php
include("../proses/proses_cekSession.php");
if($role == 1){
  $r = "Super Admin";
}else if($role == 2){
  $r = "Admin Komunitas";
}else{
  $r = "User";
}
?>
<html>
<head>
  <link href="../css/materialize.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/masonry.pkgd.min.js"></script>
  <style>
  .dashku{
    margin-left: 200px;
    padding-left: 200px;
  }
  </style>
</head>
<body>
  <div class="navbar-fixed">
    <nav >
      <div class="nav-wrapper indigo darken-4" >
        <a href="#" class="brand-logo" style="margin-left:25px;">BDO COMMUNITY</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">

          <li>Hai, <?php echo $user; ?>&nbsp;</li>
          <li><a href="../">Home</a></li>
          <li><a href="#">Forum</a></li>
          <li><a class="indigo darken-1" href="../proses/proses_logOut.php">Logout</a></li>

        </ul>
      </div>
    </nav>
  </div>

  <div class="row">
    <!-- Empty space -->

    <header class="col s2">
      <ul style="width:240px; margin-top:65px;" class="side-nav fixed indigo lighten-1">
        <a href="index.php">User Info</a></li>
        <a href="#" class="indigo accent-1">Data Komentar</a></li>
        <a href="dataevent.php">Event</a></li>
      </ul>
    </header>


    <div class="col s10 grey lighten-5">
      <!-- Teal page content  -->

      <div class="section no-pad-bot grey lighten-5" id="index-banner">
        <div class="container">
          <br><br>
          <div class="row center">
            <h5 class="header col s12 light">
              Data Komentar

            </h5>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel teal lighten-2 s12 white-text" style="padding:20px;">
                <table class="teal lighten-5 highlight striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Artikel</th>
                      <th>Komentar</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Siapkan superbike 4 silinder, Ducati pragmatis</td>
                      <td>itu desmosedici jejeran sama sepeda anak-anak, kesannya jadi gimana gituuu….</td>
                      <td><a href="#">Hapus</a></td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>New Honda CB650F</td>
                      <td>Soal harga gimana? Mesti saingan sama z900 yg “cuman” 225jt.. cc jauh lebih gede</td>
                      <td><a href="#">Hapus</a></td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Honda rebel siap dirilis</td>
                      <td>Kalo ada yg 250cc nya bakal jadi best seller tuh..kereen</td>
                      <td><a href="#">Hapus</a></td>
                    </tr>
                  </tbody>
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
