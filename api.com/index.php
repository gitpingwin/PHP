<?php

$app = new Phalcon\Mvc\Micro();

$app->get('/api/{name}', function ($name) {
    
    //Create a response
    $response = new Phalcon\Http\Response();
    
    $response->setJsonContent(array(
            'status' => 'FOUND',
            'data' => '133',
            'myname' => $name
            ));
    
    echo "Name= $name";
    
    return $response;
});

$app->handle();

