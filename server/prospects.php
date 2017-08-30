<?php

require_once ('BLL.php');

class prospects  {
    private $id;
    private $prospect_name;
    private $prospect_phone;
    private $lead_id;



    function __construct ($prospect_name,$prospect_phone,$lead_id) {
            $this->prospect_namee = $prospect_name;
            $this->prospect_phone = $prospect_phone;
            $this->lead_id = $lead_id;

            }


   public static function GetAllProspects() {
    //    $DB = new connection();
    //    $DB = $DB->getDB();

    //     $prospects =  $DB->prepare('SELECT * FROM prospects');
    //     $prospects->execute();
    //     $prospectsCount = $prospects->rowCount();
    //     $i = 0;

    //         echo "[";
    //                 while ($row = $prospects->fetch()) 
    //         {
    //             echo "{";

    //             echo  '"id":';
    //             echo $row["id"];
    //             echo ",";

    //             echo '"prospect_name":';
    //             echo '"';
    //             echo $row['prospect_name'];
    //             echo '"';
    //             echo ",";

    //             echo '"prospect_phone":';
    //             echo $row['prospect_phone'];
    //             echo ",";
                

    //             echo '"lead_id":';
    //             echo $row['lead_id'];


    //             echo "}";
    //             if ($prospectsCount -1> $i)
    //                 echo ",";
    //             $i++;
    //         }

    //         echo "]";

        }

        

   }


