<ul class="nav flex-column">
<?php foreach ($this->getTabs() as $key => $tab): ?>
	<li class="nav-item">
    	<a class="nav-link" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form','admin_product',['tab' => $key],false); ?>').resetParams().setMethod('POST').load()"><?= $tab['label'] ?></a>
    </li>
<?php endforeach ?>
</ul>

