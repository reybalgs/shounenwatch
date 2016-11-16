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
    <!-- JQuery UI -->
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- JQuery UI CSS -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo base_url('') ?>dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome CDN -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    
    <script>
        if (window.jQuery) {
            console.log()
        }
    </script>

</head>
<body style="padding-top: 80px">
<!-- Navbar goes here -->
<div class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="brand" href="<?php echo base_url('') ?>">
        <img class="im-nav-logo" height="48x" src="<?php echo base_url('static').'/'.'shounenwatch.png' ?>"/>
      </a>
    </div>
    <div id="navbar-items" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
        <li class="hidden-md hidden-sm"><a href="<?php echo base_url('')?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="visible-sm"><a href="<?php echo base_url('')?>"><i class="fa fa-home" data-toggle="tooltip" data-placement="bottom" title="Home"></i></a></li>
        <li class="hidden-sm"><a href="<?php echo site_url('anime/browse/all') ?>"><i class="fa fa-bars"></i> Browse</a></li>
        <li class="visible-sm"><a href="<?php echo site_url('anime/browse/all') ?>"><i class="fa fa-bars"></i></a></li>
        <li class="hidden-sm"><a href="<?php echo site_url('anime/browse/watching') ?>"><i class="fa fa-trophy"></i> Most Watched</a></li>
        <li class="visible-sm"><a href="<?php echo site_url('anime/browse/watching') ?>"><i class="fa fa-trophy"></i></a></li>
        <li class="hidden-sm"><a href="<?php echo site_url('anime/browse/rating') ?>"><i class="fa fa-star"></i> Top Rated</a></li>
        <li class="visible-sm"><a href="<?php echo site_url('anime/browse/rating') ?>"><i class="fa fa-star"></i></a></li>
        <li class="hidden-sm"><a href="<?php echo site_url('anime/search')?>"><i class="fa fa-search"></i> Search</a></li>
        <li class="visible-sm"><a href="<?php echo site_url('anime/search')?>"><i class="fa fa-search"></i></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
            # Check if the user is logged in.
            # If they are, display their name and a dropdown menu of useful
            # options, otherwise, just display a link to the login page.
            if($this->session->userdata('username')) {
        ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <?php echo $this->session->userdata('username')?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li><a href="<?php echo site_url('user/profile').'/'.$this->session->userdata('username')?>"><i class="fa fa-user"></i> View Profile</a></li>
                <li><a href="<?php echo site_url('user/manage_watchlist')?>"><i class="fa fa-play-circle"></i> Your Watchlist</a></li>
                <li><a href="<?php echo site_url('anime/submit') ?>"><i class="fa fa-plus"></i> Submit New Anime</a></li>
                <?php
                if($this->session->userdata('user_id') == 1) {
                ?>
                <li><a href="<?php echo site_url('admin/panel') ?>"><i class="fa fa-wrench"></i> Admin Panel</a></li>
                <?php
                }
                ?>
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
