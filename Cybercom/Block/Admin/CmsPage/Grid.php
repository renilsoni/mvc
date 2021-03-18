<?php 
namespace Block\Admin\CmsPage;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{

	protected $cmsPages = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/cmspage/grid.php');
		$this->setCmspages();
	}

	public function setCmspages()
	{
		$cmsPage = \Mage::getModel('Cmspage');
		$this->cmsPages = $cmsPage->fetchAll();
		return $this;
	}

	public function getCmspages()
	{
		return $this->cmsPages;
	}
}

?>