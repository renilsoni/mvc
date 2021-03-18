<?php $customergroup = $this->getCustomerGroup(); ?>

<div class="row">
        <div class="col-md-6 offset-md-1 mt-4">
            <form id="customerGroupForm">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" placeholder="Enter name" id="name" name="customergroup[name]" value="<?=$customergroup->name?>">
                </div>
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select class="form-control" name="customergroup[status]" id="status">
                        <option value="">Select</option>
                        <?php foreach ($customergroup->getStatusOptions() as $key => $value): ?>
                            <option value="<?= $key ?>" <?php if ($key == $customergroup->status){ ?> selected <?php } ?> ><?= $value ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                                
                <?php if ($id = $this->getRequest()->getGet('id')): ?>
                    <button type="button" class="btn btn-primary" name="updategroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save',null,['id' => $id]) ?>').resetParams().setParams($('#customerGroupForm').serializeArray()).setMethod('POST').load()">Update</button> 
                <?php else: ?>
                    <button type="button" class="btn btn-primary" name="insertgroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#customerGroupForm').serializeArray()).setMethod('POST').load()">Insert</button> 
                <?php endif ?>     

            </form>
        </div> 
    </div>

