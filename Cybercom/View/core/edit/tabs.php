<ul class="nav flex-column">
<?php foreach ($this->getTabs() as $key => $tab): ?>
	<li class="nav-item bg-danger mt-2">
    	<a class="nav-link text-white" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('form',null,['tab' => $key]); ?>').resetParams().setMethod('POST').load()"><?= $tab['label'] ?></a>
    </li>
<?php endforeach ?>
</ul>

