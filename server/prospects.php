<?php

require_once ('BLL.php');

class prospects  {
    private $id;
    private $prospect_name;
    private $prospect_phone;
    private $lead_id;

    public static $table_name = 'prospects';
    public static $isOK = false;



    function __construct ($id, $prospect_name,$prospect_phone,$lead_id) {
            $this->id = $id;
            $this->prospect_name = $prospect_name;
            $this->prospect_phone = $prospect_phone;
            $this->lead_id = $lead_id;
            }



        public function getID(){
        return $this->id;
        }

        public function getProspectName(){
        return $this->lead_name;
        }

        public function getProspectPhone(){
        return $this->lead_phone;
        }

        public function getLeadID(){
        return $this->product_id;
        }

        public function setProspectName(){
        $this->lead_name = $lead_name;
        }

        public function setProspectPhone(){
        $this->lead_Phone = $lead_phone;
        }
        public function setLeadId(){
        $this->product_id = $product_id;
        }



// Get lead table from db
   public static function GetAllProspects() {
    $allProspects = array();
        $Prospects =  BusinessLogicLayer::SelectAllFromTable(self::$table_name);
        for($i=0; $i<count($Prospects); $i++) {
        array_push($allProspects, new prospects($Prospects[$i]['id'],$Prospects[$i]['prospect_name'], $Prospects[$i]['prospect_phone'], $Prospects[$i]['lead_id']));
       }
        return $Prospects; 
    }



// Check if a id exists in data base
    public static function CheckId($id){
    $exists = BusinessLogicLayer::Check_if_id_exists(self::$table_name, $id);
     return json_encode(($exists == true ? true : false));
    }

// updates leads table
    public function UpdateProspects($id, $name, $phone, $lead_id){
        $this->id = $id;
        $this->prospect_name = $name;
        $this->prospect_phone = $phone;
        $this->lead_id = $lead_id;
        $updateValues= "prospect_name = '".$this->prospect_name."' , prospect_phone =  ".$this->prospect_phone.", lead_id = ".$this->lead_id;
        $update = BusinessLogicLayer::update_table(self::$table_name, $id, $updateValues);
    self::checkIsWasGood($update);
}
 

// Creates a new Prospect in the Prospect table
 public function CreateProspect($name, $phone, $lead_id){
        $this->prospect_name = $name;
        $this->prospect_phone = $phone;
        $this->lead_id = $lead_id;
        $column="prospect_name, prospect_phone, lead_id";
        $values=":prospect_name, :prospect_phone, :lead_id";
        $exicute = array(
                "prospect_name"=>$this->prospect_name,
                "prospect_phone"=>$this->prospect_phone,
                "lead_id"=>$this->lead_id);
        $update = BusinessLogicLayer::create_new_row(self::$table_name, $column, $values, $exicute);
    return self::checkIsWasGood($update);


}


// Deletes a row from lead table
public static function DeleteProspect($id) {
        $deleted =  BusinessLogicLayer::DeleteRow(self::$table_name, $id);
        return self::checkIsWasGood($deleted);

}

//  function that chaeks if the sql returnd a true or false resulte
public static function checkIsWasGood($update) {
        self::$isOK = ($update == true ? 'true' : 'false');
        return self::$isOK;

}


}


        

   


