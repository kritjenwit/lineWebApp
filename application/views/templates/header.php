<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css">
    <script src="<?php echo base_url()?>assets/js/main.js"></script>
    <title><?php echo $title ; ?></title>
</head>
<body>


<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <div class="container">
        <a class="navbar-brand" href="<?php echo base_url() ?>">LineWebBot</a>

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        User
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url() ?>user">Detail</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        Work
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo base_url() ?>work">Detail</a>
                        <a class="dropdown-item" href="<?php echo base_url()?>#undone-work">Undone work</a>
                        <a class="dropdown-item" href="<?php echo base_url() ?>#unsent-work">Unsent work</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="message" class="nav-link">Message</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>profile" class="nav-link"><?php echo $this->session->userdata('display_name') ?></a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url() ?>profile" class="nav-link"><img class="rounded-circle" style="width: 33px;height: 33px;" src="<?php echo $this->session->userdata('img') ?>" alt="user dsiplay image"></a>
                </li>
                <li class="nav-item"><a href="logout" class="nav-link">logout</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container mt-5">

