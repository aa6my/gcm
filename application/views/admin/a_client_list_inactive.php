<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_client_menu');?>
	</ul>
</div>

<div class="content last">
	<h3><?php echo $this->lang->line('client_namePageActiveClient'); ?></h3>
	<?php $this->load->view('common/data_message');?>

	<?php
    if(empty($clients)){?>
        <div class="alertMsg default no-margin">
            <i class="fa fa-minus-square-o"></i> <?php echo $this->lang->line('client_noInActiveClients'); ?>
        </div>
    <?php 
    }else{?>

	<table class="rwd-table no-margin" UItable id="UItable">
			<thead>
                            <tr class="primary">
                                    <th><?php echo $this->lang->line('client_clientText'); ?></th>
                                    <th><?php echo $this->lang->line('client_emailText'); ?></th>
                                    <th><?php echo $this->lang->line('client_phoneText'); ?></th>
                                    <th><?php echo $this->lang->line('client_memberText'); ?></th>
                                    <th><?php echo $this->lang->line('global_lastLoginText'); ?></th>
                                    <th><?php echo $this->lang->line('global_archivedText'); ?></th>
                                    <th></th>
                            </tr>
			</thead>
			<tbody>
				<?php
					foreach ($clients as $key => $row) {
					 
				?>
                                    <tr>
                                            <td data-th="<?php echo $this->lang->line('client_clientText'); ?>">
                                                    <a href="<?php echo base_url();?>clients/view_client/<?php echo $row['clientId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $this->lang->line('client_pageNameviewClient'); ?>">
                                                            <?php echo $row['clientFirstName'].' '.$row['clientLastName']; ?>
                                                    </a>
                                            </td>
                                            <td><?php echo $row['clientEmail'];?></td>
                                            <td>
                                            	<?php echo $row['clientPhone'];?>
                                            </td>
                                            <td>
                                            	<?php echo $row['clientMembershipNo'];?>
                                            </td>
                                            <td>
                                            	<?php echo @$row['clientLastVisited'];?>
                                            </td>
                                            <td>
                                            	<?php if ($row['isArchived'] == '0') { $isArchived = 'No'; } else { $isArchived = '<strong class="text-danger">Yes</strong>'; }
                                            	echo $isArchived;
                                            	?>
                                            </td>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContractactionsText'); ?>">
                                                    <a href="<?php echo base_url();?>clients/view_client/<?php echo $row['clientId']; ?>">
                                                            <i class="fa fa-edit text-info" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line('global_viewBtn'); ?>"></i>
                                                    </a>
                                                    <a href="<?php echo base_url();?>clients/delete_client/<?php echo $row['clientId']; ?>" onclick="return confirm('<?php echo $this->lang->line("global_alertDelete")?>')">
                                                            <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line('global_deleteBtn'); ?>"></i>
                                                    </a>
                                            </td>
                                    </tr>
				<?php } ?>
			</tbody>
		</table>
		<?php 
    }
    ?>
</div>
<?php $this->load->view('admin/footer');?>