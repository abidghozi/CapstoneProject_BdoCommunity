<?php
session_start();
require_once "chat/src/phpfreechat.class.php";
include('proses/proses_koneksi.php');
if(isset($_SESSION['session_user'])){
  $user = $_SESSION['session_user'];
  $email = $_SESSION['session_email'];
  $role = $_SESSION['session_role'];
}else{
  $query = "SELECT * FROM data_komunitas";
  $result = mysqli_query($conn, $query)or die(mysql_error($conn));
}

$params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
$params["title"]    = "BDO COMMUNITY CHAT ROOM";
$params["nick"]     = "anonim";  // setup the intitial nickname
$params["channels"]        = array("Global");
$params["frozen_channels"] = array("Global", "Hobby");
$params["debug"]          = true;
$chat = new phpFreeChat( $params );

?>
<html>
<head>
  <link href="css/materialize.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
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

  <?php $chat->printJavascript(); ?>
  <?php $chat->printStyle(); ?>

</head>
<body>
  <nav class="nav-extended transparent">
    <div class="nav-background indigo darken-3 opacity-1" style="background-image: url(//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/icon-seamless.png);">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo">BDO COMMUNITY</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="forum.php">Forum</a></li>
          <li><a href="event.php">Event</a></li>
          <li><a href="chat/">Chat</a></li>
          <?php
          if(isset($user)){
            if($role<3){
              echo "<li class='ctive '><a href='dashboard/hi_index.php'>".$user." ( ".$email." )</a></li>";
              echo "<li class='active '><a href='proses/proses_logOut.php'>Log Out</a></li>";
            }else{
              ?>
              <li class="active "><a href="dashboard/"><?php echo $user." ( ".$email." )"; ?></a></li>
              <li class="active "><a href="proses/proses_logOut.php">Log Out</a></li>
              <?php
            }}else{
              ?>
              <li class="active "><a href="#modalLogin">Log in</a></li>
              <?php
            }
            ?>
          </ul>
        </div>
        <div style="padding:px;">
          <div class="center-align">
            <blockquote>
              <p>
                <div style="font-size:150%;">Chat Room</div>
              </p>
              </blockquote
            </div>
          </div>
        </div>
        <div class="nav-content indigo darken-4">
          <ul class="tabs tabs-transparent">
            <li class="tab"></li>
          </ul>
        </div>
      </nav>
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


      <div class="indigo lighten-5" style="min-height:50%; padding-bottom:50px; padding-top:15px;">
        <div class="container">
          <div class="row">
            <div class="col s2">
              <p>Rooms list:</p>
              <ul>
                <li><a href="#" onclick="pfc.sendRequest('/join Global');">Global</a></li>
                <li><a href="#" onclick="pfc.sendRequest('/join Hobby');">Hobby</a></li>
              </ul>
            </div>
            <div class="col s10">
              <?php $chat->printChat(); ?>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
