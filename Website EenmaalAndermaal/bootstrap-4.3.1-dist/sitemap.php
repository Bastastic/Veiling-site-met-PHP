<!DOCTYPE php>
<html class="no-js">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="semantic.min.css" />
    <script
      src="https://code.jquery.com/jquery-3.1.1.min.js"
      integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
      crossorigin="anonymous"
    ></script>
    <script src="semantic.min.js"></script>
  </head>
  <body>
    <!-- header -->
    <?php include('header.php'); ?>
      <br>
    <!-- sitemap -->
    <div class="ui list">
  <div class="item">
    <i class="folder icon"></i>
    <div class="content">
      <div class="header">Antiek en Kunst</div>
      <div class="description">Source files for project</div>
      <div class="list">
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">site</div>
            <div class="description">Your site's theme</div>
          </div>
        </div>
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">themes</div>
            <div class="description">Packaged theme files</div>
            <div class="list">
              <div class="item">
                <i class="folder icon"></i>
                <div class="content">
                  <div class="header">default</div>
                  <div class="description">Default packaged theme</div>
                </div>
              </div>
              <div class="item">
                <i class="folder icon"></i>
                <div class="content">
                  <div class="header">my_theme</div>
                  <div class="description">Packaged themes are also available in this folder</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <i class="file icon"></i>
          <div class="content">
            <div class="header">theme.config</div>
            <div class="description">Config file for setting packaged themes</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <i class="folder icon"></i>
    <div class="content">
      <div class="header">dist</div>
      <div class="description">Compiled CSS and JS files</div>
      <div class="list">
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">components</div>
            <div class="description">Individual component CSS and JS</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <i class="file icon"></i>
    <div class="content">
      <div class="header">semantic.json</div>
      <div class="description">Contains build settings for gulp</div>
    </div>
  </div>
</div>
  </body>
  <!-- footer -->
      <footer>
        <?php include('footer.php'); ?>
      </footer>
</html>