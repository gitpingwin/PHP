<?php

$app = new Phalcon\Mvc\Micro();

$app->get('/{name}', function ($name) {
    
    //Create a response
    $response = new Phalcon\Http\Response();
    
    $response->setContentType('application/json', 'UTF-8');
    
    if($name == "true")
    {
        $response->setJsonContent(array(
            'status' => 'success',
            'data' => '',
            'message' => ''
            ));
    }
    else
    {
        $response->setJsonContent(array(
            'status' => 'error',
            'data' => '',
            'message' => ''
            ));
    }
    
    return $response;
});

$app->handle();

