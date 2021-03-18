<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Customer Group</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load()" class="btn btn-success">Add Customer Group</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getCustomerGroup()->count()): ?>
                   <?php foreach ($this->getCustomerGroup()->getData() as $customergroup): ?>
                       <tr>
                            <td><?= $customergroup->groupId ?></td>
                            <td><?= $customergroup->name ?></td>
                            <td><?= $customergroup->createdDate ?></td>
                            <td><a href='' class="btn btn-sm btn-success"><?= $customergroup->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $customergroup->groupId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $customergroup->groupId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td align="center" colspan="5">Data Not Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="col-12" id="category">
        </div>
    </div>
</div>