<?php 
    $billing = $this->getBilling();
    $shipping = $this->getShipping();
 ?>

<h4>Billing Address</h4>
<div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" name="billing[address]" id="address">
        <?=$billing->address;?>
    </textarea>
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" placeholder="Enter City" id="city" name="billing[city]" value="<?=$billing->city?>">
</div>
<div class="form-group">
    <label for="state">State:</label>
    <input type="text" class="form-control" placeholder="Enter state" id="state" name="billing[state]" value="<?=$billing->state?>">
</div>
<div class="form-group">
    <label for="zipcode">ZipCode:</label>
    <input type="text" class="form-control" placeholder="Enter zipcode" id="zipcode" name="billing[zipcode]" value="<?=$billing->zipcode?>">
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" class="form-control" placeholder="Enter country" id="country" name="billing[country]" value="<?=$billing->country?>">
</div>

<h4>Shipping Address</h4>
<div class="form-group">
    <label for="address">Address</label>
    <textarea class="form-control" name="shipping[address]" id="address">
        <?=$shipping->address;?>
    </textarea>
</div>
<div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" placeholder="Enter City" id="city" name="shipping[city]" value="<?=$shipping->city?>">
</div>
<div class="form-group">
    <label for="state">State:</label>
    <input type="text" class="form-control" placeholder="Enter state" id="state" name="shipping[state]" value="<?=$shipping->state?>">
</div>
<div class="form-group">
    <label for="zipcode">ZipCode:</label>
    <input type="text" class="form-control" placeholder="Enter zipcode" id="zipcode" name="shipping[zipcode]" value="<?=$shipping->zipcode?>">
</div>
<div class="form-group">
    <label for="country">Country:</label>
    <input type="text" class="form-control" placeholder="Enter country" id="country" name="shipping[country]" value="<?=$shipping->country?>">
</div>

<button type="button" class="btn btn-primary" name="updateproduct" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">Update</button> 
