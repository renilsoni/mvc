<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Media extends \Block\Core\Template
{

	protected $productMedia = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/media.php');
	}

	public function getProductMedia()
	{
		if (!$this->productMedia) {
			$this->setProductMedia();
		}
		return $this->productMedia;
	}

	public function setProductMedia($productMedia = null)
	{
		if (!$productMedia) {
			$productMedia = \Mage::getModel('Product\Media');
			$media = $productMedia->fetchAll();
		}
		$this->productMedia = $media;
		return $this;
	}
}

?>