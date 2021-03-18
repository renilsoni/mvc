<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Payment</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load()" class="btn btn-success">Add Payment</a>
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
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getPayments()->count()): ?>
                   <?php foreach ($this->getPayments()->getData() as $payment): ?>
                       <tr>
                            <td><?= $payment->methodId ?></td>
                            <td><?= $payment->name ?></td>
                            <td><?= $payment->code ?></td>
                            <td><?= $payment->description ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $payment->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $payment->methodId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $payment->methodId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
