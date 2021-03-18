<?php 

namespace Block\Core;

\Mage::loadFilebyClassName('Block\Core\Template');

class Edit extends Template
{

	protected $tab = null;
	protected $tabClass = null;
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/core/edit.php');	
	}

	public function getTabContent()
	{
		$tabBlock = $this->getTab();
		$tab = $this->getRequest()->getGet('tab',$tabBlock->getDefaultTab());
		$tabs = $tabBlock->getTabs();
		$BlockName = $tabs[$tab]['Block'];
		echo \Mage::getBlock($BlockName)->setTableRow($this->getTableRow())->toHtml();
	}

	public function setTab($tab = null)
	{
		if (!$tab) {
			$tab = $this->getTabClass();
		}
		$tab->setTableRow($this->getTableRow())->prepareTabs();
		$this->tab = $tab;
		return $this;	
	}

	public function getTab()
	{
		if (!$this->tab) {
			$this->setTab();
		}
		return $this->tab;
	}

	public function setTabClass(\Block\Core\Edit\Tabs $tabClass)
	{
		$this->tabClass = $tabClass;
		return $this;
	}

	public function getTabClass()
	{
		return $this->tabClass;
	}

	public function getTabHtml()
	{
		return $this->getTab()->toHtml();
	}
}

?>