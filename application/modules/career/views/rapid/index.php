<!--==========================
	Careers Section
============================-->
<section id="intro" class="clearfix intro-half"></section>
<section id="careers">
	<div class="container">

		<header class="section-header">
			<h3><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h3>
		</header>

		<div class="clearfix"></div>

		<?php if (count($data) > 0): ?>
		<?php foreach ($data as $index => $item): ?>
		<div class="card item">
			<div class="card-body">
				<div class="row">
					<div class="col-xs-10 col-sm-6">
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
							<?php echo $itemNameBadge ?>
							<a href="<?php echo base_url('career/'.$item->id) ?>">
								<?php echo $itemName ?>
							</a>
						</div>
						<div class="company"><?php echo $item->company_name ?></div>
						<div class="location">
							<i class="icon fa fa-map-marker"></i>
							<?php echo $item->regencies_name .', '. $item->province_name ?>
						</div>
						<div class="salary">
							<i class="icon fa fa-dollar"></i>
							<?php
								$salary = '<span style="color: #888; font-style: italic;">Not shareable</span>';
								if ( (!empty($item->salary1) && !is_null($item->salary1)) && (!empty($item->salary2) && !is_null($item->salary2)) ) {
									$salary = number_format($item->salary1) .' - '. number_format($item->salary2) .' <sup class="text-hint">'.$item->currency_unit.'</sup>';
								};
								echo $salary;
							?>
						</div>
					</div>
					<div class="col-xs-10 col-sm-6 right">
						<table>
							<tr>
								<td valign="top" width="100" class="text-hint">Published</td>
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
		<?php endForeach; ?>
		<?php else: ?>
		<div class="nothing-found"><div>No data found</div></div>
		<?php endIf; ?>

    <div class="text-center" style="margin-top: 20px;">
      <?php echo $pagination ?>
    </div>

	</div>
</section><!-- #careers -->
