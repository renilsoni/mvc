<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Attribute</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load()" class="btn btn-success">Add Attribute</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="shipping">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Entity Type</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Input Type</th>
                    <th>BackendType</th>
                    <th>Sort Order</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getAttributes()->count()): ?>
                   <?php foreach ($this->getAttributes()->getData() as $attribute): ?>
                       <tr>
                            <td><?= $attribute->attributeId ?></td>
                            <td><?= $attribute->entityTypeId ?></td>
                            <td><?= $attribute->name ?></td>
                            <td><?= $attribute->code ?></td>
                            <td><?= $attribute->inputType ?></td>
                            <td><?= $attribute->backendType ?></td>
                            <td><?= $attribute->sortOrder ?></td>
                            
                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $attribute->attributeId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $attribute->attributeId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>

                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" align="center">Data Not Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
