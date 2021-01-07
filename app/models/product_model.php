<?php 

class Product_model {

    private $table = 'product';

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProduct()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getProductByName($name)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE P_name=:name_product');

        $this->db->bind('name_product',$name);
        return $this->db->single();
    }

    public function getProductById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE P_name=:id_product');
        $this->db->bind('id_product',$id);
        return $this->db->single();
    }

    public function tambahDataProduct($data)
    {
        $query = "INSERT INTO ".$this->table."
                    VALUES('', :P_name,:P_mfdate,:P_expdate,:P_price,:P_suplier,:P_sell,:P_stock)";
        $this->db->query($query);
        $this->db->bind('P_name',$data['P_name']);
        $this->db->bind('P_mfdate',$data['P_mfdate']);
        $this->db->bind('P_expdate',$data['P_expdate']);
        $this->db->bind('P_price',$data['price']);
        $this->db->bind('P_suplier',$data['P_suplier']);
        $this->db->bind('P_sell',$data['P_sell']);
        $this->db->bind('P_stock',$data['P_stock']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataProduct($data,$condition)
    {
        $P_name = "";
        $P_mfdate = "";
        $P_expdate = "";
        $P_price = "";
        $P_suplier = "";
        $P_sell = "";
        $P_stock = "";
        
        $query = "UPDATE ". $this->table." SET ";

        if($condition == "P_name")
        {
            $string = "item";
            $rowCount = $_POST["rowCount"];
            for($i=1;$i<=$_POST['rowCount'];$i++){
                $name = $string."{$i}"."-"."name";
                $quantity = $string."{$i}"."-"."quantity";
                $quantityValue = $this->getProductByName($_POST[$name])["P_stock"];
                $quantity = $quantityValue - intval($_POST[$quantity]);
                $query.="P_stock = '$quantity'";
                $this->db->query($query);
                $this->db->execute();
                return $this->db->rowCount();
            }
        }
        
    }
}
