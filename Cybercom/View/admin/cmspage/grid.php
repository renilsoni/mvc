<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>CMS Page</h3>
            <hr>
            <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,null,true) ?>').setMethod('POST').load()" class="btn btn-success">Add CMS Page</a>
        </div>
    </div>
    <div class="row mt-3">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Identifier</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($this->getCmsPages()->count()): ?>
                   <?php foreach ($this->getCmsPages()->getData() as $cmspage): ?>
                       <tr>
                            <td><?= $cmspage->pageId ?></td>
                            <td><?= $cmspage->title ?></td>
                            <td><?= $cmspage->identifier ?></td>
                            <td><?= $cmspage->createdDate ?></td>
                            <td><a class="btn btn-sm btn-success"><?= $cmspage->status ? 'Enable' : 'Disable' ?></a></td>

                            <td><a onclick="object.setUrl('<?= $this->getUrl()->getUrl('form',null,['id' => $cmspage->pageId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-primary"><i class="fas fa-pencil-alt"></i></a> <a onclick="object.setUrl('<?= $this->getUrl()->getUrl('delete',null,['id' => $cmspage->pageId],true) ?>').setMethod('POST').load()" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                    <?php endforeach ?>
                <?php else: ?>
                    <tr>
                        <td align="center" colspan="6">Data Not Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="col-12" id="category">
        </div>
    </div>
</div>