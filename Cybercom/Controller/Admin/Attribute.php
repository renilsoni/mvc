<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Attribute extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$attributeGrid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $attributeGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$attribute = \Mage::getModel('Attribute');
		if ($id = $this->getRequest()->getGet('id')) {
			$attribute = $attribute->load($id);
			if (!$attribute) {
				throw new \Exception("Data Not Found");
			}
		}

		$attributeEdit = \Mage::getBlock('Admin\Attribute\Edit')->setTableRow($attribute)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $attributeEdit
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function saveAction()
	{
		try {
			if (!$this->getRequest()->getPost()) {
				throw new \Exception("Invalid Request");
			}
			$attribute = \Mage::getModel('Attribute');
			if ($id = $this->getRequest()->getGet('id')) {
				$attribute = $attribute->load($id);
				if (!$attribute) {
					throw new \Exception("Invalid ID");
				}
				$this->getMessage()->setSuccess('Record Updated Successfully');
			} else {
				$this->getMessage()->setSuccess('Record Inserted Successfully');
			}
			$attributeData = $this->getRequest()->getPost('attribute');
			
			$attribute->setdata($attributeData);
			if($attribute->save()) {
				
				if($attribute->backendType == "varchar")
				{
					$backendType = $attribute->backendType."(255)";
				}
				else 
				{
					$backendType = $attribute->backendType;
				}

				$sql = "ALTER TABLE `{$attribute->entityTypeId}` ADD `{$attribute->code}` {$backendType}";
				$attribute->getAdapter()->getConnect()->query($sql);
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$attributeGrid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $attributeGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function deleteAction()
	{
		try {
			$id = $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("ID Invalid.");
			}
			$attribute = \Mage::getModel('Attribute');

			$attribute->load($id);
			$column = $attribute->code;
			$table = $attribute->entityTypeId;

			if($attribute->delete()) {

				$sql = "ALTER TABLE `{$table}` DROP COLUMN {$column}";
				$attribute->getAdapter()->getConnect()->query($sql);

				$attributeGrid = \Mage::getBlock('Admin\Attribute\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $attributeGrid
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');
			} else {
				$this->getMessage()->setFailure('Record Not Deleted');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
}

 ?>