<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Customer</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load()" class="btn btn-success">Add Customer</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="category">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Group Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>ZipCode</th>                    
                    <th>Mobile</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getCustomers()->count()): ?>
                   <?php foreach ($this->getCustomers()->getData() as $customer): ?>
                       <tr>
                            <td><?= $customer->customerId ?></td>
                            <td><?= $customer->groupname ?></td>
                            <td><?= $customer->firstName ?></td>
                            <td><?= $customer->lastName ?></td>
                            <td><?= $customer->email ?></td>    
                            <td><?= $customer->zipcode ?></td>    
                            <td><?= $customer->mobile ?></td>
                            <td><?= $customer->createdDate ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $customer->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $customer->customerId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $customer->customerId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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
