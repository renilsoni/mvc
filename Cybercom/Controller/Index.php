<?php 
namespace Controller;

\Mage::loadFileByClassName('Controller\Core\Customer');

class Index extends \Controller\Core\Customer
{

	function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$content = $layout->getContent();
		$content->addChild(\Mage::getBlock('Home\Slider'),'slider')->addChild(\Mage::getBlock('Home\Index'),'index');
		$this->renderLayout();
	}
}

?>