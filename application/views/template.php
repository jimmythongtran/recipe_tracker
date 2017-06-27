<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $title; ?> | Recipe Tracker</title>

    <link rel="stylesheet" href="<?php echo base_url('css/vendor/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('css/custom.css'); ?>">

    <script src="<?php echo base_url('js/vendor/jquery-1.11.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/vendor/jquery-ui-1.10.4.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.js'); ?>"></script>

    <?php $this->load->view('_shim'); ?>

    <script>
        // create a variable for accessing the app's roote site URL
        // within other JavaScript code
        var site_url = '<?php echo site_url(); ?>';
    </script>
  </head>
  <body>

  <?php $this->load->view('_header'); ?>

    <div class="container">

      <?php echo $contents; ?>

      <?php $this->load->view('_footer'); ?>

    </div>

  </body>
</html>
