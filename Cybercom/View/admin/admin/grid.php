<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Admin</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load();" class="btn btn-success">Add Admin</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getAdmins()->count()): ?>
                   <?php foreach ($this->getAdmins()->getData() as $admin): ?>
                       <tr>
                            <td><?= $admin->adminId ?></td>
                            <td><?= $admin->username ?></td>
                            <td><?= $admin->createdDate ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $admin->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $admin->adminId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $admin->adminId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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