<?php
use Phalcon\Mvc\Micro;
require 'connect.php';

$app = new Micro();

$app->get('/plate/{number}', function ($number) {
    
    // Create a JSON response
    $response = new Phalcon\Http\Response();
    $response->setContentType('application/json', 'UTF-8');
    
    // Get car id which has registration plate = $number
    $query = "SELECT auto_id FROM auto WHERE nr_rej = '$number'";
    $result = mysql_query($query) or die(mysql_error());

    // Get row number
    $nmbr = mysql_num_rows($result);
    
    // If no car is found with specified registration plate then
    if($nmbr == 0)
    {
        // Change the HTTP status
        $response = createJsonResponse(404,
                "Not found!",
                'Not found',
                null,
                "No registration plate in database!");
    }
    else // Check whether the found car has a valid subscription
    {
        // Change the HTTP status
        $response = createJsonResponse(302,
                "Found not valid subscription!",
                'Not valid',
                null,
                "Registration plate: $number has not valid subscription.");
        

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
                
                // Change the HTTP status
                $response = createJsonResponse(302,
                        "Found valid subscription!",
                        'valid',
                        null,
                        "Registration plate: $number has valid subscription.");
                
                return $response;
            }
        }
    }
    
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