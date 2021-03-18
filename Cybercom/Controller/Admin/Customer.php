<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Customer extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$customergrid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $customergrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$customer = \Mage::getModel('Customer');
		if ($id = $this->getRequest()->getGet('id')) {
			$customer = $customer->load($id);
			if (!$customer) {
				throw new \Exception("Data Not Found");
			}
		}

		$customergrid = \Mage::getBlock('Admin\Customer\Edit')->setTableRow($customer)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $customergrid
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
			$customer = \Mage::getModel('Customer');
			if (!$this->getRequest()->getGet('tab') == 'information') {
				if ($id = $this->getRequest()->getGet('id')) {
					$customer = $customer->load($id);
					if (!$customer) {
						throw new \Exception("Customer Not Found");
					}
					$customer->updatedDate = date("Y-m-d H:i:s");
					$this->getMessage()->setSuccess('Updated Successfully.');
				} else {
					$customer->createdDate = date("Y-m-d H:i:s");
					$this->getMessage()->setSuccess('Inserted Successfully.');
				}
				$customerData = $this->getRequest()->getPost('customer');
				$customer->setData($customerData);
				$customer->password = md5($customer->password);
				if ($customer->save()) {
					if (!$id = $this->getRequest()->getGet('id')) {
						$billing = \Mage::getModel('Customer\Address');
						$shipping = \Mage::getModel('Customer\Address');
						$billing->customerId = $customer->customerId;
						$billing->addressType = '1';
						$shipping->customerId = $customer->customerId;
						$shipping->addressType = '2';
						if ($billing->save()) {
							if (!$shipping->save()) {
								echo "Record Not Inserted";
							}
						}
					}
				} 
				else 
				{
					echo "Record Not Inserted";
				}
			} 
			else
			{
				if ($id = $this->getRequest()->getGet('id')) {
					$customer = $customer->load($id);
					if (!$customer) {
						throw new \Exception("Customer Not Found");
					}
				}
				$billing = \Mage::getModel('Customer\Address');
				$shipping = \Mage::getModel('Customer\Address');
				if ($id = $this->getRequest()->getGet('id')) {
					$sql = "select * from customer_address where customerId = {$id} and addressType = 1";
					$billing = $billing->fetchRow($sql);
					if (!$billing) {
						$billing = \Mage::getModel('Customer\Address');
					}
			
					$sql = "select * from customer_address where customerId = {$id} and addressType = 2";
					$shipping = $shipping->fetchRow($sql);
					if (!$shipping) {
						$shipping = \Mage::getModel('Customer\Address');
					}
					$billingData = $this->getRequest()->getPost('billing');
					$billing->setData($billingData);
					$billing->customerId = $customer->customerId;
					$billing->addressType = '1';

					$shippingData = $this->getRequest()->getPost('shipping');
					$shipping->setData($shippingData);
					$shipping->customerId = $customer->customerId;
					$shipping->addressType = '2';

					$this->getMessage()->setSuccess('Updated Successfully.');

					if ($billing->save()) {
						if (!$shipping->save()) {
							echo "Record Not Inserted";
						}
					}
				}
			}
			$customergrid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'Ok',
				'elements' => [
					[
						'selector' => '#contentHtml',
						'html' => $customergrid
					]
				]
			];
			header('Content-type:application/json');
			echo json_encode($response); 
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
			$customer = \Mage::getModel('Customer');
			$customer->load($id);
			if($customer->delete()) {
				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');
				
				$customergrid = \Mage::getBlock('Admin\Customer\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $customergrid
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