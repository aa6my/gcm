
<body>
	<div id="wrap">
<?php 
$table = "admins";
$where = array('adminId' => $this->session->userdata('adminId'));
$dataAdmin = $this->segi_model->get_specified_row($table, $where);
//print_r($dataAdmin);
?>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only"><?php //echo $toggleNav; ?></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
                                            <li><a href="index.php"><?php echo $this->lang->line('nav_dashboardNavLink');?></a></li>
                                            <li><a href="index.php?action=myCalendar"><?php echo $this->lang->line('nav_calendarNavLink');?></a></li>
                                            <li class="dropdown" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line('nav_clockClientsNavLink');?>">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i></a>
                                                <div class="dropdown-menu dropdown-form">
                                                        <form action="" method="post">
                                                                <div class="input-group custom-search-form">
                                                                        <input type="text" class="form-control numeric" required="" name="clientMemberNo" placeholder="<?php //echo $membershipField; ?>">
                                                                        <span class="input-group-btn">
                                                                                <button type="input" name="submit" value="search" class="btn btn-search"><span class="fa fa-clock-o"></span></button>
                                                                        </span>
                                                                </div>
                                                        </form>
                                                </div>
                                                
                                            </li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
                                            
                                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('nav_clientsNavLink');?></a>
                                                    <ul class="dropdown-menu">
                                                        
                                                        <li><a href="<?php echo base_url();?>clients/list_client"><?php echo $this->lang->line('nav_activeClientsNavLink');?></a></li>
                                                       
                                                        <li><a href="index.php?action=emailClients"><?php echo $this->lang->line('nav_emailClientsNavLink');?></a></li>
                                                       
                                                    </ul>
                                            </li>
                                           
                                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->lang->line('nav_contractsNavLink');?></a>
                                                    <ul class="dropdown-menu">
                                                            
                                                            <li><a href="<?php echo base_url();?>contracts/list_active_contract"><?php echo $this->lang->line('nav_openContNavLink');?></a></li>
                                                            
                                                    </ul>
                                            </li>
                                            <?php //} 
                                            //if ($isAdmin == '1' || strpos($menuShown,"C") === true) { ?>
                                                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php //echo $staffsNavLink; ?></a>
                                                    <ul class="dropdown-menu">
                                                            <?php //if ($isAdmin == '1' || strpos($menuShown,"CA") === true) { ?>
                                                            <li><a href="index.php?action=activeStaff"><?php //echo $activeStaffsNavLink; ?></a></li>
                                                            <?php //} if ($isAdmin == '1' || strpos($menuShown,"CB") === true) { ?>
                                                            <li><a href="index.php?action=templatesDownload"><?php //echo $TemplatesDownloadNavLink; ?></a></li>
                                                            <?php// } if ($isAdmin == '1' || strpos($menuShown,"CC") === true) { ?>
                                                            <li><a href="index.php?action=reports"><?php //echo $reportsNavLink; ?></a></li>
                                                            <?php //}?>
                                                    </ul>
                                                </li>
                                            <?php //} 
                                            //if ($isAdmin == '1') { ?>        
                                            <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php //echo $adminNavLink; ?></a>
                                                    <ul class="dropdown-menu">
                                                            <li><a href="index.php?action=roleManagement"><?php// echo $roleManagementNavLink; ?></a></li>
                                                            <li><a href="index.php?action=outletManagement"><?php //echo $outletManagementNavLink; ?></a></li>
                                                            <li><a href="index.php?action=templates"><?php// echo $tempaltesNavLink; ?></a></li>
                                                            <li><a href="index.php?action=siteAlerts"><?php //echo $siteAlertsNavLink; ?></a></li>
                                                            <li><a href="index.php?action=siteSettings"><?php //echo $siteSettingsNavLink; ?></a></li>
                                                    </ul>
                                            </li>
                                            <?php //} ?>
                                            
                                            <li class="dropdown user-menu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                        <span><?php echo $this->session->userdata('adminFirstName').' '.$this->session->userdata('adminLastName'); ?> <i class="fa fa-angle-down"></i></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li class="user-header">
                                                        <img src="<?php echo base_url(); ?>assets/avatars/<?php echo $dataAdmin['adminAvatar']; ?>" alt="Avatar" />
                                                        <p>
                                                                <?php echo $this->session->userdata('adminFirstName').' '.$this->session->userdata('adminLastName'); ?>
                                                                <small><?php echo $dataAdmin['adminRole']; ?></small>
                                                                <small><?php echo $this->lang->line('nav_memberSinceText');?> <?php echo $dataAdmin['createDate']; ?></small>
                                                        </p>
                                                    </li>
                                                    <li class="user-footer">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                    <a href="index.php?action=myProfile" class="btn btn-default btn-sm"><?php echo $this->lang->line('nav_myProfileNavLink');?></a>
                                                            </div>
                                                            <div class="col-md-4">
                                                                    
                                                            </div>
                                                            <div class="col-md-4">
                                                                    <a data-toggle="modal" href="#signOut" class="btn btn-default btn-sm"><?php echo $this->lang->line('nav_signOutNavLink');?> </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
					</ul>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="signOut" tabindex="-1" role="dialog" aria-labelledby="signOutLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-body">
						<p class="lead"><?php echo $this->session->userdata('adminFirstName').' '.$this->session->userdata('adminLastName').', '.$this->lang->line('nav_signOutConf'); ?></p>
					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url();?>auth/logout" class="btn btn-success btn-icon-alt"><?php echo $this->lang->line('nav_signOutNavLink');?><i class="fa fa-sign-out"></i></a>
						<button type="button" class="btn btn-default btn-icon" data-dismiss="modal"><i class="fa fa-times-circle"></i> <?php echo $this->lang->line('global_cancelBtn');?></button>
					</div>
				</div>
			</div>
		</div>
		
		<div class="userbar">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="index.php"><img alt="clientResponse" class="logo" src="<?php echo base_url();?>assets/images/logo.png" /></a>
					</div>
					<div class="col-md-6">
						<p>
							<?php echo date('l').' the '.date('jS \of F, Y'); ?><br />
							<span class="clock">0:00:00 AM</span>
						</p>
					</div>
				</div>
			</div>
		</div>

		<div class="container">