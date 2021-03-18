<?php 
namespace Controller\Admin\Product;

\Mage::loadFileByClassName('Controller\Core\Admin');

class Media extends \Controller\Core\Admin
{

	function __construct()
	{
		parent::__construct();
	}
	
	public function uploadFileAction()
	{
		$product = \Mage::getModel('Product');
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("Data Not Found");
			}
		}

		$data = $_FILES;
		$location = $_SERVER['DOCUMENT_ROOT']."/Cybercom/uploads/";
		if (isset($_FILES['file']['name'])) {
			$name = $_FILES['file']['name'];
			$type = $_FILES['file']['type'];
			$temp_name = $_FILES['file']['tmp_name'];
			$extension = pathinfo($name,PATHINFO_EXTENSION);
			if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
				if (move_uploaded_file($temp_name, $location.$name)) {
					$productMedia = \Mage::getModel('Product\Media');
					$productMedia->productId = $this->getRequest()->getGet('id');
					$productMedia->path = $name;
					$productMedia->save();

					$mediaGrid = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();
					$response = [
						'status' => 'success',
						'message' => 'I m excellent',
						'elements' => [
							[
								'selector' => '#editContent',
								'html' => $mediaGrid
							]
						]
					];
					header('Content-type:application/json');
					echo json_encode($response);
				} else {
					echo "Image Not Uploaded";
				}
			} else {
				echo "Wrong Extension";
			}
		}
	}

	public function updateMediaAction()
	{
		$product = \Mage::getModel('Product');
		if ($id = $this->getRequest()->getGet('id')) {
			$product = $product->load($id);
			if (!$product) {
				throw new \Exception("Data Not Found");
			}
		}

		$label = $this->getRequest()->getPost('label');
		$small = $this->getRequest()->getPost('small');
		$base = $this->getRequest()->getPost('base');
		$thumb = $this->getRequest()->getPost('thumb');
		$gallery = $this->getRequest()->getPost('gallery');

		$media = \Mage::getModel('Product\Media');

		foreach ($label as $key => $value) {
			$media->load($key);

			$media->label = $value;

			if ($small == $key) {
				$media->small = 1;
			} else {
				$media->small = 0;
			}

			if ($base == $key) {
				$media->base = 1;
			} else {
				$media->base = 0;
			}

			if ($thumb == $key) {
				$media->thumb = 1;
			} else {
				$media->thumb = 0;
			}

			if (array_key_exists($key, $gallery)) {
				$media->gallery = 1;
			} else {
				$media->gallery = 0;
			}
			//print_r($media);
			$media->save();
		}
		
		$mediaGrid = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();
		$response = [
			'status' => 'success',
			'message' => 'I m excellent',
			'elements' => [
				[
					'selector' => '#editContent',
					'html' => $mediaGrid
				]
			]
		];
		header('Content-type:application/json');
		echo json_encode($response);
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
			$mediaGrid = \Mage::getBlock('Admin\Product\Edit\Tabs\Media')->setTableRow($product)->toHtml();
			$response = [
				'status' => 'success',
				'message' => 'I m excellent',
				'elements' => [
					[
						'selector' => '#editContent',
						'html' => $mediaGrid
					]
				]
			];
			header('Content-type:application/json');
			echo json_encode($response);
	}
}

 ?>