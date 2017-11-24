<!-- بسم الله الرحمن الرحیم -->

<?php
	$alert = '';

	if($this->session->flashdata('error')==null){

		$alert = 'hidden';
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
    <?php require_once('inc/css.php'); ?>
    <link rel="shortcut icon" type="text/css" href="<?php echo base_url() ?>assets/img/head_logo.jpg" />
    <style>

    .lockscreen-image {
    border-radius: 50%;
    position: absolute;
    left: -10px;
    top: -8px;
    background: #fff;
    padding: 5px;
    z-index: 10;
  }
  </style>


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/googlefont.css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="alert alert-warning alert-dismissible <?php echo $alert; ?>">
	    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
	    User ID atau Password salah.
	</div>
  <div class="lockscreen-logo">
   <img src="<?php echo base_url(); ?>assets/img/head_logo.jpg" width="50px">
    <a href="#"><b>QRS</b>YSTEM&nbsp;<b><h5></h5></b></a>
  </div>
  <!-- User name -->
  <!-- <div class="lockscreen-name">John Doe</div> -->

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="<?php echo base_url() ?>assets/img/myAvatar.png" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <form action="auth/login_act" method="post" class="lockscreen-credentials">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="username" name="txt_uid">
        <input type="password" class="form-control" placeholder="password" name="txt_pwd">

        <div class="input-group-btn">
          <button type="submit" class="btn"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Silahkan masukan username dan password anda
  </div>
  <div class="lockscreen-footer text-center">
    <b>Made with </b>
    <a href="https://goo.gl/kfSVZ3" target="_blank"><i class="fa fa-heart" aria-hidden="true" style="color:#be1931"></i></a> 
    <a href="https://goo.gl/eYmkkZ" target="_blank"><i class="glyphicon glyphicon-fire" aria-hidden="true" style="color:#e44b08"></i></a> 
     2017&nbsp;
    <a href="https://goo.gl/jqqhRe" target="_blank" ><b>&copy; PTRI IT</b></a></strong><br>
    <b>V 2.0 </b> |  <a href="<?php echo base_url(); ?>Log" target="_blank"><b>LOG</b></a>
    
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<!-- /.login-box -->
<?php require_once('inc/js.php'); ?>
</body>
</html>
