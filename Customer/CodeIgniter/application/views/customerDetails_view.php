<?php defined('BASEPATH') OR exit('No direct script access allowed');
    $row = $result->row();
    $details = array(
        "CustomerName" => $row->CustomerName,
        "Gender"=> $row->Gender,
        "Username" => $row->Username,
        "Address" => $row->Address,
        "Zipcode" => $row->PinCode,
        "EmailAddress" => $row->EmailAddress,
        "ContactNumber" => $row->ContactNumber,
        "CreditCardNumber" => $row->CreditCardNumber,
        "CreditCardName" => $row->CreditCardName,
        "CreditCardExpiry" => $row->CreditCardExpiry
    );
    echo json_encode($details);
?>