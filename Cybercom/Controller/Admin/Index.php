<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Index extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function indexAction()
	{
		$layout = $this->getLayout();
		$this->renderLayout();
	}
}

 ?>