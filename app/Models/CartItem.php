<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
    private $product;
	private $promotion_price;
	private $quantity;
	private $subTotal;
    

	public function __construct($product,$promotion_price,$quantity,$subTotal){
		$this->product = $product;
		$this->promotion_price = $promotion_price;
		$this->quantity = $quantity;
		$this->subTotal = $subTotal;
	}
	/*get,set product*/
	public function getProduct(){
		return $this->product;
	}
	public function setProduct($product){
		$this->product = $product;
	}
	/*get/set giá bán tại thời điểm*/
	public function getPriceSell(){
		return $this->promotion_price;
	}
	public function setPriceSell($promotion_price){
		$this->promotion_price = $promotion_price;
	}
	/*get,set số lượng product*/
	public function getQuantity(){
		return $this->quantity;
	}
	public function setQuantity($quantity){
		$this->quantity = $quantity;
	}
	/*get,set giá trị subtotal*/
	public function getSubTotal(){
		return $this->subTotal;
	}
	public function setSubTotal($subTotal){
		$this->subTotal = $subTotal;
	}
}
