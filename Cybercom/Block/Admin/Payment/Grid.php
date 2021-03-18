<?php 
namespace Block\Admin\Payment;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $payment = null;
	protected $payments = [];

	function __construct()
	{
		Parent::__construct();
		$this->setTemplate('./View/admin/payment/grid.php');
	}

	public function getPayment()
	{
		if (!$this->payment) {
			$this->setPayment();
		}
		return $this->payment;
	}

	public function setPayment($payment = null)
	{
		if (!$payment) {
			$payment = \Mage::getModel('Payment');
		}
		$this->payment = $payment;
		return $this;
	}

	public function getPayments()
	{
		if (!$this->payments) {
			$this->setPayments();
		}
		return $this->payments;
	}

	public function setPayments($payments = null)
	{
		if (!$payments) {
			$payment = $this->getPayment();
			$payments = $payment->fetchAll();
		}
		$this->payments = $payments;
		return $this;
	}
}

?>