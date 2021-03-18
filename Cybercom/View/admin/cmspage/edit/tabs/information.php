<?php $cmsPage = $this->getTableRow(); ?>

<div class="form-group">
    <label for="title">Title :</label>
    <input type="text" class="form-control" placeholder="Enter title" id="title" name="cmspage[title]" value="<?=$cmsPage->title?>">
</div>
<div class="form-group">
    <label for="identifier">Identifier :</label>
    <input type="text" class="form-control" placeholder="Enter identifier" id="identifier" name="cmspage[identifier]" value="<?=$cmsPage->identifier?>">
</div>
<div class="form-group">
    <label for="content">Content :</label><br>
    <textarea name="cmspage[content]" class="form-control" id="content" onfocus="$('#content').summernote();"><?= $cmsPage->content ?></textarea>
</div>
<div class="form-group">
    <label for="status">Status:</label>
    <select class="form-control" name="cmspage[status]" id="status">
        <option value="">Select</option>
        <?php foreach ($cmsPage->getStatusOptions() as $key => $value): ?>
            <option value="<?= $key ?>" <?php if ($key == $cmsPage->status){ ?> selected <?php } ?> ><?= $value ?></option>
        <?php endforeach ?>
    </select>
</div>
    
<button type="button" class="btn btn-primary" name="updategroup" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('save') ?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">
<?= $this->getTableRow()->pageId ? 'Update' : 'Insert' ?>
</button> 



