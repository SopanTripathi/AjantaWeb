<!DOCTYPE html> 
<html lang="en-US">
<head>
  <title>Revisiting Ajanta Backend Support </title>
  <meta charset="utf-8">
  <link href="<?php echo base_url(); ?>assets/css/global.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
	    <div class="container">
	      <a class="brand">REVISITING AJANTA</a>
	      <ul class="nav">
	        <li <?php if($this->uri->segment(2) == 'painting'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>painting/index">PAINTINGS</a>
	        </li>
	        <li <?php if($this->uri->segment(2) == 'stories'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>stories/index">STORIES</a>
	        </li>
                <li <?php if($this->uri->segment(2) == 'videos'){echo 'class="active"';}?>>
	          <a href="<?php echo base_url(); ?>video/index">VIDEOS</a>
	        </li>
                <li>
	              <a href="<?php echo base_url(); ?>home/logout">Logout</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</div>	
