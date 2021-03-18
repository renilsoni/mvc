<header>
	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
		    <span class="navbar-toggler-icon"></span>
		</button>	
		<div class="collapse navbar-collapse" id="navigation">
			<ul class="navbar-nav">
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_product',null,true) ?>').setMethod('POST').load()">Product</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_category',null,true) ?>').setMethod('POST').load()">Category</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_customer',null,true) ?>').setMethod('POST').load()">Customer</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_shipping',null,true) ?>').setMethod('POST').load()">Shipping</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_payment',null,true) ?>').setMethod('POST').load()">Payment</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_admin',null,true) ?>').setMethod('POST').load()">Admin</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_customer_group',null,true) ?>').setMethod('POST').load()">Customer Group</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_cmspage',null,true) ?>').setMethod('POST').load()">CMS Page</a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" style="cursor: pointer;" onclick="object.setUrl('<?php echo $this->getUrl()->getUrl('grid','admin_attribute',null,true) ?>').setMethod('POST').load()">Attribute</a>
			    </li>
			</ul>
		</div>
	</nav>
</header>
