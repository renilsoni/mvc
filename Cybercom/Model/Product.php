<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Product extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	function __construct()
	{
		$this->setTableName('product');
		$this->setPrimaryKey('productId');
	}

	public function getStatusoptions()
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

	public function getImages()
	{
		$media = \Mage::getModel('Product\Media');
		$key = $this->getPrimaryKey();
		$sql = "SELECT * FROM {$media->getTableName()} WHERE {$key} = {$this->$key}";

		return $media->fetchAll($sql);
	}
}

?>