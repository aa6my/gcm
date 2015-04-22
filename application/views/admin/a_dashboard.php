<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="container"><div class="content">
	
			<p>Welcome to your ff Manager's Dashboard.
You can view Client's profiles, projects &amp; information, create folders and upload files, discus and more.</p>
	</div>

<div class="contentAlt">
	<div class="row">
                <div class="col-lg-3">
                        <div class="small-box bg-white">
                                <div class="inner" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
                                        <h3 class="text-orange">0</h3>
                                        <p>Total Hours Worked this Week</p>
                                </div>
                                <div class="icon icon-sm"><i class="fa fa-clock-o"></i></div>
                                <div class="small-box-footer">&nbsp;</div>
                        </div>
                </div>
		<div class="col-lg-3">
			<div class="small-box bg-white">
				<div class="inner">
					<h3 class="text-orange">0</h3>
					<p>Unread Messages in Your Inbox</p>
				</div>
				<div class="icon icon-sm"><i class="fa fa-envelope-o"></i></div>
				<div class="small-box-footer">&nbsp;</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="small-box bg-white">
				<div class="inner">
					<h3 class="text-orange">0</h3>
					<p></p>
				</div>
				<div class="icon"><i class="fa fa-tasks"></i></div>
				<div class="small-box-footer">&nbsp;</div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="small-box bg-white">
				<div class="inner" data-toggle="tooltip" data-placement="top" title="" data-original-title="">
					<h3 class="text-orange">0</h3>
					<p>Total Open Projects</p>
				</div>
				<div class="icon"><i class="fa fa-folder-open-o"></i></div>
				<div class="small-box-footer">&nbsp;</div>
			</div>
		</div>
	</div>
</div>

<div class="clearfix mt20"></div>		</div>
<?php $this->load->view('admin/footer');?>