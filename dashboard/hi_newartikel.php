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
        <a href="hi_dataartikel.php" class="indigo accent-1">Data Artikel</a></li>
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
              Buat Artikel Baru

            </h5>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="card-panel  deep-purple lighten-1 s12 gray-text" style="padding:20px;">
                <table class="highlight striped">
                  <form class="col s12" action="../proses/proses_tambahArtikel.php" method="post">
                    <div class="row">
                      <div class="input-field col s12">
                        <input name="judul" id="judul" type="text" class="validate">
                        <label for="judul">Judul Artikel</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class=" col s12">
                        <textarea name="editor1" id="editor1" rows="10" cols="80">
                          Write Your Article Here
                        </textarea>
                        <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                        </script>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s12">
                        <input placeholder="Contoh : #MOTOR #KENDARAAN #FORUMTERBUKA" name="tag" id="tag" type="text" class="validate">
                        <label for="tag">Tag Artikel</label>
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
