<!DOCTYPE html> 
<html lang="en-US">
    <head>
        <title>Revisiting Ajanta Project</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url(); ?>assets/css/loginstyle.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url(); ?>assets/css/global.css" rel="stylesheet" type="text/css">

    </head>

    <body id="page-top" class="index">
        <!-- Header -->
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="<?php echo base_url(); ?>assets/img/admin/profile.png" alt="Ajanta Logo Image">
                        <div class="intro-text">
                            <br/><br/>
                            <span class="name">Revisiting Ajanta</span>
                            <div class="container login">
                                <?php
                                $attributes = array('class' => 'form-signin');
                                echo form_open('home/validate_credentials', $attributes);
                                echo '<h2 class="form-signin-heading">Enter Your Credentials</h2>';
                                echo form_input('user_name', '', 'placeholder="Enter Your Username"');
                                echo "\t\t\t\t\t\t";
                                echo form_password('password', '', 'placeholder="Enter Your Password"');
                                echo "\t\t\t\t\t\t";
                                echo form_submit('submit', 'Login', 'class="btn btn-primary btn-large"');
                                echo "\t\t\t";
                                echo anchor('home/signup', '<b><h4>Are you New User, then Signup!</h4></b>');
                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>
</html>