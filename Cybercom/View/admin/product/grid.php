<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>Product</h3>
            <hr>
            <a onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load();" class="btn btn-success">Add Product</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12" id="category">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>SKU</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getProducts()->count()): ?>
                   <?php foreach ($this->getProducts()->getData() as $product): ?>
                       <tr>
                            <td><?= $product->productId ?></td>
                            <td><?= $product->sku ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->price ?></td>
                            <td><?= $product->discount ?></td>
                            <td><?= $product->quantity ?></td>
                            <td><?= $product->description ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $product->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $product->productId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $product->productId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
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