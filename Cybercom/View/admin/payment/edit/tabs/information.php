<?php $payment = $this->getTableRow(); ?>

<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" id="name" name="payment[name]" value="<?=$payment->name;?>">
</div>
    <div class="form-group">
    <label for="code">Code:</label>
    <input type="text" class="form-control" placeholder="Enter Code" id="code" name="payment[code]" value="<?=$payment->code;?>">
</div>
<div class="form-group">
    <label for="description">Description:</label>
    <input type="text" class="form-control" placeholder="Enter Description" id="description" name="payment[description]" value="<?=$payment->description;?>">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="payment[status]" id="status">
        <option value="">Select</option>
        <?php foreach ($payment->getStatusOptions() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $payment->status){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>

<button type="button" class="btn btn-primary" name="updatepayment" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
<?= $this->getTableRow()->methodId ? 'Update' : 'Insert' ?>
</button> 

                      