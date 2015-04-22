<li <?php if($this->uri->segment(2)=="list_active_contract"){echo 'class="active"';}?>>
	<a href="<?php echo base_url();?>contracts/list_active_contract"><i class="fa fa-user"></i> <?php echo $this->lang->line('contract_activeClientsTabLink');?></a>
</li>
<li <?php if($this->uri->segment(2)=="list_inactive_contract"){echo 'class="active"';}?>>
	<a href="<?php echo base_url();?>contracts/list_inactive_contract"><i class="fa fa-archive"></i> <?php echo $this->lang->line('contract_inactiveClientsTabLink');?></a></li>
<li class="pull-right <?php if($this->uri->segment(2)=="add_contract"){echo 'active';}?>">
	<a href="<?php echo base_url();?>contracts/add_contract"><i class="fa fa-plus"></i> <?php echo $this->lang->line('contract_newClientTabLink');?></a>
</li>

 