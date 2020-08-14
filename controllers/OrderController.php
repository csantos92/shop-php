<?php

require_once 'models/orderModel.php';

class orderController{

    public function make(){

        require_once 'views/order/make.php';
    }

    public function add(){
        if(isset($_SESSION['user'])){
            $user_id = $_SESSION['user']->id;
            $province = isset($_POST['province']) ? $_POST['province'] : false;
            $location = isset($_POST['location']) ? $_POST['location'] : false;
            $address = isset($_POST['address']) ? $_POST['address'] : false;

            $stats = Utils::statsChart();
            $cost = $stats['total'];

            if($province && $location && $address){
                $order = new Order();
                $order->setProvince($province);
                $order->setLocation($location);
                $order->setAddress($address);
                $order->setUser_id($user_id);
                $order->setCost($cost);

                $save = $order->save();
				$save_line = $order->save_line();
				
				if($save && $save_line){
					$_SESSION['order'] = "completed";
				}else{
					$_SESSION['order'] = "failed";
				}

            }else{
                $_SESSION['order'] = 'failed';
            }

            header("Location:".base_url.'order/confirmed');	

        }else{
            header('Location:'.base_url);
        }
    }

    public function confirmed(){
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
            $order = new Order();
            $order->setUser_id($user->id);

            $order = $order->getOneByUser();

            $order_products = new Order();
            $products = $order_products->getProductsByOrder($order->id);
        }


        require_once 'views/order/confirmed.php';
    }

    public function my_orders(){
        Utils::isLogged();
		$user_id = $_SESSION['user']->id;
		$order = new Order();
		
		// Sacar los pedidos del usuario
		$order->setUser_id($user_id);
		$orders = $order->getAllByUser();
		
		require_once 'views/order/my_orders.php';
    }
    
    public function detail(){
        Utils::isLogged();

		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			// Sacar el pedido
			$order = new Order();
			$order->setId($id);
			$order = $order->getById();
			
			// Sacar los poductos
			$order_products = new Order();
			$products = $order_products->getProductsByOrder($id);
			
			require_once 'views/order/detail.php';
		}else{
			header('Location:'.base_url.'order/my_orders');
		}
    }

	public function management(){
		Utils::isAdmin();
		$management = true;
		
		$order = new Order();
		$orders = $order->getAll();
		
		require_once 'views/order/my_orders.php';
	}
	
	public function status(){
		Utils::isAdmin();
		if(isset($_POST['order_id']) && isset($_POST['status'])){
			// Recoger datos form
			$id = $_POST['order_id'];
			$status = $_POST['status'];
			
			// Upadate del pedido
			$order = new Order();
			$order->setId($id);
			$order->setStatus($status);
			$order->edit();
			
			header("Location:".base_url.'order/detail&id='.$id);
		}else{
			header("Location:".base_url);
		}
	}
}