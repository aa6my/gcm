<li <?php if($this->uri->segment(2)=="list_active_client"){echo 'class="active"';}?>>
	<a href="<?php echo base_url();?>clients/list_active_client"><i class="fa fa-user"></i> <?php echo $this->lang->line('client_activeClientsTabLink');?></a>
</li>
<li <?php if($this->uri->segment(2)=="list_inactive_client"){echo 'class="active"';}?>>
	<a href="<?php echo base_url();?>clients/list_inactive_client"><i class="fa fa-archive"></i> <?php echo $this->lang->line('client_inactiveClientsTabLink');?></a></li>
<li class="pull-right <?php if($this->uri->segment(2)=="add_client"){echo 'active';}?>">
	<a href="<?php echo base_url();?>clients/add_client"><i class="fa fa-plus"></i> <?php echo $this->lang->line('client_newClientTabLink');?></a>
</li>