<?php

class chartController{
    
    public function index(){
        if(isset($_SESSION['chart']) && count($_SESSION['chart']) >= 1){
			$chart = $_SESSION['chart'];
		}else{
			$chart = array();
		}
        
        require_once 'views/chart/index.php';
    }

    public function add(){
        require_once 'models/productModel.php';

		if(isset($_GET['id'])){
			$product_id = $_GET['id'];
		}else{
			header('Location:'.base_url);
        }
        
		
		if(isset($_SESSION['chart'])){
			$counter = 0;
			foreach($_SESSION['chart'] as $index => $element){
				if($element['id_product'] == $product_id){
					$_SESSION['chart'][$index]['units']++;
					$counter++;
				}
			}	
		}
		
		if(!isset($counter) || $counter == 0){
			// Conseguir producto
			$product = new Product();
			$product->setId($product_id);
			$product = $product->getById();
            
			// Añadir al carrito
			if(is_object($product)){
				$_SESSION['chart'][] = array(
					"id_product" => $product->id,
					"price" => $product->price,
					"units" => 1,
					"product" => $product
				);
			}
		}
		
		header("Location:".base_url."chart/index");
    }

	public function delete(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			unset($_SESSION['chart'][$index]);
		}
		header("Location:".base_url."chart/index");
	}
	
	public function up(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['chart'][$index]['units']++;
		}
		header("Location:".base_url."chart/index");
	}
	
	public function down(){
		if(isset($_GET['index'])){
			$index = $_GET['index'];
			$_SESSION['chart'][$index]['units']--;
			
			if($_SESSION['chart'][$index]['units'] == 0){
				unset($_SESSION['chart'][$index]);
			}
		}
		header("Location:".base_url."chart/index");
	}

    public function delete_all(){
        unset($_SESSION['chart']);
        header("Location:".base_url."chart/index");
    }
}