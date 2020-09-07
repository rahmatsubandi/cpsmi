<section id="careers">

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
		<h3 class="h3-normal probootstrap-animate"><?php echo $itemNameBadge . $itemName ?></h3>
	</header>

	<div class="clearfix"></div>

	<div class="probootstrap-text-box-wrapper-block probootstrap-animate">
		<div class="row">
			<div class="col-xs-12 col-sm-6 probootstrap-animate">
				<div class="padding20">
					<div class="company">
						<i class="icon fa fa-building-o" style="width: 20px;"></i>
						<?php echo $data->company_name ?>
					</div>
					<div class="location">
						<i class="icon fa fa-map-o" style="width: 20px;"></i>
						<span style="text-transform: capitalize;"><?php echo strtolower($data->regencies_name) .', '. strtolower($data->province_name) ?></span>
					</div>
					<div class="salary">
						<i class="icon fa fa-money" style="width: 20px;"></i>
						<?php
							$salary = '<span style="color: #888; font-style: italic;">Not shareable</span>';
							if ( (!empty($data->salary1) && !is_null($data->salary1)) && (!empty($data->salary2) && !is_null($data->salary2)) ) {
								$salary = number_format($data->salary1) .' - '. number_format($data->salary2) .' <sup class="text-hint">'.$data->currency_unit.'</sup>';
							};
							echo $salary;
						?>
					</div>
					<div class="information" style="height: 50px; display: flex; align-items: flex-end; justify-content: center;">
						&ldquo;Send your CV to&nbsp;<b><?php echo $data->email ?></b>&rdquo;
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 probootstrap-animate">
				<div class="probootstrap-text-box">
					<table>
						<tr>
							<td valign="top" width="120" class="text-hint"><span>Published</span></td>
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

	<div class="card-body probootstrap-animate">
		<?php echo $data->description ?>
	</div>

	<div class="probootstrap-animate" style="margin-top: 20px; text-align: center;">
		<a href="javascript:;" class="btn btn-primary btn-sm go-back">
			<i class="fa fa-arrow-left"></i>
			Back to Lists
		</a>
	</div>

</section>
