<?php 

class Utils{

    public static function deleteSession($name){

        if(isset($_SESSION[$name])){
            $_SESSION[$name] == null;
            unset($_SESSION[$name]);     
        }
       
        return $name;
    }

    public static function isAdmin(){
        if(!isset($_SESSION['admin'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function isLogged(){
        if(!isset($_SESSION['user'])){
            header("Location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategories(){
        require_once 'models/categoryModel.php';

        $category = new Category();
        $categories = $category->getAll();

        return $categories;
    }

    public static function statsChart(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );

        if(isset($_SESSION['chart'])){
            $stats['count'] = count ($_SESSION['chart']);

            foreach($_SESSION['chart'] as $product){
                $stats['total'] += $product['price']*$product['units'];
            }
        }

        return $stats;
    }

    public static function showStatus($status){
		$value = 'Pendiente';
		
		if($status == 'confirm'){
			$value = 'Pendiente';
		}elseif($status == 'preparation'){
			$value = 'En preparación';
		}elseif($status == 'ready'){
			$value = 'Preparado para enviar';
		}elseif($status = 'sended'){
			$value = 'Enviado';
		}
		
		return $value;
	}
}