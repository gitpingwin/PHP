<?php
use Phalcon\Mvc\Micro;
require 'connect.php';

$app = new Micro();

$app->get('/plate/{number}', function ($number) {
        
    // Local variables
    $statusCode = 0;
    $statusMessage = "";
    $jsonStatus = "";
    $jsonData = null;
    $jsonMessage = "";
    
    // Get car id which has registration plate = $number
    $query = "SELECT auto_id FROM auto WHERE nr_rej = '$number'";
    $result = mysql_query($query) or die(mysql_error());

    // Get row number
    $nmbr = mysql_num_rows($result);
    
    // If no car is found with specified registration plate then
    if($nmbr == 0)
    {
        // Set the HTTP status
        $statusCode = 404;
        $statusMessage = "Not found!";
        $jsonStatus = 'Not found';
        $jsonData = null;
        $jsonMessage = "No registration plate in database!";
    }
    else // Check whether the found car has a valid subscription
    {
        // Set the HTTP status
        $statusCode = 302;
        $statusMessage = "Found not valid subscription!";
        $jsonStatus = 'Not found';
        $jsonData = null;
        $jsonMessage = "Registration plate: $number has not valid subscription.";
        
        $auto_row = mysql_fetch_array($result); 
        $id = $auto_row['auto_id'];
        
        // Get subscriptions which are for found car
        $query = "SELECT czy_aktywny FROM abonament WHERE auto_id = '$id'";
        $result = mysql_query($query) or die(mysql_error());

        while ($subscriptions = mysql_fetch_array($result)) 
        {
            $is_valid = $subscriptions['czy_aktywny'];
            
            // If found subscription is valid/active then
            if($is_valid == true)
            { 
                // Set the HTTP status
                $statusCode = 302;
                $statusMessage = "Found valid subscription!";
                $jsonStatus = "Valid";
                $jsonData = null;
                $jsonMessage = "Registration plate: $number has valid subscription.";

                break;
            }
        }
    }
    
    // Set response configuration.
    $response = createJsonResponse($statusCode, $statusMessage,
            $jsonStatus, $jsonData, $jsonMessage);
    
    // Return JSON response
    return $response;
});

$app->put('/ticket/{plate_number}', function ($plate_number) {
    
    // Create a JSON response
    $response = new Phalcon\Http\Response();
    $response->setContentType('application/json', 'UTF-8');
    
    $statusCode = 0;
    $statusMessage = "";
    $jsonStatus = "";
    $jsonData = null;
    $jsonMessage = "";
    
    
    // Set response configuration.
    $response = createJsonResponse($statusCode, $statusMessage,
            $jsonStatus, $jsonData, $jsonMessage);
    
    // Return JSON response
    return $response;
});



$app->handle();

// FUnction creates response based on arguments values.
function createJsonResponse(
        $statusCode,
        $statusMessage,
        $jsonStatus,
        $jsonData,
        $jsonMessage)
{
    // Create a JSON response
    $response = new Phalcon\Http\Response();
    $response->setContentType('application/json', 'UTF-8');
    $response->setStatusCode($statusCode, $statusMessage);
    $response->setJsonContent(array(
            'status' => $jsonStatus,
            'data' => $jsonData,
            'message' => $jsonMessage
            ));
    
    return $response;
}