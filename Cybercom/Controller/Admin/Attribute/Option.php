<?php 
namespace Controller\Admin\Attribute;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Option extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function saveAction()
	{
		try {

			$attributeOptionData = $this->getRequest()->getPost();

			if (array_key_exists('new', $attributeOptionData)) {
				foreach ($attributeOptionData['new']['name'] as $key => $name) {
					$attributeOption = \Mage::getModel('Attribute\Option');
					$attributeOption->name = $name;
					$attributeOption->sortOrder = $attributeOptionData['new']['sortOrder'][$key];
					$attributeOption->attributeId = $this->getRequest()->getGet('id');
					$attributeOption->save();		
				}
			}

			if (array_key_exists('exist', $attributeOptionData)) {
				foreach ($attributeOptionData['exist'] as $optionId => $option) {
					$attributeOption = \Mage::getModel('Attribute\Option');
					$attributeOption->load($optionId);
					$attributeOption->name = $option['name'];
					$attributeOption->sortOrder = $option['sortOrder'];
					$attributeOption->save();					
				}
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$attribute = \Mage::getModel('Attribute');
		if ($id = $this->getRequest()->getGet('id')) {
			$attribute = $attribute->load($id);
			if (!$attribute) {
				throw new \Exception("Data Not Found");
			}
		}

		$attributeEdit = \Mage::getBlock('Admin\Attribute\Edit\Tabs\Option')->setTableRow($attribute)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#editContent',
					'html' => $attributeEdit
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
		//$this->redirect('grid',null,null,true);
	}

	public function deleteAction()
	{
		try {
			$id = $this->getRequest()->getGet('optionId');
			if (!$id) {
				throw new \Exception("ID Invalid.");
			}
			$attribute = \Mage::getModel('Attribute\Option');
			$attribute->load($id);
			if($attribute->delete()) {
				$attributeEdit = \Mage::getBlock('Admin\Attribute\Edit\Tabs\Option')->setTableRow($attribute)->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#editContent',
							'html' => $attributeEdit
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');
				//$this->redirect('grid',null,null,true);
			} else {
				$this->getMessage()->setFailure('Record Not Deleted');
				//$this->redirect('grid',null,null,true);			
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
			//$this->redirect('grid',null,null,true);
		}
	}
}

 ?>