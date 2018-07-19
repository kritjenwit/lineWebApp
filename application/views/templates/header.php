<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/css/style.css">
    <title><?php echo $title ; ?></title>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-light">

    <div class="container">
        <!-- Links -->
        <a href="<?php echo base_url() ?>" class="navbar-brand">Home</a>
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>#undone-work">Undone work</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>#unsent-work">Unsent work</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>user">User</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url() ?>work">Work</a>
            </li>
        </ul>
    </div>

</nav>

<div class="container">

