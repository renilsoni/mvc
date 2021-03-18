<?php $categories = $this->getCategories()->getData(); ?>

<div class="form-group">
    <label for="category">Product Category :</label>
    <select class="form-control" name="categories[]" id="category" multiple>
        <?php foreach ($categories as $categoryId => $category): ?>
            <option value="<?= $category->categoryId ?>" <?php if(array_key_exists($category->categoryId, $this->getProductCategory())): ?> selected <?php endif; ?>><?= $this->getName($category); ?></option>
        <?php endforeach ?>
    </select>
</div>

<button type="button" class="btn btn-primary" name="category" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('productCategory') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
<?= $this->getTableRow()->productId ? 'Update' : 'Insert' ?>
</button> 