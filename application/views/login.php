
<?php
$appsProfile = $this->SettingsModel->get_profile();
 ?>
<!-- - var menuBorder = true--><!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <link rel="manifest" href="<?php echo base_url('/manifest.json');?>">
    <title>Login - <?php echo $appsProfile->apps_name;?></title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url().$appsProfile->apps_icon;?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/vendors/css/forms/icheck/custom.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/backend/app-assets/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
    <!-- END: Custom CSS-->
    <script type="text/javascript">
    if('serviceWorker' in navigator) {
  navigator.serviceWorker
           .register('<?php echo base_url();?>/service-worker.js')
           .then(function() {
               console.log("Service Worker Registered");
           });
}
  </script>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column   blank-page blank-page" data-open="click" data-menu="vertical-menu" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-8 col-10 col-sm-3 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                    <div class="card-title text-center">
                        <div class="p-1"><img class="img-fluid mx-auto rounded-circle" src="<?php echo base_url().$appsProfile->logo;?>" alt="logo" style="height:150px;width:150px;"></div>
                        <h6 class="card-subtitle text-muted text-center d-none d-sm-block font-small-3 pt-2"><span><?php echo $appsProfile->agency;?></span></h6>
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center d-none d-sm-block font-small-3 pt-2"><span><?php echo $appsProfile->apps_version;?></span></h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                      <?php echo $this->session->flashdata('notif'); ?>
                        <form class="form-horizontal form-simple" action="<?php echo base_url('auth/login/do_login/');?>" novalidate method="post">
                            <fieldset class="form-group position-relative has-icon-left mb-0">
                                <input type="text" name="username" class="form-control form-control-lg" id="user-name" placeholder="Username" onkeyup="test()" required>
                                <div class="form-control-position">
                                    <i class="ft-user"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" name="password" class="form-control form-control-lg" id="user-password" placeholder="Password" required>
                                <div class="form-control-position">
                                    <i class="fa fa-key"></i>
                                </div>
                            </fieldset>
                            <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="ft-unlock"></i> Masuk </button>
                        </form>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="">
                        <p class="float-sm-left text-center m-0 d-none d-sm-block"><?php echo $appsProfile->footer;?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo base_url();?>assets/backend/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo base_url();?>assets/backend/app-assets/vendors/js/forms/icheck/icheck.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo base_url();?>assets/backend/app-assets/js/core/app-menu.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/app-assets/js/core/app.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo base_url();?>assets/backend/app-assets/js/scripts/forms/form-login-register.min.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->
</html>
