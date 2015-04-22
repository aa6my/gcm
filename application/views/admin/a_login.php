<!DOCTYPE html>
	<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><?php //echo $set['siteName']; ?> &middot; <?php // echo $signInBtn; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,700'>
		<link rel="stylesheet" type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,300italic,400italic,600italic'>

		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/custom.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/clientresponse.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/font-awesome.css">

		<!--[if lt IE 9]>
			<script src="../js/html5shiv.js"></script>
			<script src="../js/respond.js"></script>
		<![endif]-->
    </head>

	<body>
		<div id="wrap">
			<div class="container">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="loginCont">
							<p class="logo"><img alt="clientResponse" src="<?php echo base_url();?>assets/images/login_logo.png" /></p>
							<div class='login text-center'>
								<h2><?php echo $this->lang->line('login_loginTitle'); ?></h2>
								<?php $this->load->view('common/data_message');?>
								<form action="" method="post">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" class="form-control" required="" placeholder="<?php echo $this->lang->line('global_emailAddressField'); ?>" name="adminEmail" />
									</div>
									<br>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" required="" placeholder="<?php echo $this->lang->line('global_passwordField'); ?>" name="password" />
									</div>
									<small class="pull-right"><a data-toggle="modal" href="#resetPassword"><i class="fa fa-unlock"></i> <?php echo $this->lang->line('login_resetPasswordBtn'); ?></a></small>
									<button type="input" name="submit" value="signIn" class="btn btn-primary btn-icon"><i class="fa fa-sign-in"></i> <?php echo $this->lang->line('login_signInBtn'); ?></button>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>

			<div class="modal fade" id="resetPassword" tabindex="-1" role="dialog" aria-labelledby="resetPassword" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
							<h4 class="modal-title"><?php echo $this->lang->line('login_resetPasswordBtn'); ?></h4>
						</div>
						<?php //if ($isReset == '') { ?>
							<form action="" method="post">
								<div class="modal-body">
									<div class="form-group">
										<label for="theEmail"><?php echo $this->lang->line('global_emailAddressField'); ?></label>
										<input type="email" class="form-control" required="" name="theEmail" id="theEmail" value="" />
										<span class="help-block"><?php echo $this->lang->line('global_emailAddressHelp'); ?></span>
									</div>
								</div>
								<div class="modal-footer">
									<button type="input" name="submit" value="resetPass" class="btn btn-success btn-icon"><i class="fa fa-unlock"></i> <?php echo $this->lang->line('login_resetPasswordBtn'); ?></button>
									<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle-o"></i> <?php echo $this->lang->line('global_cancelBtn'); ?></button>
								</div>
							</form>
						<?php //} else { ?>
							<div class="modal-body">
								<p class="lead"><?php //echo $this->lang->line('login_passwordResetTitle'); ?></p>
								<p><?php //echo $this->lang->line('login_passwordResetQuip'); ?></p>
							</div>
						<?php //} ?>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/slimscroll.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/js/custom.js"></script>

	</body>
	</html>
<?php //} ?>