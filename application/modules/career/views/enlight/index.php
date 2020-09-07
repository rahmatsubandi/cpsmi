<section id="careers">

	<?php if (count($data) > 0): ?>
	<?php foreach ($data as $index => $item): ?>
	<a href="<?php echo base_url('career/'.$item->id) ?>">
		<div class="probootstrap-text-box-wrapper probootstrap-animate">
			<div class="row">
				<div class="col-xs-12 col-sm-6 probootstrap-animate">
					<div class="padding20">
						<div class="title">
							<?php
								$today = strtotime(date('Y-m-d'));
								$closingDate = strtotime($item->closing_date);

								if ($closingDate > $today) {
									$itemName = $item->name;
									$itemNameBadge = '';
								} else {
									$itemName = '<s>'.$item->name.'</s>';
									$itemNameBadge = '<span class="badge badge-danger">Closed</span>';
								};
							?>
							<div style="height: 50px; overflow: hidden;">
								<h3 class="h3-ellipsis" title="<?php echo $item->name ?>">
									<?php echo $itemNameBadge ?>
									<?php echo $itemName ?>
								</h3>
							</div>
						</div>
						<div class="company">
							<i class="icon fa fa-building-o" style="width: 20px;"></i>
							<?php echo $item->company_name ?>
						</div>
						<div class="location">
							<i class="icon fa fa-map-o" style="width: 20px;"></i>
							<span style="text-transform: capitalize;"><?php echo strtolower($item->regencies_name) .', '. strtolower($item->province_name) ?></span>
						</div>
						<div class="salary">
							<i class="icon fa fa-money" style="width: 20px;"></i>
							<?php
								$salary = '<span style="color: #888; font-style: italic;">Not shareable</span>';
								if ( (!empty($item->salary1) && !is_null($item->salary1)) && (!empty($item->salary2) && !is_null($item->salary2)) ) {
									$salary = number_format($item->salary1) .' - '. number_format($item->salary2) .' <sup class="text-hint">'.$item->currency_unit.'</sup>';
								};
								echo $salary;
							?>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 probootstrap-animate">
					<div class="probootstrap-text-box">
						<table>
							<tr>
								<td valign="top" width="120" class="text-hint"><span>Published</span></td>
								<td valign="top"><?php echo date('d M Y', strtotime($item->published)) ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Closing Date</td>
								<td valign="top"><?php echo date('d M Y', strtotime($item->closing_date)) ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Age</td>
								<td valign="top"><?php echo $item->age1 .' - '.$item->age2 ?> year</td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Education</td>
								<td valign="top"><?php echo $item->education ?></td>
							</tr>
							<tr>
								<td valign="top" class="text-hint">Type Of Work</td>
								<td valign="top"><?php echo $item->type_work ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</a>
	<?php endForeach; ?>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>

	<div class="text-center probootstrap-animate">
    <?php echo $pagination ?>
  </div>
</section>
