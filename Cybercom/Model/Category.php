<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Category extends \Model\Core\Table
{

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	function __construct()
	{
		$this->setTableName('category');
		$this->setPrimaryKey('categoryId');
	}

	public function getStatusoptions()
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

	public function createPath($id)
	{
		$sql = "SELECT * FROM category WHERE path like '{$id}-%' or path like '%-{$id}' or path like '%-{$id}-%' or categoryId = '{$id}'";
		$children = $this->fetchAll($sql)->getData();

		foreach ($children as $key => $child) {
			$categoryPath = '';
			$lastInsertid = $child->categoryId;
			if ($child->parentId) 
			{
				$category = $this->load($child->parentId);
				$categoryPath = $category->path.'-'.$lastInsertid;
			}
			else
			{
				$categoryPath = $lastInsertid;
			}
			$category = $this->load($lastInsertid);
			$category->path = $categoryPath;
			$category->save();
		}
	}

	public function setParent($parentId, $categoryId)
	{
		$sql = "SELECT * FROM category WHERE parentId = {$categoryId}";
		$children = $this->fetchAll($sql)->getData();
		foreach ($children as $key => $child) {
			$category = $this->load($child->categoryId);
			$category->parentId = $parentId;
			$category->save();
		}
		$this->createPath($parentId);
	}
}

?>