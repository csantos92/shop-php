<?php

require_once 'models/categoryModel.php';
require_once 'models/productModel.php';

class categoryController{
    
    public function index(){
        Utils::isAdmin();

        $category = new Category();
        $categories = $category->getAll();

        require_once 'views/category/index.php';
    }

    public function create(){
        Utils::isAdmin();

        require_once "views/category/create.php";
    }

    public function show(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];

            $category = new Category();
            $category->setId($id);
            $category = $category->getById();

            $product = new Product();
            $product->setCategory($id);
            $products = $product-> getAllCategory();
        }

        require_once 'views/category/show.php';
    }

    public function save(){
        Utils::isAdmin();

        if(isset($_POST) && isset($_POST['name'])){
            $category = new Category();
            $category->setName($_POST['name']);
            $category->save();
        }

        header("Location:".base_url."category/index");
    }
}