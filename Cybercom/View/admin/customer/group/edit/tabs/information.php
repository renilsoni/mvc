<?php $customergroup = $this->getTableRow(); ?>


<div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" placeholder="Enter name" id="name" name="customergroup[name]" value="<?=$customergroup->name?>">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="customergroup[status]" id="status">
        <option value="">Select</option>
        <?php foreach ($customergroup->getStatusOptions() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $customergroup->status){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
                

<button type="button" class="btn btn-primary" name="updategroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
<?= $this->getTableRow()->groupId ? 'Update' : 'Insert' ?>
</button> 
  

