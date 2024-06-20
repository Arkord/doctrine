<?php

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

switch ($method | $uri) {
    /*
    * Path: GET /doctrine_lite/products
    * Task: show all the products
    */
    case ($method == 'GET' && $uri == '/doctrine_lite/products'):
        require_once "bootstrap.php";

        $productRepository = $entityManager->getRepository('Product');
        $products = $productRepository->findAll();
                
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($products, 'json');
        $responseData = $jsonContent;

        header('Content-Type: application/json');
        echo $responseData;

        break;
    /*
    * Path: GET /doctrine_lite/products/{id}
    * Task: get one user
    */
    case ($method == 'GET' && preg_match('/\/doctrine_lite\/products\/[1-9]/', $uri)):
        break;
    /*
    * Path: POST /doctrine_lite/products
    * Task: store one user
    */
    case ($method == 'POST' && $uri == '/doctrine_lite/products'):
        break;
    /*
    * Path: PUT /doctrine_lite/products/{id}
    * Task: update one user
    */
    case ($method == 'PUT' && preg_match('/\/doctrine_lite\/products\/[1-9]/', $uri)):
        break;
    /*
    * Path: DELETE /doctrine_lite/products/{id}
    * Task: delete one user
    */
    case ($method == 'DELETE' && preg_match('/\/doctrine_lite\/products\/[1-9]/', $uri)):
        break;
    /*
    * Path: ?
    * Task: this path doesn't match any of the defined paths
    *      throw an error
    */
    default:
        break;
 }