<!DOCTYPE html>
<html>
<head>
	<title><?=$pageTitle;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navigation">
				<ul class="navbar-nav">
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','product',null,true) ?>">Product</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','category',null,true) ?>">Category</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','customer',null,true) ?>">Customer</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','shipping',null,true) ?>">Shipping</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','payment',null,true) ?>">Payment</a>
				    </li>
				    <li class="nav-item">
				      	<a class="nav-link" href="<?php echo $this->getUrl()->getUrl('grid','admin',null,true) ?>">Admin</a>
				    </li>
				</ul>
			</div>
		</nav>
	</header>
