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
$query_artikel = "SELECT * FROM data_artikel WHERE statusArtikel = 'PUBLISHED' ORDER BY idArtikel DESC";
$result_artikel = mysqli_query($conn, $query_artikel)or die(mysql_error($conn));
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
  </style>
</head>
<body class="mdl-forum">
  <nav class="color-primary">

      <a href="#" class="brand-logo">BDO Community Forum</a>

  </nav>
  <div class="tab-bar  color-primary--dark">
    <a href="index.php" class="layout__tab">Home</a>
    <a href="#overview" class="layout__tab is-active">Forum</a>
    <a href="#features" class="layout__tab">About Us</a>
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
                  <div class="card-title">Artikel<hr></div>
                  <?php while($row_artikel = mysqli_fetch_array($result_artikel)){ ?>
                  <div class="row">
                    <div class="col s10">
                      <h5><a href="artikel.php?q=<?php echo $row_artikel[0]; ?>"><?php echo $row_artikel[1]; ?></a></h5>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <div class="card-action">
                  1 2 3 4 5 ... Next >
                </div>
              </div>
          </div>
        </section>

      </div>
    </main>
  </div>
</body>
</html>
