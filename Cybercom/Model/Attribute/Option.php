<?php 
namespace Model\Attribute;

\Mage::loadFileByClassName('Model\Core\Table');

class Option extends \Model\Core\Table
{
	function __construct()
	{
		$this->setTableName('attribute_option');
		$this->setPrimaryKey('optionId');
	}
	
}

?>