<?php
class ControllerCommonMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');

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
