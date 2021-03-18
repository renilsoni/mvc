<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Payment extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$paymentgrid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $paymentgrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$payment = \Mage::getModel('Payment');
		if ($id = $this->getRequest()->getGet('id')) {
			$payment = $payment->load($id);
			if (!$payment) {
				throw new \Exception("Data Not Found");
			}
		}

		$paymentedit = \Mage::getBlock('Admin\Payment\Edit')->setTableRow($payment)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $paymentedit
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
			$payment = \Mage::getModel('Payment');
			if ($id = $this->getRequest()->getGet('id')) {
				$payment = $payment->load($id);
				if (!$payment) {
					throw new \Exception("Payment Not Found");
				}
				$this->getMessage()->setSuccess('Updated Successfully.');
			} else {
				$payment->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Inserted Successfully.');
			}
			$paymentData = $this->getRequest()->getPost('payment');
			$payment->setData($paymentData);
			if ($payment->save()) {
				$paymentgrid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $paymentgrid
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
			$payment = \Mage::getModel('Payment');
			$payment->load($id);
			if($payment->delete()) {
				$paymentgrid = \Mage::getBlock('Admin\Payment\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $paymentgrid
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