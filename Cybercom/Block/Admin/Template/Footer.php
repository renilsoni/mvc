<?php 

Mage::loadFileByClassName('Block_Core_Template');

class Block_Template_Footer extends Block_Core_Template
{
	function __construct()
	{
		$this->setTemplate('./View/admin/template/footer.php');
	}
}

?>