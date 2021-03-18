<?php 
namespace Model\Core;

class Table
{
	protected $adapter = null;
	protected $tableName = null;
	protected $primaryKey = null;
	protected $data = [];

	function __construct()
	{
		
	}

	public function getTableName()
	{
		return $this->tableName;
	}

	public function setTableName($tableName)
	{
		$this->tableName = $tableName;
		return $this;
	}

	public function getAdapter()
	{
		if (!$this->adapter) {
			$this->setAdapter();
		}
		return $this->adapter;
	}

	public function setAdapter()
	{
		$this->adapter = \Mage::getModel('Core\Adapter');
		return $this;
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
		return $this;
	}

	public function getData()
	{
		return $this->data;
	}

	public function setData($data)
	{
		$this->data = array_merge($this->data,$data);
		return $this;
	}

	public function __set($key,$value)
	{
		$this->data[$key] = $value;
		return $this;
	}

	public function __get($key)
	{	
		if (!array_key_exists($key, $this->data)) {
			return null;
		}
		return $this->data[$key];
	}

	public function load($id)
	{
		$id = (int) $id;
		
		$sql = "select * from `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$id}'";
		return $this->fetchRow($sql);
	}

	public function fetchRow($sql)
	{
		$row = $this->getAdapter()->fetchRow($sql);
		if (!$row) {
			return false;
		}
		$this->data = $row;
		return $this;
	}

	public function insert()
	{
		$keys = implode(", " ,array_keys($this->data));
		$values = "'".implode("', '" ,array_values($this->data))."'";
		$sql = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
		return $this->getAdapter()->insert($sql);
	}

	public function update($data, $condition)
	{
		$sql = "update `{$this->getTableName()}` set ";
		foreach ($this->data as $key => $value) {
			$sql .= "`{$key}` = '{$value}', ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= " where `{$this->getPrimaryKey()}` = {$condition['id']}";
		$this->getAdapter()->update($sql);
	}

	public function save()
	{
		if (!array_key_exists($this->getPrimaryKey(), $this->data)) {
			$id = $this->insert();
		} else {
			$id = $this->data[$this->getPrimaryKey()];
			$this->update($this->data, ['id' => $id]);
		}
		$this->load($id);
		return $this;
	}	

	public function delete($sql = null)
	{
		if (!$sql) {
			$sql = "delete from `{$this->getTableName()}` WHERE `{$this->getPrimaryKey()}` = '{$this->data[$this->getPrimaryKey()]}'";
		}
		$result = $this->getAdapter()->delete($sql);
		return $result;
	}

	public function fetchAll($sql = null)
	{
		$className = get_called_class().'\Collection';
		$className = str_replace('Model\\', '', $className);
		$collection = \Mage::getModel($className);

		if (!$sql) {
			$sql = "select * from `{$this->getTableName()}`";
		}

		$rows = $this->getAdapter()->fetchAll($sql);
	
		if (!$rows) {
			return $collection;
		}
		foreach ($rows as $key => &$value) {
			$row = new $this;
			$value = $row->setData($value);
		}
	
		$collection->setData($rows);
		return $collection;
	}

}

?>