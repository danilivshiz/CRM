<?php

require_once ('BLL.php');

class leads  {

    private $id;
    private $lead_name;
    private $lead_phone;
    private $product_id;

    public static $table_name = 'leads';
    public static $isOK = false;



    function __construct ($id,$lead_name,$lead_phone,$product_id) {
            $this->id = $id;
            $this->lead_name = $lead_name;
            $this->lead_phone = $lead_phone;
            $this->product_id = $product_id;

            }


        public function getID(){
        return $this->id;
        }

        public function getLeadName(){
        return $this->lead_name;
        }

        public function getLeadPhone(){
        return $this->lead_phone;
        }

        public function getProduct_ID(){
        return $this->product_id;
        }

        public function setLeadName(){
        $this->lead_name = $lead_name;
        }

        public function setLeadPhone(){
        $this->lead_Phone = $lead_phone;
        }
        public function setProductId(){
        $this->product_id = $product_id;
        }



// Get lead table from db
   public static function GetAllLeads() {
    $allLeads = array();
        $leads =  BusinessLogicLayer::SelectAllFromTable(self::$table_name);
        for($i=0; $i<count($leads); $i++) {
        array_push($allLeads, new leads($leads[$i]['id'],$leads[$i]['lead_name'], $leads[$i]['lead_phone'], $leads[$i]['product_id']));
       }
        return $leads; 
    }



// Check if a id exists in data base
    public static function CheckId($id){
    $exists = BusinessLogicLayer::Check_if_id_exists(self::$table_name, $id);
     return json_encode(($exists == true ? true : false));
    }

// updates leads table
    public function UpdateLead($id, $name, $phone, $product_id){
        $this->id = $id;
        $this->lead_name = $name;
        $this->lead_phone = $phone;
        $this->product_id = $product_id;
        $updateValues= "lead_name = '".$this->lead_name."' , lead_phone =  ".$this->lead_phone.", product_id = ".$this->product_id;
        $update = BusinessLogicLayer::update_table(self::$table_name, $id, $updateValues);
    self::checkIsWasGood($update);
}
 

// Creates a new lead in the leads table
 public function CreateLead($name, $phone, $product_id){
        $this->lead_name = $name;
        $this->lead_phone = $phone;
        $this->product_id = $product_id;
        $column="lead_name, lead_phone, product_id";
        $values=":lead_name, :lead_phone, :product_id";
        $exicute = array(
                "lead_name"=>$this->lead_name,
                "lead_phone"=>$this->lead_phone,
                "product_id"=>$this->product_id);
        $update = BusinessLogicLayer::create_new_row(self::$table_name, $column, $values, $exicute);
    return self::checkIsWasGood($update);


}


// Deletes a row from lead table
public static function DeleteLead($id) {
        $deleted =  BusinessLogicLayer::DeleteRow(self::$table_name, $id);
        return self::checkIsWasGood($deleted);

}

//  function that chaeks if the sql returnd a true or false resulte
public static function checkIsWasGood($update) {
        self::$isOK = ($update == true ? 'true' : 'false');
        return self::$isOK;

}



// Get Leads id and return a select
   public static function GetLeadsid() {
        $idList =  BusinessLogicLayer::SelectAllFromTable(self::$table_name);
        $leadSelect="";
    for ($i = 0; $i < count($idList); $i++) {
             $leadSelect .= "<option value=" . $idList[$i]["id"] . ">" . $idList[$i]["id"] . "</option>";
                }
    

        return $leadSelect; 
    }



}