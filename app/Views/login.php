<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/img/logo.png">
    <title>Log In | PGI Madiun</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/template/css/bootstrap.css">
    <link rel="stylesheet" href="/template/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-box-body" style="box-shadow: 4px 8px 20px #999;">
            <div class="login-logo">
                <a href=""><img src="/img/logo.png" style=" width: 145px; height: auto; "></a>
            </div>
            <h3 style=" text-align: center; ">Persatuan Golf Indonesia<br>Cabang Madiun</h3>
            <p class="login-box-msg">Silahkan masukkan username dan password</p>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-denger alert-dismissible" style="padding: 1px; text-align: center;">
                    <div class="alert-body">
                        <b>Error !</b>
                        <?= session()->getFlashdata('error') ?>
                    </div>
                </div>
            <?php endif ?>
            <form action="<?php echo base_url('administrator/loginproses'); ?>" method="post" id="frm-login">
                <?= csrf_field() ?>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username" maxlength="11">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" maxlength="11">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" id="btn-login" class="btn btn-primary btn-block btn-flat"><span class="text-load">Log in</span><img src="/img/loading.gif" style=" width: 20px; height: 20px; display: none; " class="img-load"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>