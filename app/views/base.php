<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nyererefy Quick Registrar</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>public/img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>public/css/main.css">
    <link href="<?= base_url() ?>public/css/metisMenu.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/dt/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="<?= base_url() ?>public/js/jquery.js"></script>

</head>
<body>

<div id="wrapper">
    <nav id="navbar" class="navbar navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url() ?>">Nyererefy Quick Registrar</a>
        </div>
        <!-- /.navbar-header -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li><a href="<?= base_url() ?>programs"><i class="fa fa-power-off fa-fw"></i> Programs</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>"><i class="fa fa-users fa-fw"></i> Students</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>settings"><i class="fa fa-users fa-fw"></i> Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="<?= base_url() ?>login/logout"><i class="fa fa-power-off fa-fw"></i> Logout</a></li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">
        <?php if ($this->session->flashdata('success')): ?>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <br>
                    <div class="alert alert-info fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h4 class="text-center"><?= $this->session->flashdata('success') ?></h4>
                    </div>
                </div>

            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('fail')): ?>
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-2">
                    <br>
                    <div class="alert alert-danger fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <h4 class="text-center"><?= $this->session->flashdata('fail') ?></h4>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <br>
        <?php $this->load->view($view) ?>

        <footer class="footer">
            <div class='pull-left'>
                <span>Copyright &copy; Nyererefy 2017-<?= date("Y") ?></span>
            </div>

            <div class="pull-right">
                This is an open source application, Source code is available on
                <a href="https://github.com/nyererefy/nyererefy-quick-registrar">Github</a>
            </div>
        </footer>

    </div> <!--/.page-wrapper-->

</div> <!--/.wrapper-->


<script src="<?= base_url() ?>public/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>public/dt/datatables.min.js"></script>
<script src="<?= base_url() ?>public/js/mn.min.js"></script>
<script src="<?= base_url() ?>public/js/sb.js"></script>

</body>
</html>

