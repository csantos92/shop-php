<?php 

class Product{
    private $id;
    private $category;
    private $name;
    private $description;
    private $price;
    private $stock;
    private $offer;
    private $date;
    private $image;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }

    //Getters

    function getId(){return $this->id;}

    function getCategory(){return $this->category;}

    function getName(){return $this->name;}

    function getDescription(){return $this->description;}

    function getPrice(){return $this->price;}

    function getStock(){return $this->stock;}

    function getOffer(){return $this->offer;}

    function getDate(){return $this->date;}

    function getImage(){return $this->image;}

    //Setters

    function setId($id){$this->id = $id;}
    
    function setCategory($category){$this->category = $category;}

    function setName($name){$this->name = $this->db->real_escape_string($name);}

    function setDescription($description){$this->description = $this->db->real_escape_string($description);}

    function setPrice($price){$this->price = $this->db->real_escape_string($price);}

    function setStock($stock){$this->stock = $this->db->real_escape_string($stock);}

    function setOffer($offer){$this->offer = $this->db->real_escape_string($offer);}

    function setDate($date){$this->date = $date;}

    function setImage($image){$this->image = $image;}

    //Methods

    public function getAll(){
        $products = $this->db->query("SELECT * FROM products ORDER BY id DESC");
        return $products;
    }

    public function getAllCategory(){
        $sql = "SELECT p.*, c.name AS 'catname' FROM products p "
                .   "INNER JOIN categories c ON c.id = p.category_id "
                .   "WHERE p.category_id = {$this->getCategory()} "
                .   "ORDER BY id DESC";
        $products = $this->db->query($sql);
        return $products;
    }

    public function getById(){
        $product = $this->db->query("SELECT * FROM products WHERE id = {$this->id}");
        return $product->fetch_object();
    }

    public function getRandom($limit){
        $product = $this->db->query("SELECT * FROM products ORDER BY RAND() LIMIT $limit");
        return $product;
    }

    public function save(){
        $sql = "INSERT INTO products VALUES(null, {$this->getCategory()}, '{$this->getName()}', '{$this->getDescription()}', {$this->getPrice()}, {$this->getStock()}, null, CURDATE(), '{$this->getImage()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit(){
		$sql = "UPDATE productos SET name='{$this->getName()}', description='{$this->getDescription()}', price={$this->getPrice()}, stock={$this->getStock()}, category_id={$this->getCategory()}  ";
		
		if($this->getImage() != null){
			$sql .= ", image='{$this->getImage()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }

    public function delete(){
        $sql = "DELETE FROM products WHERE id={$this->id}";
        $delete = $this->db->query($sql);

        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }
}