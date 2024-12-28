<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title; ?> - SIAKES</title>

  <link rel="icon" type="image/x-png" href="<?= base_url(); ?>public/assets/dist/img/siakes.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/dist/css/adminlte.min.css">

  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/select2/css/select2.min.css">

  <link rel="stylesheet" href="<?= base_url(); ?>public/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <?= $this->renderSection('head'); ?>

  <style>
    :root {
      --primary-color: #003FF9;
      --primary-color-hover: rgba(0, 62, 249, 0.83);
      --secondary-color: #FEEFE6;
    }

    .sidebar-dark-primary {
      background-color: var(--primary-color);
    }

    [class*=sidebar-dark-] .sidebar a {
      color: #fff;
    }

    .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active,
    .sidebar-light-primary .nav-sidebar>.nav-item>.nav-link.active {
      background-color: #fff;
      color: var(--primary-color);
    }

    .card-header {
      background-color: var(--primary-color);
      color: #fff;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link {
      color: #fff;
    }

    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus,
    [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
      /* background-color: rgba(255, 255, 255, .9); */
      color: var(--primary-color);
    }


    .btn-primary,
    .bg-primary {
      background-color: var(--primary-color);
    }

    .text-primary {
      color: var(--primary-color);
    }

    .calendar-container {
      background: #fff;
      width: 450px;
      border-radius: 10px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .calendar-container header {
      display: flex;
      align-items: center;
      padding: 25px 30px 10px;
      justify-content: space-between;
    }

    header .calendar-navigation {
      display: flex;
    }

    .calendar-navigation span {
      height: 10px;
      width: 10px;
      margin: 0 5px;
      cursor: pointer;
      text-align: right;
      line-height: 38px;
      border-radius: 50%;
      user-select: none;
      color: #fff;
      font-size: 1.4rem;
    }

    .calendar-navigation span:last-child {
      margin-right: -10px;
    }

    header .calendar-navigation span:hover {
      background: #f2f2f2;
    }

    header .calendar-current-date {
      font-weight: 500;
      font-size: 1.45rem;
    }

    .calendar-body {
      padding: 20px;
    }

    .calendar-body ul {
      list-style: none;
      flex-wrap: wrap;
      display: flex;
      text-align: center;
      padding: 0;
      margin: 0;
    }

    .calendar-body .calendar-dates {
      margin-bottom: 20px;
    }

    .calendar-body li {
      width: calc(100% / 7);
      font-size: 1.07rem;
      color: #414141;
    }

    .calendar-body .calendar-weekdays li {
      cursor: default;
      font-weight: 500;
    }

    .calendar-body .calendar-dates li {
      margin-top: 30px;
      position: relative;
      z-index: 1;
      cursor: pointer;
    }

    .calendar-dates li.inactive {
      color: #aaa;
    }

    .calendar-dates li.active {
      color: #fff;
    }

    .calendar-dates li::before {
      position: absolute;
      content: "";
      z-index: -1;
      top: 50%;
      left: 50%;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      transform: translate(-50%, -50%);
    }

    .calendar-dates li.active::before {
      background: #003FF9;
    }

    .calendar-dates li:not(.active):hover::before {
      background: #e4e1e1;
    }
  </style>
</head>