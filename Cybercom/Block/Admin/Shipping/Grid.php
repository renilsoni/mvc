<?php 
namespace Block\Admin\Shipping;

\Mage::loadFileByClassName('Block\Core\Template');

class Grid extends \Block\Core\Template
{
	protected $shipping = null;
	protected $shippings = [];

	function __construct()
	{
		Parent::__construct();
		$this->setTemplate('./View/admin/shipping/grid.php');
	}

	public function getShipping()
	{
		if (!$this->shipping) {
			$this->setShipping();
		}
		return $this->shipping;
	}

	public function setShipping($shipping = null)
	{
		if (!$shipping) {
			$shipping = \Mage::getModel('Shipping');
		}
		$this->shipping = $shipping;
		return $this;
	}

	public function getShippings()
	{
		if (!$this->shippings) {
			$this->setShippings();
		}
		return $this->shippings;
	}

	public function setShippings($shippings = null)
	{
		if (!$shippings) {
			$shipping = $this->getShipping();
			$shippings = $shipping->fetchAll();
		}
		$this->shippings = $shippings;
		return $this;
	}
}

?>