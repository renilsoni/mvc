<?php 
namespace Model;

\Mage::loadFileByClassName('Model\Core\Table');

class Attribute extends Core\Table
{

	const STATUS_ENABLED = 1;
	const STATUS_DISABLED = 0;

	const ENTITY_PRODUCT = 'Product';
	const ENTITY_CATEGORY = 'Category';
	const ENTITY_CUSTOMER = 'Customer';

	const INPUT_TEXT = 'text';
	const INPUT_RADIO = 'radio';
	const INPUT_CHECKBOX = 'checkbox';
	const INPUT_TEXTAREA = 'textarea';
	const INPUT_SELECT = 'select';
	const INPUT_MULTI = 'multi';

	const BACKEND_VARCHAR = 'varchar';
	const BACKEND_INT = 'int';
	const BACKEND_TINYINT = 'tinyint';


	function __construct()
	{
		$this->setTableName('attribute');
		$this->setPrimaryKey('attributeId');
	}

	public function getStatusoptions()
	{
		return [
			self::STATUS_ENABLED => 'Enable',
			self::STATUS_DISABLED => 'Disable'
		];
	}

	public function getEntityTypes()
	{
		return [
			self::ENTITY_PRODUCT => 'Product',
			self::ENTITY_CATEGORY => 'Category',
			self::ENTITY_CUSTOMER => 'Customer'
		];
	}

	public function getInputTypes()
	{
		return [
			self::INPUT_TEXT => 'Text',
			self::INPUT_RADIO => 'Radio',
			self::INPUT_CHECKBOX => 'Checkbox',
			self::INPUT_TEXTAREA => 'Textarea',
			self::INPUT_SELECT => 'Select',
			self::INPUT_MULTI => 'Multi Select'
		];
	}

	public function getBackendTypes()
	{
		return [
			self::BACKEND_VARCHAR => 'Varchar',
			self::BACKEND_INT => 'Int',
			self::BACKEND_TINYINT => 'Tinyint'
		];
	}

	public function getOptions()
	{
		$attributeOptions = \Mage::getModel('Attribute\Option');
		$key = $this->getPrimaryKey();
		$sql = "SELECT * FROM {$attributeOptions->getTableName()} WHERE {$key} = '{$this->$key}' ORDER BY sortOrder";
		return $attributeOptions->fetchAll($sql);
	}
}

?>