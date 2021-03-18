<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Category extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		$categoryGrid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $categoryGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function formAction()
	{
		$category = \Mage::getModel('Category');
		if ($id = $this->getRequest()->getGet('id')) {
			$category = $category->load($id);
			if (!$category) {
				throw new \Exception("Data Not Found");
			}
		}

		$categoryEdit = \Mage::getBlock('Admin\Category\Edit')->setTableRow($category)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $categoryEdit
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
			$category = \Mage::getModel('Category');
			if ($id = $this->getRequest()->getGet('id')) {
				$category = $category->load($id);
				if (!$category) {
					throw new \Exception("Data Not Found");
				}
				$this->getMessage()->setSuccess('Updated Successfully.');
			} else {
				$this->getMessage()->setSuccess('Inserted Successfully.');
			}
			$categoryData = $this->getRequest()->getPost('category');
			$category->setData($categoryData);
			if ($category->save()) 
			{
				$category->createPath($category->categoryId);

				$categoryGrid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $categoryGrid
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
			$id = (int) $this->getRequest()->getGet('id');
			if(!$id) {
				throw new \Exception("ID Invalid");
			}
			$category = \Mage::getModel('Category');
			$category->load($id);

			$categoryId = $category->categoryId;
			$parentId = $category->parentId;

			if($category->delete()) {

				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');

				$category->setParent($parentId, $categoryId);

				$categoryGrid = \Mage::getBlock('Admin\Category\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $categoryGrid
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