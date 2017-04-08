<?php
include("../proses/proses_cekSession.php");
include('../proses/proses_koneksi.php');
if($role == 1){
  $r = "Super Admin";
}else if($role == 2){
  $r = "Admin Komunitas";
  $query = "SELECT dataKomunitas FROM data_komunitas WHERE idKomunitas = '$komunitas'";
  $result = mysqli_query($conn, $query);
  if($result){$row = mysqli_fetch_array($result);}else{echo "Things go Wrong";}
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
          <li><a href="../forum.php">Forum</a></li>
          <li><a class="indigo darken-1" href="../proses/proses_logOut.php">Logout</a></li>

        </ul>
      </div>
    </nav>
  </div>

  <div class="row">
    <!-- Empty space -->

    <header class="col s2">
      <ul style="width:240px; margin-top:65px;" class="side-nav fixed indigo lighten-1">
        <a href="#" class="indigo accent-1">User Info</a></li>
        <a href="hi_dataartikel.php">Data Artikel</a></li>
        <a href="hi_datauserkomunitas.php">Data User Komunitas</a></li>
        <a href="hi_dataevent.php">Event</a></li>
        <?php
        if($role==1){
          echo "<a href='hi_dataadminkomunitas.php'>Data Admin Komunitas</a></li>";
        }
        ?>
      </ul>
    </header>


    <div class="col s10 grey lighten-5">
      <!-- Teal page content  -->

      <div class="section no-pad-bot grey lighten-5" id="index-banner">
        <div class="container">
          <br><br>
          <div class="row center">
            <h5 class="header col s12 light">
              Selamat Datang

            </h5>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel teal lighten-2 s12 white-text" style="padding:20px;">
                Info <?php echo $r; ?>
                <hr>
                <br>
                <div class="row">
                  <div class="col s12">
                    <div class="collection">
                      <a href="#!" class="collection-item">Nama User : <span class="badge"><?php echo $user; ?></span></a>
                      <a href="#!" class="collection-item">Email User : <span class="badge"><?php echo $email; ?></span></a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12">
                    <div class="collection">
                      <a href="#!" class="collection-item">Level Account : <span class="badge"><?php echo $r; ?></span></a>
                      <a href="#!" class="collection-item">Komunitas User : <span class="badge"><?php if($role == 2){echo $row[0];}else{echo $komunitas;} ?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel s12" style="padding:20px;">
                Data Perkembangan Komunitas
                <hr>
                <br>
                <div class="row">
                  <div class="col s12">
                    <div class="collection">
                      <img src="../media/dum_1.jpg" alt="Mountain View" style="width:100%;height:50%;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col s4">
              <div class="card-panel white s12" style="padding:20px;">
                Persentasi Pergerakan Komunitas
                <hr>
                <br>
                <div class="row">
                  <div class="col s12">
                    <div class="collection">
                      <img src="../media/dum_2.png" alt="Mountain View" style="width:100%;height:30%;">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col s8">
              <div class="card-panel lime accent-3 s12" style="padding:20px;">
                Info Persentasi Pergerakan Komunitas
                <hr>
                <br>
                <div class="row">
                  <div class="col s12">
                      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
