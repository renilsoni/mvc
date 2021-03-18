<?php $attribute = $this->getTableRow(); ?>

<div class="form-group">
    <label for="name">Attribute Name</label>
    <input type="text" class="form-control" placeholder="Enter Name" id="name" name="attribute[name]" value="<?=$attribute->name;?>">
</div>
    <div class="form-group">
    <label for="code">Attribute Code:</label>
    <input type="text" class="form-control" placeholder="Enter Code" id="code" name="attribute[code]" value="<?=$attribute->code;?>">
</div>
<div class="form-group">
    <label for="entityType">Entity Type:</label>
    <select class="form-control" name="attribute[entityTypeId]" id="entityType">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getEntityTypes() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $attribute->entityTypeId){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="inputType">Input Type:</label>
    <select class="form-control" name="attribute[inputType]" id="inputType">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getInputTypes() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $attribute->inputType){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="backendType">Backend Type:</label>
    <select class="form-control" name="attribute[backendType]" id="backendType">
        <option value="" disabled>Select</option>
        <?php foreach ($attribute->getBackendTypes() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $attribute->backendType){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="sortOrder">Sort Order</label>
    <input type="number" class="form-control" placeholder="Enter Sort order" id="sortOrder" name="attribute[sortOrder]" value="<?=$attribute->sortOrder;?>">
</div>

<button type="button" class="btn btn-primary" name="updateattribute" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
    <?= $this->getTableRow()->attributeId ? 'Update' : 'Insert' ?>
</button> 
