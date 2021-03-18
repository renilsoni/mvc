<?php 
namespace Block\Admin\Category\Edit\Tabs;

\Mage::loadFileByClassName('Block\Core\Template');

class Information extends \Block\Core\Template
{

	protected $category = null;
	protected $displayNames =[];
	protected $categories = [];
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('./View/admin/category/edit/tabs/information.php');
	}

	public function getCategories($sql = null)
	{
		if (!$sql) {
			$sql = "select * from {$this->getTableRow()->getTableName()} order by path";
		}
		$category = $this->getTableRow();
		return $category->fetchAll($sql)->getData();
	}

	public function setCategories($categories = null)
	{
		if (!$categories) {
			$category = $this->getTableRow();
			$categories = $category->fetchAll();
		}
		$this->categories = $categories;
		return $this;
	}

	public function getParentCategory()
	{
		$key = $this->getTableRow()->getPrimaryKey();
		$parentId = $this->getTableRow()->$key;
		if (!$parentId) {
			$this->getNames();
			return $this->getName();
		}
		$sql = "SELECT * FROM {$this->getTableRow()->getTableName()} WHERE path not like '{$parentId}-%' and path not like '%-{$parentId}' and path not like '%-{$parentId}-%' and path not like '{$parentId}'";
		//return $customerGroup->fetchAll($sql)->getData();
		$this->getNames($sql);
		return $this->getName();
	}

	public function addName($category)
	{
		$this->displayNames[] = $category;
		return $this;
	}

	public function getName()
	{
		return $this->displayNames;
	}

	public function getNames($sql = null)
	{
		$this->displayNames = [];
		foreach ($this->getCategories($sql) as $key => $category) {
			$path = explode("-",$category->path);
			$categoryName = '';
			foreach ($path as $key => $value) {
				foreach ($this->getCategories() as $key => $name) {
					if ($value == $name->categoryId) {
						if ($categoryName) {
							$categoryName.= '->'.$name->name;
						}
						else
						{
							$categoryName = $name->name;
						}
					}
				}
			}
			$category->name = $categoryName;
			$this->addName($category);
		}
	}
}

?>