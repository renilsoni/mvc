<?php 
namespace Model\Product;

\Mage::loadFileByClassName('Model\Core\Table');

class Media extends \Model\Core\Table
{

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	function __construct()
	{
		$this->setTableName('product_media');
		$this->setPrimaryKey('mediaId');
	}

	public function getStatusoptions()
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}
}

?>