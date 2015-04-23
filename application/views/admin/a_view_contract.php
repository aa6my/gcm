<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_contract_menu');?>
	</ul>
</div>

<div class="content last">
	

	<h3><?php echo $this->lang->line('client_addPageNameContract');?></h3>
	<?php $this->load->view('common/data_message');?>
	<form action="" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="contractName"><?php echo $this->lang->line('client_contractNameField');?></label>
					<input type="text" class="form-control" required="" id="contractName" name="contractName" value="<?php echo $contracts[0]['contractName'];?>" />
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="contractType"><?php echo $this->lang->line('contract_contractStatusField');?></label>
					<select class="form-control " required="" name="isActive" id="isActive">
						<option value="1" <?php if($contracts[0]['isActive']==1) echo "selected";?>><?php echo $this->lang->line('global_active');?></option>
						<option value="0" <?php if($contracts[0]['isActive']==0) echo "selected";?>><?php echo $this->lang->line('global_notActive');?></option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="contractType"><?php echo $this->lang->line('client_selectContractTypeField');?></label>
					<select class="form-control " required="" name="contractType" id="contractType">
					<?php						
						$type = $this->segi_model->get_all_rows("codetable", array('codetypeid'=>'Contract Type'));
					?>

						<option value=""><?php echo $this->lang->line('global_selectOption');?></option>
						<?php foreach ($type as $key => $value) { ?>
							<option value="<?php echo $value['codetableId']; ?>" data-type="<?php echo $value['orderSequence']; ?>" <?php if($contracts[0]['contractType']==$value['codetableId']) echo "selected";?>><?php echo $value['codeValue']; ?></option>
						<?php } ?>
					</select>
					<span class="help-block"><?php echo $this->lang->line('client_selectContractTypeFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="outlet"><?php echo $this->lang->line('client_selectOutletField');?></label>
					<?php 
					$outletDb = $this->segi_model->get_all_rows("contractsoutlets", array('contractId'=>$contracts[0]['contractId']));
					$newArray = array();
					foreach ($outletDb as $key => $value) {
						array_push($newArray, $value['outletId']);
					}
						?>
					<select class="form-control" data-placeholder="Choose an Outlet..." multiple name="outlet[]" id="outlet[]">
					<?php						
						$out = $this->segi_model->get_all_rows("outlets", array('isActive'=>1));
					?>
					
						<?php foreach ($out as $key => $value) { ?>
							<option value="<?php echo $value['outletId']; ?>" <?php echo (in_array($value['outletId'], $newArray)) ? "selected" : "" ?>><?php echo $value['outletname']; ?></option>
						<?php } ?>
					</select>
					<span class="help-block"><?php echo $this->lang->line('client_selectOutletFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="row" id="ptrow">
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptSession"><?php echo $this->lang->line('client_ptSessionNameField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptSession" id="ptSession" placeholder="X session" value="<?php echo $contracts[0]['ptsession'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptSessionFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptCostPerSession"><?php echo $this->lang->line('client_ptCostPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptCostPerSession" id="ptCostPerSession" placeholder="0.00" value="<?php echo $contracts[0]['ptcostpersession'];?>" />					
					<span class="help-block"><?php echo $this->lang->line('client_ptCostPerSessionFieldHelp');?></span>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="gst" name="addgstptcost" id="addgstptcost" value="1" <?php if($contracts[0]['ptgst']==1) echo "checked";?>>
						<?php echo $this->lang->line('client_GSTField');?>
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptSaleCommPerSession"><?php echo $this->lang->line('client_ptSaleCommPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptSaleCommPerSession" id="ptSaleCommPerSession" placeholder="0.0%" value="<?php echo $contracts[0]['ptsalecomm'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptSaleCommPerSessionFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptServiceCommPerSession"><?php echo $this->lang->line('client_ptServiceCommPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptServiceCommPerSession" id="ptServiceCommPerSession" placeholder="0.0%" value="<?php echo $contracts[0]['ptservicecomm'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptServiceCommPerSessionFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="row" id="membershiprow">
			<div class="col-md-3">
				<div class="form-group">
					<label for="msPeriod"><?php echo $this->lang->line('client_msPeriodNameField');?></label>
					<input type="text" class="form-control numeric" placeholder="X months" required="" name="msPeriod" id="msPeriod" value="<?php echo $contracts[0]['membershipPeriod'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_msPeriodFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="msCost"><?php echo $this->lang->line('client_msCostField');?></label>
					<input type="text" class="form-control numeric" required="" name="msCost" placeholder="0.00" id="msCost" value="<?php echo $contracts[0]['membershipcost'];?>" />					
					<span class="help-block"><?php echo $this->lang->line('client_msCostFieldHelp');?></span>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="gst" name="addgstmscost" id="addgstmscost" value="1" <?php if($contracts[0]['msgst']==1) echo "checked";?>>
						<?php echo $this->lang->line('client_GSTField');?>
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="msSaleComm"><?php echo $this->lang->line('client_msSaleCommField');?></label>
					<input type="text" class="form-control numeric" required="" name="msSaleComm" id="msSaleComm" placeholder="0.0%" value="<?php echo $contracts[0]['membershipsalecomm'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_msSaleCommFieldHelp');?></span>
				</div>
                                <div class="row">
                                    <label id="mssaleComm"> </label>
                                    <input type="hidden" id="hddmssaleComm" value="" />
                                </div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="msRenewAlert"><?php echo $this->lang->line('client_msRenewAlertField');?></label>
					<input type="text" class="form-control numeric" required="" name="msRenewAlert" id="msRenewAlert" placeholder="X months"  value="<?php echo $contracts[0]['renewalert'];?>" />
					<span class="help-block"><?php echo $this->lang->line('client_msRenewAlertFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="contractDetails"><?php echo $this->lang->line('client_contractDescField');?></label>
			<textarea class="form-control" name="contractDetails" rows="3"><?php echo $contracts[0]['contractDescription'];?></textarea>
			<span class="help-block"><?php echo $this->lang->line('client_contractDescFieldHelp');?></span>
		</div>
		<div class="form-group">
			<label for="contractNotes"><?php echo $this->lang->line('client_contractNotesField');?></label>
			<textarea class="form-control" name="contractNotes" rows="3"><?php echo $contracts[0]['contractNotes'];?></textarea>
			<span class="help-block"><?php echo $this->lang->line('client_contractNotesFieldHelp');?></span>
		</div>
		<button type="input" name="submit" value="addContract" class="btn btn-success btn-icon mt20"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('global_saveBtn');?></button>
	</form>
</div>

<?php $this->load->view('admin/footer');?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/contracts/newContract.js"></script>
<script>
$(function(){
	$(document).on('change','#contractType', function(){
		var type = $(this)[0][this.selectedIndex].getAttribute('data-type');

		    if(type==1){

		    	$('#ptrow').hide();
		    	$('#membershiprow').show()

		    }
		    else if(type==2){

		    	$('#ptrow').show();
		    	$('#membershiprow').hide()
		    }
		    else{

		    	$('#ptrow').hide();
		    	$('#membershiprow').hide()
		    }
	})

	<?php
	if(isset($contract[0]['contractType']) && !empty($contract[0]['contractType']))
	{?>
			var type = '<?php echo $contract[0]["contractType"];?>';
			$('#ptrow').hide();
		    	$('#membershiprow').show()

		    }
		    else if(type==2){

		    	$('#ptrow').show();
		    	$('#membershiprow').hide()
		    }
		    else{

		    	$('#ptrow').hide();
		    	$('#membershiprow').hide()
		    }
    <?php 
    } ?>
});
</script>