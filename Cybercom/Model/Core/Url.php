<?php 
namespace Model\Core;

class Url
{
	protected $request = NULL;

	function __construct()
	{
		$this->setRequest();
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

	public function baseUrl($subUrl = null)
	{
		$url = "http://localhost/Cybercom/";
		if ($subUrl) {
			$url .= $subUrl;
		}
		return $url;
	}
}

?>