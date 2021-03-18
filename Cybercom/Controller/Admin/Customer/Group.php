<?php 
namespace Controller\Admin\Customer;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Group extends \Controller\Core\Admin
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$customergroupgrid = \Mage::getBlock('Admin\Customer\Group\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $customergroupgrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$customerGroup = \Mage::getModel('Customer\Group');
		if ($id = $this->getRequest()->getGet('id')) {
			$customerGroup = $customerGroup->load($id);
			if (!$customerGroup) {
				throw new \Exception("Data Not Found");
			}
		}
		$customergroupedit = \Mage::getBlock('Admin\Customer\Group\Edit')->setTableRow($customerGroup)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $customergroupedit
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
			$customerGroup = \Mage::getModel('Customer\Group');
			if ($id = $this->getRequest()->getGet('id')) {
				$customerGroup = $customerGroup->load($id);
				if (!$customerGroup) {
					throw new \Exception("Invalid ID");
				}
				$this->getMessage()->setSuccess('Record Updated Successfully');
			} else {
				$customerGroup->createdDate = date('Y-m-d H:i:s');
				$this->getMessage()->setSuccess('Record Inserted Successfully');
			}
			$customerGroupData = $this->getRequest()->getPost('customergroup');
			$customerGroup->setdata($customerGroupData);
			if(!$customerGroup->save()) {
				
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$customergroupgrid = \Mage::getBlock('Admin\Customer\Group\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $customergroupgrid
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
			$customerGroup = \Mage::getModel('Customer\Group');
			if ($id = $this->getRequest()->getGet('id')) {
				$customerGroup = $customerGroup->load($id);
				if (!$customerGroup) {
					throw new \Exception("Invalid ID");
				}
			}
			if($customerGroup->delete()) {
				$this->getMessage()->setSuccess('Record Deleted Successfully');
				$customergroupgrid = \Mage::getBlock('Admin\Customer\Group\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $customergroupgrid
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
			} else {
				$this->getMessage()->setFailure('Something Went Wrong');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
}

?>