<?php
class ControllerCommonMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');
                
                $this->load->model('catalog/information');
                $information_total = $this->model_catalog_information->getInformations();
//                echo '<pre>';
//                var_dump($information_total);die();
                $data['informationtotal'] = $information_total;
                $data['hrefmnu'] = $this->url->link('information/information&information_id=');
                
		$data['home'] = $this->url->link('common/home');
		$data['our_services'] = 'http://ulprof.ru';
		$data['contact'] = $this->url->link('information/information&information_id=6');
		$data['about_company'] = $this->url->link('information/information&information_id=3');
		$data['hrefcart'] = $this->url->link('checkout/cart', '', true);
		$data['cart'] = $this->load->controller('common/cart');
		$data['search'] = $this->load->controller('common/search');

		return $this->load->view('common/menu', $data);
	}
}
