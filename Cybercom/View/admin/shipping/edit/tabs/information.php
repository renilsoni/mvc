<?php $shipping = $this->getTableRow(); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" id="name" name="shipping[name]" value="<?=$shipping->name;?>">
</div>
<div class="form-group">
    <label for="code">Code:</label>
    <input type="text" class="form-control" placeholder="Enter Code" id="code" name="shipping[code]" value="<?=$shipping->code;?>">
</div>
<div class="form-group">
    <label for="amount">Amount:</label>
    <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="shipping[amount]" value="<?=$shipping->amount;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <input type="text" class="form-control" placeholder="Enter Description" id="description" name="shipping[description]" value="<?=$shipping->description;?>">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="shipping[status]" id="status">
        <option value="">Select</option>
        <?php foreach ($shipping->getStatusOptions() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $shipping->status){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>

<button type="button" class="btn btn-primary" name="updateshipping" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
<?= $this->getTableRow()->methodId ? 'Update' : 'Insert' ?>
</button> 


