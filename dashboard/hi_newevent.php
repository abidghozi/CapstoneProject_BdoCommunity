<?php
include("../proses/proses_cekSession.php");
if($role == 1){
  $r = "Super Admin";
}else if($role == 2){
  $r = "Admin Komunitas";
}else{
  header('Location: hi_index.php');
}
?>
<html>
<head>
  <link href="../css/materialize.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <script src="../js/jquery-3.1.1.min.js"></script>
  <script src="../js/materialize.js"></script>
  <script src="../js/masonry.pkgd.min.js"></script>
  <script src="ckeditor/ckeditor.js"></script>

  <style>
  #map {
    height: 400px;
    width: 100%;
  }
  .dashku{
    margin-left: 200px;
    padding-left: 200px;
  }
  /* label color */
  .input-field label {
    color: #FFF;
  }
  /* label focus color */
  .input-field input[type=text]:focus + label {
    color: #FFF;
  }
  /* label underline focus color */
  .input-field input[type=text]:focus {
    border-bottom: 1px solid #FFF;
    box-shadow: 0 1px 0 0 #FFF;
  }
  /* valid color */
  .input-field input[type=text].valid {
    border-bottom: 1px solid #FFF;
    box-shadow: 0 1px 0 0 #FFF;
  }
  /* invalid color */
  .input-field input[type=text].invalid {
    border-bottom: 1px solid #FFF;
    box-shadow: 0 1px 0 0 #FFF;
  }
  /* icon prefix focus color */
  .input-field .prefix.active {
    color: #FFF;
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
        <a href="hi_datauserkomunitas.php">Data User Komunitas</a></li>
        <a href="hi_dataevent.php" class="indigo accent-1">Event</a></li>
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
              Buat Event Baru

            </h5>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel  deep-purple lighten-1 s12 gray-text" style="padding:20px;">
                <table class="highlight striped">
                  <form class="col s12" action="../proses/proses_tambahEvent.php" method="post">
                    <div class="row">
                      <div class="input-field col s6">
                        <input placeholder="Contoh : BAKSOS, SEMINAR" name="tema" id="tema" type="text" class="validate">
                        <label for="tema">Tema Event</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="tanggal" id="tanggal" type="date" class="datepicker">
                        <label for="tanggal">Tanggal Event</label>
                        <script>
                        $('.datepicker').pickadate({
                          selectMonths: true, // Creates a dropdown to control month
                          selectYears: 15 // Creates a dropdown of 15 years to control year
                        });
                        </script>
                      </div>
                      <div class="input-field col s12">
                        <input name="nama" id="nama" type="text" class="validate">
                        <label for="nama">Nama Event</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class=" col s12">
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                          Write Your Event Here
                        </textarea>
                        <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                        </script>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <input name="p_jawab" id="p_jawab" type="text" class="validate">
                        <label for="p_jawab">Penanggung Jawab Event</label>
                      </div>
                      <div class="input-field col s6">
                        <input name="k_jawab" id="k_jawab" type="text" class="validate">
                        <label for="k_jawab">Kontak Penanggung Jawab Event</label>
                      </div>
                      <div class="white-text input-field col s12">
                        Pilih Lokasi Event<hr>
                        <br>
                        <div id="map"></div>
                        <script>
                        function initMap() {
                          var bandung = {lat: -6.919517, lng: 107.607060};
                          var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 13  ,
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
                        *Klik pada peta untuk memilih lokasi event
                        <input name="l_event" id="l_event" type="text" class="validate" hidden="true">
                      </div>
                    </div>
                    <input type="submit" class="right waves-light btn">
                  </form>
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
