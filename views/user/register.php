<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Регистрация</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="/template/admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/template/admin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/template/admin/plugins/iCheck/square/blue.css">
  <style>
      .register-box{
          width: 420px;
      }
  </style>
</head>
<body class="hold-transition register-page">
    <div class="register-box" >
  <div class="register-logo">
    <a href="/admin"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
      <p class="login-box-msg">Регистрация нового пользователя</p>
       
<?php if (isset($registration) && $registration['error'] == TRUE): ?>
    <?= '<p class="login-box-msg"  style="color:red">' . $registration['message'] . '</p>'; ?>
<?php else: ?>    
<?= '<p class="login-box-msg"  style="color:green">' . $registration['message'] . '</p>'; ?>
    
<?php endif; ?>

    <form action="#" method="post">
      <div class="form-group has-feedback">
          <input type="text" name="user_name" class="form-control" placeholder="Имя" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email; ?>">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Пароль" value="">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="password" class="form-control" name="confirm_password" placeholder="Повторить пароль">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">  
          <div class="checkbox icheck">
            <label>
              <!--<input type="checkbox"> Я согласен с <a href="#">условиями</a>-->
              <a href="/user/login" class="text-center">Я уже зарегестрирован. Войти</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Регистрация</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

<!--    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>-->

<!--    <a href="/user/login" class="text-center">Я уже зарегестрирован. Войти</a>-->
  </div>
  <!-- /.form-box -->
</div>

<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="/template/admin/plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/template/admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/template/admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


