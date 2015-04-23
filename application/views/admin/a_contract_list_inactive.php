<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_contract_menu');?>
	</ul>
</div>

<div class="content last">
	<h3><?php echo $this->lang->line('contract_namePageActiveContract'); ?></h3>
	<?php $this->load->view('common/data_message');?>

	
		<table class="rwd-table no-margin" UItable id="UItable">
			<thead>
                            <tr class="primary">
                                    <th><?php echo $this->lang->line('contract_tableThContractname'); ?></th>
                                    <th><?php echo $this->lang->line('contract_tableThContracttype'); ?></th>
                                    <th><?php echo $this->lang->line('contract_tableThContractauthor'); ?></th>
                                    <th><?php echo $this->lang->line('contract_tableThContractoutlet'); ?></th>
                                    <th></th>
                            </tr>
			</thead>
			<tbody>
				<?php
					foreach ($contracts as $key => $row) {
					 
				?>
                                    <tr>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContractname'); ?>">
                                                    <a href="<?php echo base_url();?>contracts/view_contract/<?php echo $row['contractId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $this->lang->line('contract_tableThpageNameviewContract'); ?>">
                                                            <?php echo $row['contractName']; ?>
                                                    </a>
                                            </td>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContracttype'); ?>"><?php echo $row['codeValue']?></td>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContractauthor'); ?>"><?php echo $row['adminFirstName'].' '.$row['adminLastName']?></td>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContractoutlet'); ?>">
                                            <?php 
                                            $table = "contractsoutlets";
                                            $where = array(
												'contractId' => $row['contractId']
											);
                                            $tableNameToJoin = array(
												'outlets'
											);
											$tableRelation = array(
												'contractsoutlets.outletId = outlets.outletId'
											);
											$outlet = $this->segi_model->get_all_rows($table, $where,$tableNameToJoin, $tableRelation);

											foreach ($outlet as $key => $value) {
												echo $value['outletname']."<br/>";
											}

											?></td>
                                            <td data-th="<?php echo $this->lang->line('contract_tableThContractactionsText'); ?>">
                                                    <a href="<?php echo base_url();?>contracts/view_contract/<?php echo $row['contractId']; ?>">
                                                            <i class="fa fa-edit text-info" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line('global_viewBtn'); ?>"></i>
                                                    </a>
                                                    <a href="<?php echo base_url();?>contracts/view_contract/<?php echo $row['contractId']; ?>" onclick="return confirm('<?php echo $this->lang->line("global_alertDelete")?>')">
                                                            <i class="fa fa-trash-o" data-toggle="tooltip" data-placement="left" title="<?php echo $this->lang->line('global_deleteBtn'); ?>"></i>
                                                    </a>
                                            </td>
                                    </tr>
				<?php } ?>
			</tbody>
		</table>
</div>
<?php $this->load->view('admin/footer');?>