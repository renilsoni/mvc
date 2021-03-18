<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Shipping</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form') ?>').setMethod('POST').load()" class="btn btn-success">Add Shipping</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="shipping">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Amount</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getShippings()->count()): ?>
                   <?php foreach ($this->getShippings()->getData() as $shipping): ?>
                       <tr>
                            <td><?= $shipping->methodId ?></td>
                            <td><?= $shipping->name ?></td>
                            <td><?= $shipping->code ?></td>
                            <td><?= $shipping->amount ?></td>
                            <td><?= $shipping->description ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $shipping->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $shipping->methodId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $shipping->methodId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>

                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td align="center">Data Not Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>
