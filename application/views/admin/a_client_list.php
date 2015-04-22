<?php $this->load->view('admin/header');?>
<?php $this->load->view('admin/navigation');?>
<div class="contentAlt">
	<ul class="nav nav-tabs">
		<?php $this->load->view('admin/a_client_menu');?>
	</ul>
</div>

<div class="content last">
	<h3><?php echo $pageName; ?></h3>
	<?php if ($msgBox) { echo $msgBox; } ?>

	<?php if(mysqli_num_rows($res) < 1) { ?>
		<div class="alertMsg default no-margin">
			<i class="fa fa-minus-square-o"></i> <?php echo $noActiveClients; ?>
		</div>
	<?php } else { ?>
		<table class="rwd-table no-margin">
			<tbody>
				<tr class="primary">
					<th><?php echo $clientText; ?></th>
					<th><?php echo $companyText; ?></th>
					<th><?php echo $emailText; ?></th>
					<th><?php echo $phoneText; ?></th>
					<th><?php echo $projectsNavLink; ?></th>
					<th><?php echo $lastLoginText; ?></th>
					<th><?php echo $archivedText; ?>?</th>
					<th></th>
				</tr>
				<?php
					while ($row = mysqli_fetch_assoc($res)) {
						// Decrypt data
						if ($row['clientPhone'] != '') { $clientPhone = decryptIt($row['clientPhone']); } else { $clientPhone = '';  }

						// Get Total Project Count
						$projcountsql = "SELECT 'X' FROM clientprojects WHERE clientId = ".$row['clientId']." AND archiveProj = 0";
						$projcounttotal = mysqli_query($mysqli, $projcountsql) or die('-2'.mysqli_error());
						$projcount = mysqli_num_rows($projcounttotal);

						if ($row['isArchived'] == '0') { $isArchived = 'No'; } else { $isArchived = '<strong class="text-danger">Yes</strong>'; }
				?>
						<tr>
							<td data-th="<?php echo $clientText; ?>">
								<a href="index.php?action=viewClient&clientId=<?php echo $row['clientId']; ?>" data-toggle="tooltip" data-placement="right" title="<?php echo $pageNameviewClient; ?>">
									<?php echo clean($row['theClient']); ?>
								</a>
							</td>
							<td data-th="<?php echo $companyText; ?>"><?php echo clean($row['clientCompany']); ?></td>
							<td data-th="<?php echo $emailText; ?>"><?php echo clean($row['clientEmail']); ?></td>
							<td data-th="<?php echo $phoneText; ?>"><?php echo $clientPhone; ?></td>
							<td data-th="<?php echo $projectsNavLink; ?>"><?php echo $projcount; ?></td>
							<td data-th="<?php echo $lastLoginText; ?>"><?php echo $row['lastVisited']; ?></td>
							<td data-th="<?php echo $archivedText; ?>?"><?php echo $isArchived; ?></td>
							<td data-th="<?php echo $actionsText; ?>">
								<a href="index.php?action=viewClient&clientId=<?php echo $row['clientId']; ?>">
									<i class="fa fa-edit text-info" data-toggle="tooltip" data-placement="left" title="<?php echo $pageNameviewClient; ?>"></i>
								</a>
							</td>
						</tr>
				<?php } ?>
			</tbody>
		</table>
	<?php
		if ($total > $pagPages) {
			echo $pages->page_links();
		}
	}
	?>
</div>
<?php $this->load->view('admin/footer');?>