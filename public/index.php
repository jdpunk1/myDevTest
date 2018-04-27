<?php
require_once '../vendor/autoload.php';

//Load Twig templating environment
$loader = new Twig_Loader_Filesystem('../templates/');
$twig = new Twig_Environment($loader, ['debug' => true]);

//Get the episodes from the API
$client = new GuzzleHttp\Client();
//if cache file exists $res = cacheFile
$res = $client->request('GET', 'http://3ev.org/dev-test-api/');
if($res->getStatusCode() == 404){
//if response fails (not 200) send a clean response message
echo $twig->render('404.html');
}
else{
// if !cache then create cachefile for future use
$data = json_decode($res->getBody(), true);


//Sort the episodes
array_multisort(array_keys($data), SORT_ASC, SORT_STRING, $data);

//Render the template
echo $twig->render('page.html', ["episodes" => $data]);