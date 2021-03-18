<?php 
namespace Controller\Core;
class Abstracts
{
	protected $request = NULL;
	protected $layout = NULL;
	protected $message = NULL;

	public function __construct()
	{
		$this->setRequest();
		$this->setMessage();
	}

	public function setLayout(\Block\Core\Layout $layout = null)
	{
		if (!$layout) {
			$layout = \Mage::getBlock('Core\Layout');
		}
		$this->layout = $layout;
		return $this;
	}

	public function getLayout()
	{
		if (!$this->layout) {
			$this->setLayout();
		}
		return $this->layout;
	}

	public function renderLayout()
	{
		echo $this->getLayout()->toHtml();
	}

	public function getRequest()
	{
		return $this->request;
	}
	public function setRequest()
	{
		$this->request = \Mage::getModel('Core\Request');
		return $this;
	}

	public function getUrl($actionName = NULL, $controllerName = NULL, $params = [], $resetparams = false)
	{
		$final = $this->getRequest()->getGet();

		if($resetparams) {
			$final = [];
		}

		if (!$controllerName) {
			$controllerName = $this->getRequest()->getControllerName();
		}

		if (!$actionName) {
			$actionName = $this->getRequest()->getActionName();
		}

		$final['c'] = $controllerName;
		$final['a'] = $actionName;

		if (is_array($params)) {
			$final = array_merge($final, $params);
		}
		$queryString = http_build_query($final);
		unset($final);

		return "http://localhost/Cybercom/index.php?{$queryString}";
	}

	public function redirect($actionName = NULL, $controllerName = NULL, $params = [], $resetparams = false)
	{
		header("Location: {$this->getUrl($actionName, $controllerName, $params, $resetparams)}");
	}

	public function setMessage()
	{
		$this->message = \Mage::getModel('Admin\Message');
		return $this;
	}

	public function getMessage()
	{
		return $this->message;
	}
}

 ?>