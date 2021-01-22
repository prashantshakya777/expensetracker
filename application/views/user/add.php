<!DOCTYPE html>

<html>

    <head>

      <meta charset="utf-8">

      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <title>Register</title>

      <!-- Bootstrap 3.3.7 -->

         <!-- Tell the browser to be responsive to screen width -->

            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

            <!-- Bootstrap 3.3.6 -->

            <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">

            <!-- Font Awesome -->

            <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">

            <!-- Ionicons -->

            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

            <!-- Datetimepicker -->

            <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">

            <!-- Theme style -->

            <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">

            <!-- AdminLTE Skins. Choose a skin from the css/skins

                 folder instead of downloading all of them to reduce the load. -->

            <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">

    </head>

    <body class="login-page" style="background:#cbcbcb">

        <?php echo $this->session->userdata('UserType')?>

        <div class="login-box selector"> 

            <div class="col-sm-12 nloginbox">
               

              <div class="login-box-body col-md-12">  

            <p class="text-center info mt-10" style="font-size: 16px;color: #000000; font-weight:600;">Register </p>

                



                <?php if(isset($errors))

                        {

                            echo '<p style="color: #FF1616" align="center">'.$errors.'</p>';

                        }

                ?>

                <?php echo form_open_multipart('user/add'); ?>
                    <div class="form-group has-feedback mt-50">

                    <label>Full Name</label>

                   <input type="text" name="FullName" value="<?php echo $this->input->post('FullName'); ?>" class="form-control" id="FullName" required="required" placeholder="FullName"/>

                   
                  </div>
                  <div class="form-group has-feedback mt-50">

                    <label>Email</label>

                   <input type="text" name="Email" value="<?php echo $this->input->post('Email'); ?>" class="form-control" id="Email" placeholder="Email"/>

                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                  </div>



                  <div class="form-group has-feedback">

                    <label>Password</label>

                      <input type="password" name="Password" value="<?php echo $this->input->post('Password'); ?>" class="form-control" id="Password" required="required" placeholder="Password"/>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                  </div>



                    <div class="box-footer">

                     <button type="submit" class="btn btn-success">
                        Register
                    </button>
                    <a href="<?php echo base_url()?>Login/login" class="btn btn-primary">Login</a><br/>
                    <?php echo form_close(); ?>

                     </div>

                </form>        

              </div><!-- /.login-box-body -->

            </div><!-- /.login-box -->

        </div>

            <!-- /.login-box -->

    <!-- jQuery 3.3.1 -->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

    <!-- Bootstrap 3.3.2 JS -->

    <script src="<?php echo base_url()?>resources/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- iCheck -->

    <script src="<?php echo base_url()?>resources/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script>

      $(function () {

        $('input').iCheck({

          checkboxClass: 'icheckbox_square-blue',

          radioClass: 'iradio_square-blue',

          increaseArea: '20%' // optional

        });

      });

    </script>

        

        

    </body>

</html>

