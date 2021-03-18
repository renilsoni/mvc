<?php $groupPrices = $this->getProductGroupPrices()->getData(); ?>

<button type="button" class="btn btn-primary" name="groupprice" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('groupPrice') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">Update</button> 
<br><br>
<table class="table">
	<thead>
		<tr>
			<th>Group Name</th>
			<th>Product Price</th>
			<th>Group Price</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($groupPrices as $groupPrice): ?>
			<tr>
				<td><?= $groupPrice->name ?></td>
				<td><?= $groupPrice->price ?></td>
				<td><input type="text" name="groupPrice[<?php if(!$groupPrice->entityId): ?>new<?php else: ?>exist<?php endif; ?>][<?php if($groupPrice->entityId) { echo $groupPrice->entityId; } else { echo $groupPrice->groupId; } ?>]" value="<?= $groupPrice->groupPrice ?>"></td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>