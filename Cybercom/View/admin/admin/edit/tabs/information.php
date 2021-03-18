<?php 
    $admin = $this->getTableRow();
 ?>

<div class="form-group">
    <label for="fname">Username : </label>
    <input type="text" class="form-control" placeholder="Enter Username" id="username" name="admin[username]" value="<?=$admin->username?>">
</div>
<div class="form-group">
    <label for="lname">Password :</label>
    <input type="password" class="form-control" placeholder="Enter Password" id="lname" name="admin[password]">
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="admin[status]" id="status">
        <option value="">Select</option>
        <?php foreach ($admin->getStatusOptions() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $admin->status){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
    
<button type="button" class="btn btn-primary" name="updateproduct" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
    <?= $this->getTableRow()->adminId ? 'Update' : 'Insert' ?>
</button>     
