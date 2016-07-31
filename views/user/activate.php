<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Подтверждение email</title>
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
  <!--<link rel="stylesheet" href="/template/admin/plugins/iCheck/square/blue.css">-->

  <style>
      .login-box{
          width: 420px;
      }
  </style>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/admin"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Введите код для активации Email</p>
    <?php if (isset($result) && $result['error'] == TRUE): ?>
    <?= '<p class="login-box-msg"  style="color:red">' . $result['message'] . '</p>'; ?>
    <?php else: ?>    
    <?= '<p class="login-box-msg"  style="color:green">' . $result['message'] . '</p>'; ?>
    <?php endif; ?>
    
    <form action="#" method="post">
      <div class="form-group has-feedback">
          <input type="text" name="key" class="form-control" placeholder="Activate code">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-5">
            <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Активировать</button>
        </div>
        <a href="/user/login" class="text-center">Я уже зарегестрирован. Войти</a>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- Bootstrap 3.3.5 -->
<script src="/template/admin/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
