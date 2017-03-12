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
</head>
<body>
  <nav class="nav-extended transparent">
    <div class="nav-background indigo darken-3 opacity-1" style="background-image: url(//cdn.shopify.com/s/files/1/1775/8583/t/1/assets/icon-seamless.png);">
      <div class="nav-wrapper container">
        <a href="#" class="brand-logo">Logo</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a href="#">Forum</a></li>
          <li><a href="#">About us</a></li>
          <li class="active "><a href="#modalLogin">Log in</a></li>
        </ul>
      </div>
      <div style="padding:100px;">
        <h3 class="center-align">This should be center aligned</h3>
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
                    <option value="Riders">Riders</option>
                    <option value="Sport">Sports</option>
                    <option value="Gamers">Gamers</option>
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


  <div class="indigo lighten-5" style="min-height:50%;">
    <div class="container">
      <div class="row">
        <div class ="cards" data-masonry='{"itemSelector": ".col" }'>
          <div class="col s4">
            <div class="card indigo darken-1 hoverable">
              <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam odio tortor, porttitor nec metus vitae, tincidunt facilisis nibh. Cras gravida eu mi in iaculis. Sed eleifend sapien ut leo semper tempus. Praesent luctus, erat vel pharetra condimentum, lectus magna ullamcorper turpis, vel laoreet leo eros ut diam. Vestibulum mauris odio,
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
            <div class="col s4">
              <div class="card indigo darken-1 hoverable">
                <div class="card-content white-text">
                  <span class="card-title">Card Title</span>
                  <p>Aliquam ligula metus, gravida vitae tempus eu, eleifend non justo. Donec elementum leo ut quam pulvinar, luctus commodo est vestibulum. Suspendisse potenti. Proin feugiat ligula a vulputate consequat. In nunc massa, sagittis id velit at, finibus dapibus mi. Nam blandit elementum dui quis maximus. Aliquam lectus lorem, blandit non dapibus eu, posuere in ligula. Ut pretium porttitor dapibus. Proin ac consequat ante. Aliquam sollicitudin in dolor non tempor. Nunc nec dolor ornare, semper turpis et, bibendum odio. Quisque maximus, sapien vitae sodales porttitor, erat metus interdum nunc, ac interdum felis turpis ac leo.</p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
            <div class="col s4">
              <div class="card indigo darken-1 hoverable">
                <div class="card-content white-text">
                  <span class="card-title">Card Title</span>
                  <p>Fusce ut vestibulum purus, in sollicitudin arcu. Integer semper mauris id ornare gravida. Aliquam urna leo, faucibus sed velit nec, rutrum fermentum libero.<br><br>

                    Duis lobortis volutpat leo sit amet laoreet. Donec scelerisque neque quis urna molestie pulvinar. Nulla auctor metus augue, non euismod tellus varius sit amet. Phasellus pellentesque rutrum dictum. Nam dignissim dapibus cursus. Aliquam scelerisque suscipit orci vitae finibus. Vivamus vel sem et lacus bibendum mollis. Duis vulputate arcu in rutrum vulputate. Nullam aliquam augue odio, ut iaculis nisl laoreet non. Quisque metus leo, posuere vulputate facilisis in, ultrices vitae nisl. Maecenas facilisis erat non metus faucibus euismod. Pellentesque vitae malesuada arcu.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                  </div>
                </div>
              </div>
              <div class="col s4">
                <div class="card indigo darken-1 hoverable">
                  <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>Nullam ullamcorper vestibulum sapien at dapibus. Sed non mauris id mauris tincidunt eleifend quis a libero. Integer fringilla quam nec hendrerit lacinia. Sed ut lacus ullamcorper, pellentesque dolor eu, volutpat nunc. Sed erat dolor, tempor nec purus eu, placerat vestibulum libero. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla ac lectus elit. Sed ante mauris, fermentum eget dolor sit amet, cursus luctus velit. Mauris sem dui, dapibus in porttitor ut, eleifend ac urna. Nullam feugiat in mi sit amet ultrices.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                  </div>
                </div>
              </div>
              <div class="col s4">
                <div class="card indigo darken-1 hoverable">
                  <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>Duis sed mollis odio. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum purus purus, facilisis quis commodo et, ornare at velit. Fusce id ex leo. Maecenas lacus magna, tincidunt vehicula nisi ac, egestas varius nisi. Vivamus ut porta ligula. Aliquam libero sem, imperdiet ut egestas sit amet, sollicitudin ut magna. Vivamus at nibh in tellus sodales aliquet ac sit amet sem. Aliquam cursus nunc vel finibus rhoncus.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                  </div>
                </div>
              </div>
              <div class="col s4">
                <div class="card indigo darken-1 hoverable">
                  <div class="card-content white-text">
                    <span class="card-title">Card Title</span>
                    <p>Maecenas eu pellentesque lorem, ac faucibus ligula. Proin tincidunt, nulla ut tristique ultrices, augue nisi suscipit urna, quis hendrerit nulla augue ut ligula. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed rhoncus congue elit ac malesuada. Curabitur consequat vestibulum arcu, ac hendrerit nisl rutrum vel. Nunc eleifend euismod mauris eget accumsan.</p>
                  </div>
                  <div class="card-action">
                    <a href="#">This is a link</a>
                    <a href="#">This is a link</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
    </html>
