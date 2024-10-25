<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function addToCart($db, $productID, $quantity) {
    $sessionID = session_id();

    // get the cart ID for this session
    $query = 'SELECT cartID FROM cart WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->execute();
    $cart = $statement->fetch();
    $statement->closeCursor();

    if ($cart) {
        $cartID = $cart['cartID'];
    } else {
        // create a new cart for this session
        $query = 'INSERT INTO cart (sessionID) VALUES (:sessionID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':sessionID', $sessionID);
        $statement->execute();
        $cartID = $db->lastInsertId();
        $statement->closeCursor();
    }

    // get the product price
    $query = 'SELECT basePrice FROM products WHERE productID = :productID';
    $statement = $db->prepare($query);
    $statement->bindValue(':productID', $productID);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    $price = $product['basePrice'];

    // add the item to the cart
    $query = 'INSERT INTO cart_items (cartID, productID, quantity, price) VALUES (:cartID, :productID, :quantity, :price)';
    $statement = $db->prepare($query);
    $statement->bindValue(':cartID', $cartID);
    $statement->bindValue(':productID', $productID);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':price', $price);
    $statement->execute();
    $statement->closeCursor();
}

function getCartContents($db) {
    $sessionID = session_id();

    // get the cart ID for this session
    $query = 'SELECT cartID FROM cart WHERE sessionID = :sessionID';
    $statement = $db->prepare($query);
    $statement->bindValue(':sessionID', $sessionID);
    $statement->execute();
    $cart = $statement->fetch();
    $statement->closeCursor();

    if (!$cart) {
        return [];
    }

    $cartID = $cart['cartID'];

    // get the cart items
    $query = 'SELECT ci.cartItemID, ci.productID, ci.quantity, ci.price, p.productName 
              FROM cart_items ci 
              JOIN products p ON ci.productID = p.productID 
              WHERE ci.cartID = :cartID';
    $statement = $db->prepare($query);
    $statement->bindValue(':cartID', $cartID);
    $statement->execute();
    $cartItems = $statement->fetchAll();
    $statement->closeCursor();

    return $cartItems;
}

function removeFromCart($db, $cartItemID) {
    $query = 'DELETE FROM cart_items WHERE cartItemID = :cartItemID';
    $statement = $db->prepare($query);
    $statement->bindValue(':cartItemID', $cartItemID);
    $statement->execute();
    $statement->closeCursor();
}
?>