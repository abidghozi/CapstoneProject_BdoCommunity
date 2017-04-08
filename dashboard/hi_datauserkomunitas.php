<?php
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");
if($role == 1){
  $r = "Super Admin";
  $query = "SELECT * FROM table_user WHERE role = 3";
  $result = mysqli_query($conn,$query);
}else if($role == 2){
  $r = "Admin Komunitas";
  $query = "SELECT * FROM table_user WHERE idKomunitas = '$komunitas' AND role = 3";
  $result = mysqli_query($conn,$query);

}else{
  header('Location: ../index.php');
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
        <a href="hi_index.php">User Info</a></li>
        <a href="hi_dataartikel.php">Data Artikel</a></li>
        <a href="#" class="indigo accent-1">Data User Komunitas</a></li>
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
                <table class="teal lighten-5 highlight striped">
                  Data User Komunitas, <?php echo $namaKomunitas; ?><hr>
                  <thead>
                    <tr>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Komunitas</th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
                      <td><?php echo $row[0]; ?></td>
                      <td><?php echo $row[2]; ?></td>
                      <td><?php echo $row[3]; ?></td>
                      <td><a href = "hi_editUser.php?user=<?php echo $row[0]; ?>">Edit</a></td>
                    </tr>
                    <?php } ?>
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
