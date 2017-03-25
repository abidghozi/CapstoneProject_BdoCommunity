<?php
//MASIH BELOM BISA
include("../proses/proses_cekSession.php");
include("../proses/proses_koneksi.php");
if($role == 1){
  $query = "SELECT * FROM data_komunitas";
  $result = mysqli_query($conn, $query)or die(mysql_error($conn));
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
        <a href="hi_index.php">User Info</a></li>
        <a href="hi_dataartikel.php">Data Artikel</a></li>
        <a href="hi_datauserkomunitas.php" >Data User Komunitas</a></li>
        <a href="hi_dataevent.php">Event</a></li>
        <?php
        if($role==1){
          echo "<a href='hi_dataadminkomunitas.php'class='indigo accent-1'>Data Admin Komunitas</a></li>";
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


            </h5>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel deep-purple lighten-1 s12 white-text" style="padding:20px;">
                <table class="teal accent-1 highlight striped">
                  Tambah Admin<hr>

                  <div id="test2" class="col s12">
                    <div class="row">
                      <form class="col s12" autocomplete="off" action="../proses/proses_tambahAdmin.php" method="post">
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
                            <select id="komunitas" name="komunitas" onchange="selectFunc()">
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
                            <input id="komunitashidden" type="text" name="komunitashidden" hidden="true">
                            <script>
                            function selectFunc(){
                              var x = document.getElementById("komunitas").value;
                              var hidden = document.getElementById("komunitashidden");
                              hidden.value = x;
                            }
                            </script>
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

          </div>

        </div>

      </body>
      </html>
