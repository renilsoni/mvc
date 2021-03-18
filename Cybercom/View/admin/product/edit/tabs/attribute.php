<?php $attributes = $this->getAttributes()->getData();?>
<?php $product = $this->getTableRow(); ?>

<?php foreach ($attributes as $attribute): ?>
	<?php if ($attribute->inputType == 'select'): ?>
		<div class="form-group">
		    <label for="<?= $attributes->code;?>"><?= $attribute->code; ?> : </label>
		    <select class="form-control" name="product[<?= $attribute->code; ?>]" id="<?= $attribute->code; ?>">
		        <option value="" selected disabled>Select</option>
		        <?php foreach ($attribute->getOptions()->getData() as $option): ?>
		            <option value="<?= $option->optionId ?>" <?php $code = $attribute->code; if($option->optionId == $product->$code): ?> selected <?php endif; ?> ><?= $option->name ?></option>
		        <?php endforeach ?>
		    </select>
		</div>
	<?php elseif($attribute->inputType == 'text'): ?>
		<div class="form-group">
		    <label for="<?= $attribute->code; ?>"><?= $attribute->code; ?> : </label>
		    <input type="$attribute->inputType" class="form-control" placeholder="Enter Name" id="<?= $attribute->code; ?>" name="product[<?= $attribute->code; ?>]" value = "<?php $code = $attribute->code; echo $product->$code; ?>">
		</div>
	<?php elseif($attribute->inputType == 'radio'): ?>
		<div class="form-group">
		    <label class="d-block" for="<?= $attribute->code; ?>"><?= $attribute->code; ?> : </label>
		   	 	<?php foreach ($attribute->getOptions()->getData() as $option): ?>
		            <input type="<?= $attribute->inputType; ?>" class="ml-2" id="<?= $attribute->code; ?>" name="product[<?= $attribute->code; ?>][]" value = "<?= $option->optionId ?>" <?php $code = $attribute->code; if($option->optionId == $product->$code): ?> checked <?php endif; ?>><span class="ml-1"><?= $option->name ?></span>
		        <?php endforeach ?>
		</div>
	<?php elseif ($attribute->inputType == 'multi'): ?>
		<div class="form-group">
		    <label for="<?= $attributes->code;?>"><?= $attribute->code; ?> : </label>
		    <select class="form-control" name="product[<?= $attribute->code; ?>][]" id="<?= $attribute->code; ?>" multiple>
		        <option value="" selected disabled>Select</option>
		        <?php foreach ($attribute->getOptions()->getData() as $option): ?>
		            <option value="<?= $option->optionId ?>" <?php $code = $attribute->code; if(in_array($option->optionId, explode(',', $product->$code))): ?> selected <?php endif; ?> ><?= $option->name ?></option>
		        <?php endforeach ?>
		    </select>
		</div>
	<?php elseif($attribute->inputType == 'checkbox'): ?>
		<div class="form-group">
		    <label class="d-block" for="<?= $attribute->code; ?>"><?= $attribute->code; ?> : </label>
		   	 	<?php foreach ($attribute->getOptions()->getData() as $option): ?>
		            <input type="<?= $attribute->inputType; ?>" class="ml-2" id="<?= $attribute->code; ?>" name="product[<?= $attribute->code; ?>][]" value = "<?= $option->optionId ?>" <?php $code = $attribute->code; if(in_array($option->optionId, explode(',', $product->$code))): ?> checked <?php endif; ?>><span class="ml-1"><?= $option->name ?></span>
		        <?php endforeach ?>
		</div>
	<?php endif ?>
<?php endforeach ?>

<button type="button" class="btn btn-primary"  onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">Save</button> 
