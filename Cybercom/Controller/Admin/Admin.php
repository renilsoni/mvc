<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Admin extends \Controller\Core\Admin
{
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$admingrid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $admingrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$admin = \Mage::getModel('Admin');
		if ($id = $this->getRequest()->getGet('id')) {
			$admin = $admin->load($id);
			if (!$admin) {
				throw new \Exception("Data Not Found");
			}
		}
		$adminedit = \Mage::getBlock('Admin\Admin\Edit')->setTableRow($admin)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $adminedit
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function saveAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid ID");
			}
			$admin = \Mage::getModel('Admin');
			if ($id = $this->getRequest()->getGet('id')) {
				$admin = $admin->load($id);
				if (!$admin) {
					throw new \Exception("Admin Not Found");
				}
				$this->getMessage()->setSuccess('Updated Successfully.');
			} else {
				$admin->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Inserted Successfully.');
			}
			$adminData = $this->getRequest()->getPost('admin');
			$admin->setData($adminData);
			$admin->password = md5($admin->password);
			if ($admin->save()) {
				$admingrid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $admingrid
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
			} else {
				echo "Record Not Inserted";
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function deleteAction()
	{
		try {
			$id = $this->getRequest()->getGet('id');
			if (!$id) {
				throw new \Exception("ID Invalid.");
			}
			$admin = \Mage::getModel('Admin');
			$admin->load($id);
			if($admin->delete()) {
				$admingrid = \Mage::getBlock('Admin\Admin\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $admingrid
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