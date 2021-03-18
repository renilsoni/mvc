<?php 
namespace Controller\Admin;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Product extends \Controller\Core\Admin
{
	function __construct()
	{
		parent::__construct();
	}

	public function gridAction()
	{
		try {
			$productGrid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
			$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $productGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function formAction()
	{
		try {
			$product = \Mage::getModel('Product');
			if ($id = $this->getRequest()->getGet('id')) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("Data Not Found");
				}
			}

			$productEdit = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'I m excellent',
				'elements' => [
					[
						'selector' => '#contentHtml',
						'html' => $productEdit
					]
				]
			];
			header('Content-type:application/json');
			echo json_encode($response);

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function saveAction()
	{
		try {
			if (!$this->getRequest()->isPost()) {
				throw new \Exception("Invalid ID");
			}
			$product = \Mage::getModel('Product');
			
			if ($id = $this->getRequest()->getGet('id')) {
				$product = $product->load($id);
				if (!$product) {
					throw new \Exception("Product Not Found");
				}
				$product->updatedDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Updated Successfully.');
			} else {
				$product->createdDate = date("Y-m-d H:i:s");
				$this->getMessage()->setSuccess('Inserted Successfully.');
			}
			$productData = $this->getRequest()->getPost('product');

			foreach ($productData as &$productDeatils) {
				if (is_array($productDeatils)) {
					$productDeatils = implode(',', $productDeatils);
				}
			}

			$product->setData($productData);

			if ($product->save()) {
				$productGrid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $productGrid
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
			$product = \Mage::getModel('Product');
			$product->load($id);
			if($product->delete()) {
				$this->getMessage()->setSuccess('Record Deleted Successfully !!!');
				$productGrid = \Mage::getBlock('Admin\Product\Grid')->toHtml();
				$response = [
					'status' => 'success',
					'message' => 'I m excellent',
					'elements' => [
						[
							'selector' => '#contentHtml',
							'html' => $productGrid
						]
					]
				];
				header('Content-type:application/json');
				echo json_encode($response);
			} else {
				$this->getMessage()->setFailure('Unable To Delete Record.');		
			}
		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
	}

	public function deleteMediaAction()
	{
		$product = \Mage::getModel('Product');
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("Data Not Found");
			}
		}

		$removeData = $this->getRequest()->getPost('remove');
		$location = $location = $_SERVER['DOCUMENT_ROOT']."/Cybercom/uploads/";
		$mediaModel = \Mage::getModel('Product\Media');
		foreach ($removeData as $key => $value) {
			$mediaModel->load($key);
			unlink($location.$mediaModel->path);
			$mediaModel->delete();
		}
			$mediaGrid = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'I m excellent',
				'elements' => [
					[
						'selector' => '#contentHtml',
						'html' => $mediaGrid
					]
				]
			];
			header('Content-type:application/json');
			echo json_encode($response);
	}

	public function groupPriceAction()
	{
		$product = \Mage::getModel('Product');
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("Data Not Found");
			}
		}

		$groupPriceData = $this->getRequest()->getPost('groupPrice');

		if (array_key_exists('exist', $groupPriceData)) {
			foreach ($groupPriceData['exist'] as $entityId => $price) {
				$groupPrice = \Mage::getModel('Product\GroupPrice');
				$groupPrice->load($entityId);
				$groupPrice->groupPrice = $price;
				$groupPrice->save();
			}
		}
		
		if (array_key_exists('new', $groupPriceData)) {
			foreach ($groupPriceData['new'] as $groupId => $price) {
				$groupPrice = \Mage::getModel('Product\GroupPrice');
				$groupPrice->customerGroupId = $groupId;
				$groupPrice->productId = $this->getRequest()->getGet('id');
				$groupPrice->groupPrice = $price;
				$groupPrice->save();
			}
		}

		$mediaGrid = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $mediaGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}

	public function productCategoryAction()
	{
		try {
			$categoriesData = $this->getRequest()->getPost('categories');
			$product = \Mage::getModel('Product');

			$productId = $this->getRequest()->getGet('id');
			if ($productId) {
				$product = $product->load($productId);
				if (!$product) {
					throw new \Exception("Data Not Found");
				}
			}

			$productCategory = \Mage::getModel('Product\Category');
			$sql = "DELETE FROM {$productCategory->getTableName()} WHERE productId = {$productId} AND categoryId NOT IN ( '" . implode( "', '" , $categoriesData ) . "' )";
			$productCategory->delete($sql);

			$sql = "SELECT `categoryId`,`productId` FROM {$productCategory->getTableName()} WHERE productId = {$productId}";
			$productCategories = $productCategory->getAdapter()->fetchPairs($sql);

			foreach ($categoriesData as $categoryId) {
				if (!array_key_exists($categoryId, $productCategories)) {
					$productCategory = \Mage::getModel('Product\Category');
					$productCategory->categoryId = $categoryId;
					$productCategory->productId = $productId;
					$productCategory->save();
				}
			}

		} catch (\Exception $e) {
			$this->getMessage()->setFailure($e->getMessage());
		}
		
		$productEdit = \Mage::getBlock('Admin\Product\Edit')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#contentHtml',
					'html' => $productEdit
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
	}
}

 ?>