<?php
class ControllerCommonCart extends Controller {
	public function index() {
		$this->load->language('common/cart');

		$quantity = 0;

		foreach ($this->cart->getProducts() as $product) {

			$quantity += $product['quantity'];
		}

		$data['quantity'] = $quantity;


		$data['cart'] = $this->url->link('checkout/cart');

		return $this->load->view('common/cart', $data);
	}

	public function info() {
		$this->response->setOutput($this->index());
	}
}