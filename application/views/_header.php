<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Recipe Tracker</a>
    </div>
    <div class="">
      <ul class="nav navbar-nav navbar-right">
        <li class="
          <?php if (!empty($active_page) && $active_page == 'home') {
            echo 'active';
          } ?>
          "><a href="<?php echo site_url('static_pages/home'); ?>">Home</a></li>
        <li class="
          <?php if (!empty($active_page) && $active_page == 'recipes') {
            echo 'active';
          } ?>
          "><a href="<?php echo site_url('recipes'); ?>">Recipes</a></li>
        <li class="
          <?php if (!empty($active_page) && $active_page == 'about') {
            echo 'active';
          } ?>
          "><a href="<?php echo site_url('static_pages/about'); ?>">About</a></li>
        <li class="
          <?php if (!empty($active_page) && $active_page == 'contact') {
            echo 'active';
          } ?>
        "><a href="<?php echo site_url('static_pages/contact'); ?>">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>
