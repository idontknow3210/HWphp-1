<?php 
declare(strict_types=1);

require_once('autoload.php');

try {

  $pdo = new PDO("sqlite:test.db");

  $res = $pdo->exec(
    "CREATE TABLE IF NOT EXISTS shop
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        address TEXT NOT NULL,
        note TEXT,
        CONSTRAINT shop_name_uq UNIQUE(name, address)
    );
    
    CREATE TABLE IF NOT EXISTS product
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        shop_id INTEGER NOT NULL,
        price REAL,
        count REAL,
        note TEXT,
        CONSTRAINT product_shop_uq UNIQUE(name, shop_id),
        CONSTRAINT product_price_chk CHECK(price >= 0),
        CONSTRAINT product_count_chk CHECK(count >= 0),
        FOREIGN KEY (shop_id) REFERENCES shop (id)
    );

    CREATE TABLE IF NOT EXISTS client
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        phone TEXT,
        birthday TEXT,
        note TEXT
    );

    CREATE TABLE IF NOT EXISTS orders
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        created_at TEXT NOT NULL,
        shop_id INTEGER NOT NULL,
        client_id INTEGER NOT NULL,
        note TEXT,
        FOREIGN KEY (shop_id) REFERENCES shop (id),
        FOREIGN KEY (client_id) REFERENCES client (id)
    );

    CREATE TABLE IF NOT EXISTS order_product
    (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        order_id INTEGER NOT NULL,
        product_id INTEGER NOT NULL,
        price REAL,
        count REAL,
        note TEXT,
        CONSTRAINT order_product_price_chk CHECK(price >= 0),
        CONSTRAINT order_product_count_chk CHECK(count <> 0)
        FOREIGN KEY (order_id) REFERENCES orders (id),
        FOREIGN KEY (product_id) REFERENCES product (id)
    );"
  );
  
  $shop = new Shop($pdo);
  $shop->insert(array('name', 'address'), array('Девятка', 'Липецк'.rand(1, 1500)));
  var_dump($shop->find(1));

  $product = new Product($pdo);
  $product->insert(array('name', 'shop_id', 'price', 'count'), array('Хлеб'.rand(1, 1500), 1, 100, 200));
  var_dump($product->find(1));

  $client = new Client($pdo);
  $client->update(5, array('name'=>'Воронцова'));
  var_dump($client->find(1));

  $orders = new Orders($pdo);
  var_dump($orders->find(1));

  $order_product = new Order_product($pdo);
  var_dump($order_product->find(1));
  $order_product->delete(6);
  
  // Garbage collect db
  $dbo = null; 
} catch (PDOException $ex) {
  echo $ex->getMessage();
} 


?>

<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?= '<h1>Товары</h1>'; ?>
    
    <?php for ($i = 1; $i <= 5; $i++) { 
      $prod = $product->find($i);
      echo '<p>';
        echo '<h4>' . $prod["name"] . '</h4>';
        echo $prod["price"];  
      echo '</p>';
    } ?>
  </body>
</html> 