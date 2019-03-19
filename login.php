<?php include 'includes/head.php'; ?>
<div class="login-box">
  <div class="login-logo">

  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <?php if(isset($_GET['error'])){ ?>
      <div class="alert alert-danger alert-dismissible">
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo $_GET['error']; ?>
          </div>
      <?php } ?>
    <form action="core/action.php" method="POST">
      <div class="form-group has-feedback">

        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <a href="login_guest.php" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-user"></i> Guest</a>
        </div>
        <div class="col-xs-4">
          <button type="submit" name="login" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
