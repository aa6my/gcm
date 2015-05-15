<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_client_menu');?>
	</ul>
</div>

<div class="content last">
	<h3><?php echo $this->lang->line('client_addPageName');?></h3>
	<?php $this->load->view('common/data_message');?>

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
				
									<p><?php echo $this->lang->line('contract_contractNewIntro'); ?></p>
                                     <hr/>
                                     <div id="cloneParent">
                                      <div class="cloneContent">
										<div class="row">                                        
                                            <div class="col-md-6">                                       
                                                <div class="form-group">
                                                    <label for="newContractSel"><?php echo $this->lang->line('client_contractNameField'); ?></label>
                                                    <select class="form-control newContractSel" name="newContractSel[]" id="newContractSel" data-myUrl="<?php echo base_url();?>clients/ajax_populate_dropdown">
                                                        <option value=""><?php echo $this->lang->line('global_selectOption'); ?></option>
                                                        <?php foreach($contracts as $key => $row) { ?>
                                                        <option value="<?php echo $row['contractId'];?>"><?php echo $row['contractName']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="newcontractstartdate"><?php echo $this->lang->line('global_dateStartText'); ?></label>
                                                    <input type="text" class="form-control" placeholder="YYYY-MM-dd" name="newcontractstartdate[]" id="newcontractstartdate" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row myDestination">
                                            <div class="col-md-6" >
                                                <label for="saletaff"><?php echo $this->lang->line('global_salestaffText'); ?></label>
                                                <select class="form-control" name="saletaff[]" id="saletaff" disabled="disabled">
                                                    <option value=""><?php echo $this->lang->line('global_selectOption'); ?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="svcstaff"><?php echo $this->lang->line('global_servicestaffText'); ?></label>
                                                <select class="form-control" name="svcstaff[]" id="svcstaff" disabled="disabled">
                                                    <option value=""><?php echo $this->lang->line('global_selectOption'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    <hr/>
                                    </div>
                                    </div>
                                    
        <button type="button" name="clone" class="btn btn-warning btn-icon mt20" id="cloneButton"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('global_cloneBtn');?></button>

<br/>
<br/>

                                    <h3><?php echo $this->lang->line('client_addPageNamePayment');?></h3>
                
                                    <p><?php echo $this->lang->line('client_paymentIntro'); ?></p>
                                     <hr/>                                     
                                      <div class="myContent">
                                        <div class="row">                                        
                                            <div class="col-md-6">                                       
                                                <div class="form-group">
                                                    <label for="newContractSel">Payment Method</label>
                                                    <select class="form-control" name="payment_method_id[]">
                                                        <option value="">Please Choose</option>
                                                        <?php foreach($payments as $key => $row) { ?>
                                                        <option value="<?php echo $row['payment_method_id'];?>"><?php echo $row['payment_method_type']; ?></option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="newcontractstartdate">Payment Date</label>
                                                    <input type="text" class="form-control" placeholder="YYYY-MM-dd" name="contract_payment_date[]" id="contract_payment_date" value="" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2" >
                                                <label for="saletaff">Amount</label>
                                                <input type="text" class="form-control" name="contract_payment_amount[]" id="contract_payment_amount" value="" />
                                                
                                            </div>
                                            <div class="col-md-5">
                                                <label for="svcstaff">Payment Term</label>
                                                <select class="form-control" name="contract_payment_term[]" id="contract_payment_term">
                                                    <option value="">Please Select</option>
                                                    <option value="monthly">Monthly</option>
                                                    <option value="quarter">Quarter</option>
                                                    <option value="yearly">Yearly</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5">
                                                <label for="saletaff">Amount</label>
                                                <input type="text" class="form-control" name="contract_payment_name[]" id="contract_payment_name" value="" placeholder="Payment Name"/>
                                            </div>
                                        </div>
                                    <hr/>
                                    <br/>
                                    </div>
                                    
                                    <button type="button" name="clone" class="btn btn-warning btn-icon mt20" id="cloneBtn"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('global_cloneBtn');?></button>






		<button type="input" name="submit" value="addContract" class="btn btn-success btn-icon mt20"><i class="fa fa-check-square-o"></i> <?php echo $this->lang->line('global_saveBtn');?></button>
	</form>
</div>

<?php $this->load->view('admin/footer');?>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/contracts/viewClientv2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.metalClone.min.js"></script>
<script>
$(function(){
    $('.myContent').metalClone(
    {
        position    : 'after',
        btnClone   : '#cloneBtn'
    });
});
</script>