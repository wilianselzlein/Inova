<!-- https://github.com/pedroelsner/filter_results -->
	<?php echo $this->Search->create(); ?>
	<div class="filter">
		<table border="0" width="100%">
			<tr>
				<td width="90%"><br><?php echo $this->Search->input('filter1', array('style' => 'border: 1px solid #aaa;')); ?></td>
				<td width="10%"><?php echo $this->Search->end(__('Filtrar', true)); ?></td>
			</tr>
		</table>
	</div>
