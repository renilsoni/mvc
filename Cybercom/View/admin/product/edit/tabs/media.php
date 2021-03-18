<?php $media = $this->getTableRow()->getImages(); ?>

<div>
    <button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('updateMedia','admin_product_media')?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">Update</button>
    <button type="button" class="btn btn-primary" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('deleteMedia','admin_product_media')?>').resetParams().setParams($('#editForm').serializeArray()).setMethod('POST').load()">Remove</button>
</div>
<br>
<table class="table w-100">
    <thead>
        <tr>
            <th scope="col">IMAGE</th>
            <th scope="col">LABEL</th>
            <th scope="col">SMALL</th>
            <th scope="col">THUMB</th>
            <th scope="col">BASE</th>
            <th scope="col">GALLERY</th>
            <th scope="col">REMOVE</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($media->count()): ?>
            <?php foreach ($media->getData() as $key => $value): ?>
                <tr>
                    <td><img src="<?= $this->baseUrl('uploads/').$value->path ?>" width="70px" heigth="70px"></td>
                    <td><input type="text" name="label[<?= $value->mediaId ?>]" value="<?= $value->label ?>"></td>
                    <td><input type="radio" name="small" value="<?= $value->mediaId ?>" <?php if ($value->small) { echo 'checked'; } ?>></td>
                    <td><input type="radio" name="thumb" value="<?= $value->mediaId ?>" <?php if ($value->thumb) { echo 'checked'; } ?>></td>
                    <td><input type="radio" name="base" value="<?= $value->mediaId ?>" <?php if ($value->base) { echo 'checked'; } ?>></td>
                    <td><input type="checkbox" name="gallery[<?= $value->mediaId ?>]" <?php if ($value->gallery) { echo 'checked'; } ?>></td>
                    <td><input type="checkbox" name="remove[<?= $value->mediaId ?>]"></td>
                </tr>
            <?php endforeach ?>
        <?php else: ?>
            <tr>
                <td align="center" colspan="7">Data Not Found</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
<div>
    <form>
        <div class="form-group">
            <input type="file" class="form-control" name="file" id="mediaFile">
        </div>
        <div>
            <button type="button" class="btn btn-primary" name="file" 
            onclick="
                var form = new FormData();
                var files = $('#mediaFile')[0].files;
                form.append('file',files[0]);
                object.setUrl('<?php echo $this->getUrl()->getUrl('uploadFile','admin_product_media') ?>').resetParams().setParams(form).setMethod('POST').upload()">Upload</button> 
        </div>
    </form>
</div>