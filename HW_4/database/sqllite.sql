CREATE TABLE IF NOT EXISTS shop
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
);

INSERT INTO shop (name, address) VALUES ('Семерочка', 'Москва');
INSERT INTO shop (name, address) VALUES ('Семерочка', 'Санкт-Петербург');
INSERT INTO shop (name, address) VALUES ('Семерочка', 'Новгород');
INSERT INTO shop (name, address) VALUES ('Семерочка', 'Смоленск');
INSERT INTO shop (name, address) VALUES ('Девятка', 'Смоленск');

INSERT INTO product (name, shop_id, price, count) VALUES ('Яблоки', 1, 120, 20);
INSERT INTO product (name, shop_id, price, count) VALUES ('Груши', 1, 200, 10);
INSERT INTO product (name, shop_id, price, count) VALUES ('Кефир', 1, 110, 50);
INSERT INTO product (name, shop_id, price, count) VALUES ('Семечки', 1, 50, 1000);
INSERT INTO product (name, shop_id, price, count) VALUES ('Молоко', 1, 80, 2000);
INSERT INTO product (name, shop_id, price, count) VALUES ('Хлеб', 5, 18, 30);

INSERT INTO client (name, phone, birthday) VALUES ('Иванов', '123', '1970-01-01');
INSERT INTO client (name, phone, birthday) VALUES ('Петров', '456', '1967-01-01');
INSERT INTO client (name, phone, birthday) VALUES ('Сидоров', '789', '1955-05-05');
INSERT INTO client (name, phone, birthday) VALUES ('Синицина', '987', '1975-06-05');
INSERT INTO client (name, phone, birthday) VALUES ('Воронцова', '654', '1968-11-25');

INSERT INTO orders (created_at, shop_id, client_id) VALUES ('2024-01-01 12:50:00', 1, 1);
INSERT INTO orders (created_at, shop_id, client_id) VALUES ('2024-01-01 13:50:00', 1, 2);
INSERT INTO orders (created_at, shop_id, client_id) VALUES ('2024-01-02 14:50:00', 1, 3);
INSERT INTO orders (created_at, shop_id, client_id) VALUES ('2024-01-03 15:50:00', 1, 1);
INSERT INTO orders (created_at, shop_id, client_id) VALUES ('2024-01-04 16:50:00', 1, 2);

INSERT INTO order_product (order_id, product_id, price, count) VALUES (1, 1, 110, 5);
INSERT INTO order_product (order_id, product_id, price, count) VALUES (2, 1, 100, 15);
INSERT INTO order_product (order_id, product_id, price, count) VALUES (1, 2, 210, 5);
INSERT INTO order_product (order_id, product_id, price, count) VALUES (3, 4, 50, 50);
INSERT INTO order_product (order_id, product_id, price, count) VALUES (4, 5, 17, 5);