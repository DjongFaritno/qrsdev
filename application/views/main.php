       <?php
// بسم الله الرحمن الرحیم
	$id = $this->session->userdata('logged_in')['id'];
	$username = $this->session->userdata('logged_in')['username'];
	$nama = $this->session->userdata('logged_in')['nama'];
	$privilege = $this->session->userdata('logged_in')['privilege'];
	$daterec = $this->session->userdata('logged_in')['daterec'];
  ?>
  <script type="text/javascript">
  var base_url = '<?php echo base_url(); ?>';
  var username = '<?php echo $this->session->userdata('logged_in')['username'];?>';
  var privilege = '<?php echo $this->session->userdata('logged_in')['privilege'];?>';

  </script>
  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>QRS</title>
        <?php include_once('inc/css.php'); ?>
        <?php include_once('inc/js.php'); ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/head_logo.jpg" /> </head>

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/googlefont.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url(); ?>dashboard" class="navbar-brand"><b><i class="fa fa-fw fa-qrcode"></i>QRS</b>YSTEM</a>
          <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- #region topbar -->
            <?php include_once('inc/topbar.php'); ?>
            <!-- #endregion topbar -->
            
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <?php include_once('inc/header.php'); ?>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>
  <!-- Full Width Column -->
  
  <div class="content-wrapper">
    <?php if(isset($content)) echo $content; ?>
    
    <!-- /.container -->
  </div>
   <!-- #region footer -->
    <?php include_once('inc/footer.php'); ?>
    <!-- #endregion footer -->
</div>
<!-- ./wrapper -->

</body>
</html>
