<?php

require_once ('BLL.php');

class customers  {
    private $id;
    private $customer_name;
    private $customer_phone;
    private $customer_profession;
    private $prospect_id; 



    function __construct ($customer_name,$customer_phone,$customer_profession,$prospect_id) {
            $this->customer_name = $customer_name;
            $this->customer_phone = $customer_phone;
            $this->customer_profession = $customer_profession;
            $this->prospect_id = $prospect_id;


            }


   public static function GetAllCustomers() {

        // $customers = $DB->prepare('SELECT * FROM customers');
        // $customers->execute();
        // $customersCount = $customers->rowCount();
        // $i = 0;

        //     echo "[";
        //             while ($row = $customers->fetch()) 
        //     {
        //         echo "{";

        //         echo  '"id":';
        //         echo $row["id"];
        //         echo ",";

        //         echo '"customer_name":';
        //         echo '"';
        //         echo $row['customer_name'];
        //         echo '"';
        //         echo ",";

        //         echo '"customer_phone":';
        //         echo $row['customer_phone'];
        //         echo ",";
                
        //         echo '"customer_profession":';
        //         echo '"';
        //         echo $row['customer_profession'];
        //         echo '"';
        //         echo ",";


        //         echo '"prospect_id":';
        //         echo $row['prospect_id'];


        //         echo "}";
        //         if ($customersCount -1> $i)
        //             echo ",";
        //         $i++;
        //     }

        //     echo "]";

        }

        

   }


