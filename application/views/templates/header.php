<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title ?></title>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url('') ?>dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- JQuery -->
    <script src="<?php echo base_url('') ?>jquery-1.11.0.min.js"></script>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo base_url('') ?>dist/js/bootstrap.min.js"></script>
    
    <script>
        if (window.jQuery) {
            console.log()
        }
    </script>

</head>
<body style="padding-top: 70px">
<!-- Navbar goes here -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url('') ?>">ShounenWatch!</a>
    </div>
    <div id="navbar-items" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <?php
            # If we are logged in, home link should take us to anime list
            if($this->session->userdata('username')) {
        ?>
        <li class="active"><a href="<?php echo site_url('anime')?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <?php
            }
            else {
        ?>
        <li class="active"><a href="<?php echo base_url('')?>"><span class="glyphicon glyphicon-home"></span></a></li>
        <?php
            }
        ?>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for badass anime!">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php
            # Check if the user is logged in.
            # If they are, display their name and a dropdown menu of useful
            # options, otherwise, just display a link to the login page.
            if($this->session->userdata('username')) {
        ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->session->userdata('username')?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('user/profile').'/'.$this->session->userdata('username')?>">View Profile</a></li>
                <li><a href="#">Submissions</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url('user/logout') ?>">Logout</a></li>
            </ul>
        </li>
        <?php
            }
            else {
                # Not logged in
        ?>
        <li><a href="<?php echo site_url("user/login") ?>">Sign In/Register</a></li>
        <?php
            }
        ?>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
