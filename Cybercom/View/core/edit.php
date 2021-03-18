<div class="container-fluid mt-5">
    <div class="row">
    	<div class="col-md-2">
    		<?php echo $this->getTabHtml(); ?>
    	</div>
        <div class="col-md-8 offset-md-1" id="editContent">
            <form action="<?= $this->getUrl()->getUrl('save'); ?>" method="POST" id="editForm">
                <?php $this->getTabContent(); ?>
            </form>
        </div> 
    </div>
</div>
