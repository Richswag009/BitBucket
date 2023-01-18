<?php
namespace APP;


  abstract class Products{
    
    protected $db;
    protected $sku;
    protected $name;
    protected $price;
    protected $type;
    protected $attributes;

    
    public function __construct($inputs,) 
    {
        $this->db = new Database();
        $this->sku = $inputs->sku;
        $this->name = $inputs->name;
        $this->price = $inputs->price;
        $this->type = $inputs->type;
        $this->attributes = $inputs->attributes;

     
    }

    
    // getters
    public function getSku(){
        return $this->sku;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getType(){
        return $this->type;
    }
    public function getAttributes(){
        return $this->attributes;
    }
 

    // setters
    // public function setSku($sku){
    //     $this->sku =$sku;
    // }
    // public function setName($name){
    //     $this->name=$name;
    // }
    // public function setPrice($price){
    //     $this->price=$price;
    // }
    // public function setType($type){
    //     $this->type=$type;
    // }
 


     
    //   insert all data
    public  function create(){
        if($this->skuExists()){
            echo 'sku value must be Unique';
        }else{
        $this->db->query("INSERT INTO products(sku ,name, price,type,attributes)VALUES (:sku ,:name, :price,:type,:attributes)");  
        $this->db->bind(':sku',$this->getSku());
        $this->db->bind(':name',$this->getName());
        $this->db->bind(':price',$this->getPrice());
        $this->db->bind(':type',$this->getType());
        $this->db->bind(':attributes',$this->getAttributes());
        return $this->db->execute();
            
        }
        
        
        
       
    }


    // get  all products
    // Note: used static function to be able to instantiate it without creating an instance of the class first.
    
    public static  function viewProducts(){ 
        $db = new Database();     
        $db->query("SELECT *  FROM products");
        return $db->resultSet();     
    }
    



    // delete products
    // Note: use static function to be able to instantiate it without creating an instance of the class first.
      public static function delete($sku){
        $db = new Database();     

         for($i=0; $i<count($sku); $i++){   
            $db->query("DELETE  FROM products where sku = :sku");
            $db->bind('sku',$sku[$i]);
            if($db->execute()){
                return true;
            }else{
                return false;
            }

         }
    }
      public  function skuExists(){
      $this->db->query('SELECT sku FROM products WHERE sku = :sku');
      $this->db->bind(':sku',$this->getSku());
      return $this->db->singleCount();
     
       
    }


















}