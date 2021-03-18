<?php 
namespace Block\Home;

\Mage::loadFileByClassName('Block\Core\Template');

class Slider extends \Block\Core\Template
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/home/slider.php');
	}
}

?>