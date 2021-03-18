<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class CmsPage extends \Controller\Core\Admin
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$cmsGrid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $cmsGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$cmsPage = \Mage::getModel('CmsPage');
		if ($id = $this->getRequest()->getGet('id')) {
			$cmsPage = $cmsPage->load($id);
			if (!$cmsPage) {
				throw new \Exception("Data Not Found");
			}
		}

		$csmEdit = \Mage::getBlock('Admin\CmsPage\Edit')->setTableRow($cmsPage)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $csmEdit
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
			$cmsPage = \Mage::getModel('CmsPage');
			if ($id = $this->getRequest()->getGet('id')) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("Invalid ID");
				}
				$this->getMessage()->setSuccess('Record Updated Successfully');
			} else {
				$cmsPage->createdDate = date('Y-m-d H:i:s');
				$this->getMessage()->setSuccess('Record Inserted Successfully');
			}
			$cmsPageData = $this->getRequest()->getPost('cmspage');
			$cmsPage->setdata($cmsPageData);
			if(!$cmsPage->save()) {
				
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		$cmsGrid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'Ok',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $cmsGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function deleteAction()
	{
		try {
			$cmsPage = \Mage::getModel('CmsPage');
			if ($id = $this->getRequest()->getGet('id')) {
				$cmsPage = $cmsPage->load($id);
				if (!$cmsPage) {
					throw new \Exception("Invalid ID");
				}
			}
			if($cmsPage->delete()) {
				$this->getMessage()->setSuccess('Record Deleted Successfully');
				$cmsGrid = \Mage::getBlock('Admin\CmsPage\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'Ok',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $cmsGrid
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