<?php 
namespace Model\Customer;

\Mage::loadFileByClassName('Model\Core\Table');

class Group extends \Model\Core\Table
{

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	function __construct()
	{
		$this->setTableName('customer_group');
		$this->setPrimaryKey('groupId');
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