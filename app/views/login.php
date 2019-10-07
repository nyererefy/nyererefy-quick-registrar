<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>public/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/main.css">
    <link href="<?= base_url() ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="<?= base_url() ?>public/js/jquery.js"></script>

    <style type="text/css">
        body, html {
            height: auto;
            background: #0B486B;
            background: -webkit-linear-gradient(to right, #0B486B, #F56217);
            background: linear-gradient(to right, #0B486B, #F56217);
        }
    </style>
</head>
<body>

<?php
$form = array(
    'id' => 'login_form'
);

$email = array(
    'name' => 'email',
    'placeholder' => 'Email',
    'class' => 'form-control',
    'required' => ''
);

$pass = array(
    'name' => 'password',
    'placeholder' => 'Password',
    'class' => 'form-control',
    'required' => ''
);

?>

<div class="login-form">
    <?= form_open('login', $form) ?>
    <div class="top">
        <img src="<?= base_url() ?>public/img/sigil.png" alt="icon" class="icon">
        <h4>Nyererefy Quick Registrar</h4>
    </div>
    <div class="form-area">
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger fade in">
                <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('login_failed')): ?>
            <div class="alert alert-danger fade in">
                <?= $this->session->flashdata('login_failed'); ?>
            </div>
        <?php endif; ?>

        <div class="group">
            <?= form_input($email) ?>
            <i class="fa fa-user"></i>
        </div>
        <div class="group">
            <?= form_password($pass) ?>
            <i class="fa fa-key"></i>
        </div>
        <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
    </div>

    <?= form_close() ?>

</div>

<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
</body>
</html>