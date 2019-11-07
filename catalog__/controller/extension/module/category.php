<?php
class ControllerExtensionModuleCategory extends Controller {
	public function index() {
		$this->load->language('extension/module/category');

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			$children_data = array();

			if ($category['category_id'] == $data['category_id']) {
				$children = $this->model_catalog_category->getCategories($category['category_id']);
//                                echo '<pre>';
                                
				foreach($children as $child) {
                                    
                                    $children3 = $this->model_catalog_category->getCategories($child['category_id']);
                                    $children_data3 = array();
                                    if($children3 and $child['category_id'] == $data['child_id']){
//                                        var_dump($children3);die();
                                        
                                        foreach($children3 as $child3) {
                                            //$filter_data = array('filter_category_id' => $child3['category_id'], 'filter_sub_category' => true);
    //                                        
                                            $children_data3[] = array(
                                                'category_id' => $child3['category_id'],
                                                'name' => $child3['name'],
                                                'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child3['category_id'])
                                            );
                                        }
                                    }
                                    
					$filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);
                                        
					$children_data[] = array(
						'category_id' => $child['category_id'],
						'name' => $child['name'],
                                                //'children'    => $children_data3,
						'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}
			}

			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'name'        => $category['name'],
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);
		}

		return $this->load->view('extension/module/category', $data);
	}
}