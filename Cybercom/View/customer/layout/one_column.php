<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->createBlock('Customer\Layout\Head')->toHtml(); ?>
	</head>
	<body id="bd" class=" cms-index-index4 header-style4 prd-detail cms-simen-home-page-v2 default cmspage">
		<div id="sns_wrapper">  
            <!-- HEADER -->    
        	<div class="container-fluid pl-0 pr-0" style="overflow: hidden;">
				<div class="row">
					<div class="col">
						<?php echo $this->getChild('header')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $this->createBlock('Core_Layout_Message')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $this->getChild('content')->toHtml(); ?>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<?php echo $this->getChild('footer')->toHtml(); ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>