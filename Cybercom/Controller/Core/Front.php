<?php 
namespace Controller\Core;
class Front
{
	public static function init()
	{
		$request = \Mage::getModel('Core\Request');
		$controllerName = ucfirst($request->getControllerName());
		$actionName = $request->getActionName()."Action";
		$controller = \Mage::getController($controllerName);
		$controller->$actionName();
	}
}

?>