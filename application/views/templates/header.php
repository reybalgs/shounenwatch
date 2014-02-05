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
      <a class="navbar-brand" href="#">ShounenWatch!</a>
    </div>
    <div id="navbar-items" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('')?>"><span class="glyphicon glyphicon-home"></span></a></li>
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
        <li><a href="<?php echo site_url("user/login") ?>"><p class="navbar-text"></p>
        <?php
            # Get the username of the user from the session if they are logged in
            if($this->session->userdata('username')) {
                echo 'Logged in as '.$this->session->userdata('username');
            }
            else {
                echo 'Sign In';
            }
        ?>
        </a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</div>
