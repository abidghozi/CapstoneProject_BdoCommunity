<?php
session_start();
include('proses/proses_koneksi.php');
if(isset($_SESSION['session_user'])){
  $user = $_SESSION['session_user'];
  $email = $_SESSION['session_email'];
  $role = $_SESSION['session_role'];
}else{
  $query = "SELECT * FROM data_komunitas";
  $result = mysqli_query($conn, $query)or die(mysql_error($conn));
}
if(!isset($_GET['q'])){
  echo "<script>alert('Event Tidak Ditemukan');
  window.location.href='event.php';
  </script>";
}
$q = $_GET['q'];
$query_artikel = "SELECT * FROM data_event WHERE id_event = '$q'";
$result_artikel = mysqli_query($conn, $query_artikel)or die(mysqli_error($conn));
$row_artikel = mysqli_fetch_array($result_artikel);

$query_follower = "SELECT * FROM data_event_follower WHERE id_event = '$q'";
$result_follower = mysqli_query($conn, $query_follower)or die(mysqli_error($conn));
$num_follower = mysqli_num_rows($result_follower);
?>
<html>
<head>
  <link href="css/materialize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/styles_forum.css" rel="stylesheet">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/masonry.pkgd.min.js"></script>
  <script>
  $('.cards').masonry({
    columnWidth: 200,
    itemSelector: '.col'
  });
  </script>
  <script>
  $(document).ready(function () {
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modalLogin').modal();
  });
  $(document).ready(function() {
    $('select').material_select();
  });
  </script>
  <style>
  #view-source {
    position: fixed;
    display: block;
    right: 0;
    bottom: 0;
    margin-right: 40px;
    margin-bottom: 40px;
    z-index: 900;
  }
  #map {
    height: 400px;
    width: 100%;
  }
  </style>
</head>
<body class="mdl-forum">
  <nav class="color-primary">

    <a href="forum.php" class="brand-logo">BDO Community Forum</a>

  </nav>
  <div class="tab-bar  color-primary--dark">
    <a href="index.php" class="layout__tab">Home</a>
    <a href="forum.php" class="layout__tab">Forum</a>
    <a href="event.php" class="layout__tab is-active">Event</a>
    <a href="chat.php" class="layout__tab">Chat</a>
    <?php
    if(isset($user)){
      if($role<3){
        echo "<a class='layout__tab' href='dashboard/hi_index.php'>".$user." ( ".$email." )</a>";
        echo "<a class='layout__tab' href='proses/proses_logOut.php'>Log Out</a>";
      }else{
        ?>
        <a class="layout__tab" href="dashboard/"><?php echo $user." ( ".$email." )"; ?></a>
        <a class="layout__tab" href="proses/proses_logOut.php">Log Out</a>
        <?php
      }}else{
        ?>
        <a class="layout__tab" href="#modalLogin">Log in</a>
        <?php
      }
      ?>
    </div>

    <!-- Login Modal Structure -->
    <div id="modalLogin" class="modal modalLogin" style="width:35%;">
      <div class="modal-content">
        <div class="row">
          <div class="col s12">
            <ul class="tabs z-depth-5">
              <li class="tab col s6"><a class="active" href="#test1">Log In</a></li>
              <li class="tab col s6"><a href="#test2">Sign In</a></li>
            </ul>
          </div>
          <div id="test1" class="col s12">
            <div class="row">
              <form class="col s12" autocomplete="off" action="proses/proses_login.php" method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" name="username" type="text" value="" autocomplete="new-password">
                    <label for="email">Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate" value="" autocomplete="new-password">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="row">
                  <div class="right col s12">
                    <input type="submit" class="right waves-light btn">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div id="test2" class="col s12">
            <div class="row">
              <form class="col s12" autocomplete="off" action="proses/proses_daftar.php" method="post">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="username" name="username" type="text" value="" autocomplete="new-password">
                    <label for="email">Username</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="password" name="password" type="password" value="" autocomplete="new-password">
                    <label for="password">Password</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <select name="komunitas">
                      <option value="" disabled selected>Choose your Community</option>
                      <?php
                      while($row = mysqli_fetch_array($result)){
                        ?>
                        <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                        <?php
                      }
                      ?>
                    </select>
                    <label>Your Community</label>
                  </div>
                </div>
                <div class="row">
                  <div class="right col s12">
                    <input type="submit" class="right waves-light btn">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <main class="mdl-layout__content">
        <div class="mdl-layout__tab-panel is-active" id="overview">
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">

          </section>
          <section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <div class="row">
              <div class="card">
                <div class="card-content">
                  <div class="card-title"><strong><?php echo $row_artikel[3]; ?></strong><hr></div>
                  <?php echo $row_artikel[4]; ?>
                </div>
                <div class="card-action">
                  Info Event <hr>
                  Tema Event : <?php echo $row_artikel[1]; ?><br>
                  Tanggal : <?php echo $row_artikel[2]; ?><br>
                  Kontak : <?php echo $row_artikel[5].", ".$row_artikel[6]; ?><br><br>
                  Lokasi Event <hr>
                  <div id="map"></div>
                  <?php
                  $loc = str_replace(array('(',')'), '',$row_artikel[7]);
                  $exp_loc = explode(',',$loc);
                  ?>
                  <script>
                  function initMap() {
                    var bandung = {lat: <?php echo $exp_loc[0]; ?>, lng: <?php echo $exp_loc[1]; ?>};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 16  ,
                      center: bandung
                    });

                    var marker = new google.maps.Marker({
                      position: bandung,
                      map: map
                    });
                    function placeMarker(position, map) {
                      marker.setPosition(position);
                    }

                    google.maps.event.addListener(map, 'click', function(e) {
                      placeMarker(e.latLng, map);
                      alert("Lokasi Terpilih Di : "+e.latLng);
                      document.getElementById("l_event").value=e.latLng;
                    });

                  }
                  // google.maps.event.addListener(map, 'click', function(event) {alert(event.latLng);});
                  </script>
                  <script async defer
                  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjo2-TMEkJmIvLHhx-TG_QWJUtEVzEwQU&callback=initMap">
                  </script>
                </div>
                <div class="card-action light-blue lighten-5">
                  Follower : <?php echo $num_follower; ?> Orang
                  <?php
                  error_reporting(0);
                  if($user === null || $user == '' || $user == ""){
                  ?>
                  <a href="#modalLogin"><input type="submit" value="Ikuti Event" class="right waves-light btn"></a><hr>
                  <?php }else{ ?>
                    <form method="post" action="proses/proses_ikutiEvent.php">
                  <input type="submit" value="Ikuti Event" class="right waves-light btn"><hr>
                  <?php } ?>
                    <input type="text" name="user" value="<?php echo $user; ?>" hidden="true">
                    <input type="text" name="id_event" value="<?php echo $q; ?>" hidden="true">
                      <?php
                      if($num_follower>0){
                        while ($row_follower = mysqli_fetch_array($result_follower)) {
                          echo $row_follower[2].", ";
                        }
                      }else {
                        echo "-";
                      }
                       ?>
                  </form>
                </div>
              </div>
            </div>

              </main>
            </div>
          </body>
          </html>
