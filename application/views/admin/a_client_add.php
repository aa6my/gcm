<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_client_menu');?>
	</ul>
</div>

<div class="content last">
	<h3><?php echo $this->lang->line('client_addPageName');?></h3>
	<!-- mesej box sini -->

	<form action="" method="post">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="setActive"><?php echo $this->lang->line('client_setAccountActiveField');?></label>
					<select class="form-control" name="setActive">
						<option value="0" selected><?php echo $this->lang->line('global_noBtn');?></option>
						<option value="1"><?php echo $this->lang->line('global_yesBtn');?></option>
					</select>
					<span class="help-block"><?php echo $this->lang->line('client_setAccountActiveHelp');?></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="clientFirstName"><?php echo $this->lang->line('login_newAccountFirstName');?></label>
					<input type="text" class="form-control" required="" name="clientFirstName" value="<?php echo isset($_POST['clientFirstName']) ? $_POST['clientFirstName'] : ''; ?>" />
				</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
					<label for="clientLastName"><?php echo $this->lang->line('login_newAccountLastName');?></label>
					<input type="text" class="form-control" required="" name="clientLastName" value="<?php echo isset($_POST['clientLastName']) ? $_POST['clientLastName'] : ''; ?>" />
				</div>
			</div>
		</div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nric"><?php echo $this->lang->line('client_nricField');?></label>
                            <input type="text" class="form-control" required="" name="clientNRIC" id="clientNRIC" value="<?php echo isset($_POST['clientNRIC']) ? $_POST['clientNRIC'] : ''; ?>" />
                            <span class="help-block">
                            <?php echo $this->lang->line('client_nricHelp'); ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="membership"><?php echo $this->lang->line('client_membershipField');?></label>
                            <input type="text" class="form-control" required="" name="clientMembershipNo" id="clientMembershipNo" value="<?php echo isset($_POST['clientMembershipNo']) ? $_POST['clientMembershipNo'] : ''; ?>" />
                            <span class="help-block">
                                <?php echo $this->lang->line('client_membershipHelp');?>
                            </span>
                        </div>
                    </div>
                </div>    
		<!-- <button type="input" name="submit" value="addClient" class="btn btn-success btn-icon mt20"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('client_addNewClientBtn');?></button> -->
	

	<h3><?php echo $this->lang->line('client_addPageNameContract');?></h3>
	
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="contractName"><?php echo $this->lang->line('client_contractNameField');?></label>
					<input type="text" class="form-control" required="" id="contractName" name="contractName" value="" />
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
							<option value="<?php echo $value['codetableId']; ?>" data-type="<?php echo $value['orderSequence']; ?>"><?php echo $value['codeValue']; ?></option>
						<?php } ?>
					</select>
					<span class="help-block"><?php echo $this->lang->line('client_selectContractTypeFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="outlet"><?php echo $this->lang->line('client_selectOutletField');?></label>
					<select class="form-control" data-placeholder="Choose an Outlet..." multiple name="outlet[]" id="outlet[]">
					<?php
						/*
						$sqlStmt = "SELECT outletId, outletname FROM outlets WHERE isActive = 1";
						echo $sqlSmt;
						$results = mysqli_query($mysqli, $sqlStmt) or die('-2'.mysqli_error());*/
					?>
						<?php //while ($row = mysqli_fetch_assoc($results)) { ?>
							<option value="<?php //echo $row['outletId']; ?>"><?php //echo clean($row['outletname']); ?></option>
						<?php //} ?>
					</select>
					<span class="help-block"><?php echo $this->lang->line('client_selectOutletFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="row" id="ptrow" style="display:none">
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptSession"><?php echo $this->lang->line('client_ptSessionNameField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptSession" id="ptSession" placeholder="X session" value="<?php //echo isset($_POST['ptSession']) ? $_POST['ptSession'] : ''; ?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptSessionFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptCostPerSession"><?php echo $this->lang->line('client_ptCostPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptCostPerSession" id="ptCostPerSession" placeholder="0.00" value="<?php //echo isset($_POST['ptCostPerSession']) ? $_POST['ptCostPerSession'] : ''; ?>" />					
					<span class="help-block"><?php echo $this->lang->line('client_ptCostPerSessionFieldHelp');?></span>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="gst" name="addgstptcost" id="addgstptcost" value="">
						<?php echo $this->lang->line('client_GSTField');?>
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptSaleCommPerSession"><?php echo $this->lang->line('client_ptSaleCommPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptSaleCommPerSession" id="ptSaleCommPerSession" placeholder="0.0%" value="<?php //echo isset($_POST['ptSaleCommPerSession']) ? $_POST['ptSaleCommPerSession'] : ''; ?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptSaleCommPerSessionFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="ptServiceCommPerSession"><?php echo $this->lang->line('client_ptServiceCommPerSessionField');?></label>
					<input type="text" class="form-control numeric" required="" name="ptServiceCommPerSession" id="ptServiceCommPerSession" placeholder="0.0%" value="<?php //echo isset($_POST['ptServiceCommPerSession']) ? $_POST['ptServiceCommPerSession'] : ''; ?>" />
					<span class="help-block"><?php echo $this->lang->line('client_ptServiceCommPerSessionFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="row" id="membershiprow" style="display:none">
			<div class="col-md-3">
				<div class="form-group">
					<label for="msPeriod"><?php echo $this->lang->line('client_msPeriodNameField');?></label>
					<input type="text" class="form-control numeric" placeholder="X months" required="" name="msPeriod" id="msPeriod" value="<?php //echo isset($_POST['msPeriod']) ? $_POST['msPeriod'] : ''; ?>" />
					<span class="help-block"><?php echo $this->lang->line('client_msPeriodFieldHelp');?></span>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="msCost"><?php echo $this->lang->line('client_msCostField');?></label>
					<input type="text" class="form-control numeric" required="" name="msCost" placeholder="0.00" id="msCost" value="<?php //echo isset($_POST['msCost']) ? $_POST['msCost'] : ''; ?>" />					
					<span class="help-block"><?php echo $this->lang->line('client_msCostFieldHelp');?></span>
				</div>
				<div class="checkbox">
					<label>
						<input type="checkbox" class="gst" name="addgstmscost" id="addgstmscost" value="1">
						<?php echo $this->lang->line('client_GSTField');?>
					</label>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">
					<label for="msSaleComm"><?php echo $this->lang->line('client_msSaleCommField');?></label>
					<input type="text" class="form-control numeric" required="" name="msSaleComm" id="msSaleComm" placeholder="0.0%" value="<?php //echo isset($_POST['msSaleComm']) ? $_POST['msSaleComm'] : ''; ?>" />
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
					<input type="text" class="form-control numeric" required="" name="msRenewAlert" id="msRenewAlert" placeholder="X months"  value="<?php //echo isset($_POST['msRenewAlert']) ? $_POST['msRenewAlert'] : ''; ?>" />
					<span class="help-block"><?php echo $this->lang->line('client_msRenewAlertFieldHelp');?></span>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="contractDetails"><?php echo $this->lang->line('client_contractDescField');?></label>
			<textarea class="form-control" name="contractDetails" rows="3"><?php //echo isset($_POST['contractDeatils']) ? $_POST['contractDeatils'] : ''; ?></textarea>
			<span class="help-block"><?php echo $this->lang->line('client_contractDescFieldHelp');?></span>
		</div>
		<div class="form-group">
			<label for="contractNotes"><?php echo $this->lang->line('client_contractNotesField');?></label>
			<textarea class="form-control" name="contractNotes" rows="3"><?php //echo isset($_POST['contractNotes']) ? $_POST['contractNotes'] : ''; ?></textarea>
			<span class="help-block"><?php echo $this->lang->line('client_contractNotesFieldHelp');?></span>
		</div>
		<button type="input" name="submit" value="addContract" class="btn btn-success btn-icon mt20"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('global_saveBtn');?></button>
	</form>
</div>

<?php $this->load->view('admin/footer');?>
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
});
</script>