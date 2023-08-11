<!DOCTYPE html>
<html lang="en" data-topbar-color="dark">

<head>
	<meta charset="utf-8" />
	<?php 
            if (isset($title)) { ?>
	<title><?= ucwords($title) ?></title>
	<?php }else { ?>
	<title>SIPAS</title>
	<?php }
        ?>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta content="Aplikasi Sistem Informasi Pelacakan Surat" name="description" />
	<meta content="rijaldev" name="author" />
	<link rel="shortcut icon" href="<?= base_url('public/')?>images/programmer.ico">
	<script src="<?= base_url('public/') ?>js/head.js"></script>
	<link href="<?= base_url('public/') ?>libs/jquery-toast-plugin/jquery.toast.min.css" rel="stylesheet"
		type="text/css" />
	<link href="<?= base_url('public/') ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" id="app-style" />
	<link href="<?= base_url('public/') ?>css/app.min.css" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('public/') ?>css/icons.min.css" rel="stylesheet" type="text/css" />


	<!-- Sweet Alert-->
	<link href="<?= base_url('public/') ?>libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


	<?php
            if (isset($table)) { ?>
	<!-- third party css -->
	<link href="<?= base_url('public/') ?>libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
		type="text/css" />
	<link href="<?= base_url('public/') ?>libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
		rel="stylesheet" type="text/css" />
	<link href="<?= base_url('public/') ?>libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
		rel="stylesheet" type="text/css" />
	<link href="<?= base_url('public/') ?>libs/datatables.net-select-bs5/css//select.bootstrap5.min.css"
		rel="stylesheet" type="text/css" />
	<!-- third party css end -->
	<?php }
        ?>

</head>

<body>
	<div id="wrapper">