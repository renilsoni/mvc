<?php 
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');

class Product extends \Controller\Core\Customer
{

	function __construct()
	{
		parent::__construct();
	}

	public function detailAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getContent();
		$content->addChild(\Mage::getBlock('Product\Details'),'details');
		$this->renderLayout();
	}
}

?>