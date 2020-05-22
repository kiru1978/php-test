<?php

namespace App\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

/**
 * Description of PostController
 *
 * @author hidran@gmail.com
 */
class CaractersController{

    protected $_client ;
    
    protected $layout = __DIR__ . '/../../layout/index.tpl.php';
    
    public $content ='';
    
    protected $endpoints = [
        'all-caracters' => '/api/character',
        'get-caracter' => '/api/character/%s',
        'get-episodes' => '/api/episode/%s',
        'other-caracters' => '/api/character/?page=%s',
        'search-caracter' => '/api/character/?name=%s',
    ];

    protected $headers;
    
    public function __construct() {

         

        $this->headers = [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
        
        $this->_client = new Client([
            'base_uri' => 'https://rickandmortyapi.com',
        ]);
       
    }
    
     public function display()
    {
        require  $this->layout;
    }
    
    
    public function getCaracters($page = null)
    {
        
        $options = [
                'headers' => $this->headers,
                'verify' => false
        ];
        
        try {
            
            if (is_null($page)) {
                $endPoint = $this->endpoints['all-caracters'];
            }
            else {
                $endPoint = sprintf($this->endpoints['other-caracters'],$page);
            }
            
            $caractersResult = $this->_client->request("GET",$endPoint, $options);

            $responseCode = $caractersResult->getStatusCode();

            $responseBody = $caractersResult->getBody()->getContents();

            $result = json_decode($responseBody,true);
            
            $pageInfo = $result['info'];
            
            if(!is_null($pageInfo['prev'])){
                $find = "https://rickandmortyapi.com/api/character/?page=";
                $pageInfo['prev'] = str_replace($find, "", $pageInfo['prev']);
            }
            
            if(!is_null($pageInfo['next'])){
                $find = "https://rickandmortyapi.com/api/character/?page=";
                $pageInfo['next'] = str_replace($find, "", $pageInfo['next']);
            }
            
            $caracters = $result['results'];

            $this->content =  view('caracters', compact('pageInfo','caracters'));
        }
        catch(\GuzzleHttp\Exception $e) {
                echo $e->getMessage();
        }     
    }
    
    public  function show( $caracterid )
    {
       
        $options = [
                'headers' => $this->headers,
                'verify' => false
        ];
        
        try {
            
            $endPoint = sprintf($this->endpoints['get-caracter'],$caracterid);
        
            $caractersResult = $this->_client->request("GET",$endPoint, $options);

            $responseCode = $caractersResult->getStatusCode();

            $responseBody = $caractersResult->getBody()->getContents();

            $result = json_decode($responseBody,true);
            
            $caracter = $result;
            
            $arrayEpisodes = $result['episode'];
            $find = "https://rickandmortyapi.com/api/episode/";
            $searchepisodes = str_replace($find, "", implode(",", $arrayEpisodes));
            
            $endPoint = sprintf($this->endpoints['get-episodes'],$searchepisodes);
        
            $caractersResult = $this->_client->request("GET",$endPoint, $options);

            $responseCode = $caractersResult->getStatusCode();

            $responseBody = $caractersResult->getBody()->getContents();

            $result = json_decode($responseBody,true);
            
            $episodes = $result;
            

            $this->content =  view('caracter', compact('caracter', 'episodes'));
        }
        catch(\GuzzleHttp\Exception $e) {
            echo $e->getMessage();
        }
     
    }
    
    public  function search()
    {
        $name = $_POST['caracter'];
        $options = [
                'headers' => $this->headers,
                'verify' => false
        ];
        
        try {
            
            $endPoint = sprintf($this->endpoints['search-caracter'],$name);
            
            $caractersResult = $this->_client->request("GET",$endPoint, $options);

            $responseCode = $caractersResult->getStatusCode();

            $responseBody = $caractersResult->getBody()->getContents();

            $result = json_decode($responseBody,true);
            
            $pageInfo = $result['info'];
            
            if(!is_null($pageInfo['prev'])){
                $find = "https://rickandmortyapi.com/api/character/?page=";
                $pageInfo['prev'] = str_replace($find, "", $pageInfo['prev']);
            }
            
            if(!is_null($pageInfo['next'])){
                $find = "https://rickandmortyapi.com/api/character/?page=";
                $pageInfo['next'] = str_replace($find, "", $pageInfo['next']);
            }
            
            $caracters = $result['results'];

            $this->content =  view('caracters', compact('pageInfo','caracters'));
        }
        catch(\GuzzleHttp\Exception $e) {
                echo $e->getMessage();
        }
     
    }
}

