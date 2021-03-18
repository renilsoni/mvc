<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class GroupPrice extends \Block\Core\Template
{

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/groupprice.php');
	}

	public function getProductGroupPrices()
	{
		$key = $this->getTableRow()->getPrimaryKey(); 
		$groupPrice = \Mage::getModel('Product\GroupPrice');
		$sql = "SELECT cg.groupId,cg.name,cgp.entityId,p.price,cgp.groupPrice 
				FROM customer_group cg 
				LEFT JOIN customer_group_price cgp 
					ON cg.groupId = cgp.customerGroupId 
						AND cgp.productId = '{$this->getTableRow()->$key}'
				LEFT JOIN product p 
					ON p.productId = '{$this->getTableRow()->$key}'";
		return $groupPrice->fetchAll($sql);
	}
}

?>