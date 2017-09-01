<?php
require ('leads.php');
require ('customers.php');
require ('products.php');
require ('professions.php');
require ('prospects.php');
require ('validation.php');


// check if a request was sent from client and saves it's value
    if(isset($_REQUEST['q'])) {
        $getvalue = $_REQUEST['q'];
    }
    else
    {
        die();
    }
 $id = trim($_REQUEST['id']);
 $name = trim($_REQUEST['name']);
 $phone = trim($_REQUEST['phone']);
 $product_id = trim($_REQUEST['product_id']);




//    $getvalue='select';
switch ($getvalue) {
    
        case 'select':
        echo json_encode(leads::GetAllLeads());
        break;

        case 'selectProspects':
        echo json_encode(prospects::GetAllProspects());
        break;


        case 'id':
        echo leads::CheckId($id);
        break;

        case 'getProducts':
        echo json_encode(products::GetProductsSelect());
        break;


        case 'update':
        if (Validat::isNumber($id) &&
        Validat::NotNull($name) &&
        Validat::isNumber($phone) &&
        Validat::optionSelected($product_id))
        {
                $update = new leads($id, $name, $phone, $product_id);
                $update->UpdateLead($id, $name, $phone, $product_id);
                $OK = leads::$isOK;
                echo json_encode($OK);
        }
        else {
                echo json_encode("input error");
        }

        break;

        case 'create':
        if (Validat::NotNull($name) &&
        Validat::isNumber($phone) &&
        Validat::optionSelected($product_id))
        {
                $create = new leads(0, $name, $phone, $product_id);
                $create->CreateLead($name, $phone, $product_id);
                $OK = leads::$isOK;
                echo json_encode($OK);
        }
        else {
                echo json_encode("input error");
        }     

        break;

        case 'delete':
        echo leads::DeleteLead($id);
        break;







}





    // case 'all': 
        // return  street::innerJoin();
        // break;

        // case 'insert': 
        // $name = ($_REQUEST['name']);
        // $V_id = ($_REQUEST['id']);

        // $addStreet = new street($name, $V_id);
        // $addStreet = $addStreet->insert($name, $V_id);
        // if ($addStreet) echo "added!";
        // else echo "error!";
        // break;
   
       


         

