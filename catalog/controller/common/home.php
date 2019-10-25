<?php
class ControllerCommonHome extends Controller {
	public function index() {
		$this->load->language('common/home');

		$this->document->setTitle($this->config->get('config_meta_title'));
		$this->document->setDescription($this->config->get('config_meta_description'));
		$this->document->setKeywords($this->config->get('config_meta_keyword'));

		if (isset($this->request->get['route'])) {
			$this->document->addLink($this->config->get('config_url'), 'canonical');
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		$this->load->model('catalog/category');

		$this->load->model('tool/image');

		$data['categories'] = array();
		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			$image = '';

			if ($category['image']) {
				$image = $this->model_tool_image->resize($category['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_product_height'));
			}

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'thumb' 	  => $image,
				'name'        => $category['name'],
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id'])
			);
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/home', $data));
	}
}
