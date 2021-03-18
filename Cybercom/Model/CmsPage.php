<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class CmsPage extends Core\Table
{
	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;
	
	function __construct()
	{
		$this->setTableName('cms_page');
		$this->setPrimaryKey('pageId');
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