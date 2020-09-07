<!--==========================
	Careers Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="careers">
	<div class="container">

		<header class="section-header">
			<?php
				$today = strtotime(date('Y-m-d'));
				$closingDate = strtotime($data->closing_date);

				if ($closingDate > $today) {
					$itemName = $data->name;
					$itemNameBadge = '';
				} else {
					$itemName = '<s>'.$data->name.'</s>';
					$itemNameBadge = '<span class="badge badge-danger">Closed</span> ';
				};
			?>
			<h3 class="title-detail"><?php echo $itemNameBadge . $itemName ?></h3>
		</header>

		<div class="clearfix"></div>

		<div class="card item">
			<div class="card-body">
				<div class="row">
					<div class="col-xs-10 col-sm-6">
						<div class="company-detail"><?php echo $data->company_name ?></div>
						<div class="location">
							<i class="icon fa fa-map-marker"></i>
							<?php echo $data->regencies_name .', '. $data->province_name ?>
						</div>
						<div class="salary">
							<i class="icon fa fa-dollar"></i>
							<?php
								$salary = '<span style="color: #888; font-style: italic;">Not shareable</span>';
								if ( (!empty($data->salary1) && !is_null($data->salary1)) && (!empty($data->salary2) && !is_null($data->salary2)) ) {
									$salary = number_format($data->salary1) .' - '. number_format($data->salary2) .' <sup class="text-hint">'.$data->currency_unit.'</sup>';
								};
								echo $salary;
							?>
						</div>
						<div class="information">
							Send your CV to <b><?php echo $data->email ?></b>
						</div>
					</div>
					<div class="col-xs-10 col-sm-6 right">
						<table>
							<tr>
								<td valign="top" width="100" class="text-hint">Published</td>
								<td valign="top"><?php echo date('d M Y', strtotime($data->published)) ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Closing Date</td>
								<td valign="top"><?php echo date('d M Y', strtotime($data->closing_date)) ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Age</td>
								<td valign="top"><?php echo $data->age1 .' - '.$data->age2 ?> year</td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Education</td>
								<td valign="top"><?php echo $data->education ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Type Of Work</td>
								<td valign="top"><?php echo $data->type_work ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="card item">
			<div class="card-body">
				<?php echo $data->description ?>
			</div>
		</div>

		<div style="margin-top: 20px; text-align: center;">
			<a href="javascript:;" class="btn btn-info btn-sm go-back">
				<i class="fa fa-arrow-left"></i>
				Back to List
			</a>
		</div>

	</div>
</section><!-- #careers -->
