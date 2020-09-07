<div>

	<?php if (count($data) > 0): ?>
	<ul id="faq-list" class="lists-ul" style="padding-left: 15px;">
		<?php foreach ($data as $index => $item): ?>
		<li class="probootstrap-animate lists-li" style="margin-bottom: 15px;">
			<a data-toggle="collapse" class="collapsed" href="#faq-<?php echo $item->id ?>">
				<span style="color: #333; font-size: 18px; line-height: 22px;"><?php echo $item->question ?></span>
			</a>
			<div id="faq-<?php echo $item->id ?>" class="collapse" data-parent="#faq-list" style="color: #666;">
				<?php echo $item->answer ?>
			</div>
		</li>
		<?php endForeach; ?>
	</ul>
	<?php else: ?>
	<div class="nothing-found"><div>No data found</div></div>
	<?php endIf; ?>

</div>
