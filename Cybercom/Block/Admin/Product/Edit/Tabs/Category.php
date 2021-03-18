<?php 
namespace Block\Admin\Product\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Category extends \Block\Core\Template
{

	protected $categoryOptions = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/product/edit/tabs/category.php');
	}

	public function getCategories()
	{
		$categories = \Mage::getModel('Category');
		return $categories->fetchAll();
	}

	public function getName($category)
	{
		$categoryModel = \Mage::getModel('Category');
		if (!$this->categoryOptions) {
			$sql = "SELECT `categoryId`, `name` FROM {$categoryModel->getTableName()}";
			$this->categoryOptions = $categoryModel->getAdapter()->fetchPairs($sql);
		}
		$pathIds = explode("-", $category->path);
		foreach ($pathIds as $key => &$id) 
		{
			if (array_key_exists($id, $this->categoryOptions)) {
				$id = $this->categoryOptions[$id];
			}
		}
		$name = implode("=>", $pathIds);
		return $name;
	}

	public function getProductCategory()
	{
		$productCategory = \Mage::getModel('Product\Category');
		$sql = "SELECT `categoryId`,`productId` FROM {$productCategory->getTableName()} WHERE productId = {$this->getTableRow()->productId}";
		return $productCategory->getAdapter()->fetchPairs($sql);
	}

}

?>