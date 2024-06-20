<?php
// update_product.php <id> <new-name>
require_once "bootstrap.php";

$id = $argv[1];

$product = $entityManager->find('Product', $id);

if ($product === null) {
    echo "Product $id does not exist.\n";
    exit(1);
}

$entityManager->remove($product);

$entityManager->flush();