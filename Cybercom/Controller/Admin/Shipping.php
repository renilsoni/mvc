<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Shipping extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$shippinggrid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $shippinggrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$shipping = \Mage::getModel('Shipping');
		if ($id = $this->getRequest()->getGet('id')) {
			$shipping = $shipping->load($id);
			if (!$shipping) {
				throw new \Exception("Data Not Found");
			}
		}

		$shippingedit = \Mage::getBlock('Admin\Shipping\Edit')->setTableRow($shipping)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $shippingedit
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
			$shipping = \Mage::getModel('Shipping');
			if ($id = $this->getRequest()->getGet('id')) {
				$shipping = $shipping->load($id);
				if (!$shipping) {
					throw new \Exception("Data Not Found");
				}
				$this->getMessage()->setSuccess('Updated Successfully.');
			} else {
				$this->getMessage()->setSuccess('Inserted Successfully.');
			}
			
			$shippingData = $this->getRequest()->getPost('shipping');
			$shipping->setData($shippingData);
			if ($shipping->save()) {
				$shippinggrid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $shippinggrid
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
			$shipping = \Mage::getModel('Shipping');
			$shipping->load($id);
			if($shipping->delete()) {
				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');
								
				$shippinggrid = \Mage::getBlock('Admin\Shipping\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $shippinggrid
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
			} else {
				$this->getMessage()->setFailure('Record Not Deleted');
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}
}

 ?>