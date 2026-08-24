DROP TABLE IF EXISTS product;
DROP TABLE IF EXISTS feedback;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS adminlogin;

CREATE TABLE adminlogin (
  id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  password VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO adminlogin (id, name, password) VALUES
(1, 'Namrata', '123'),
(2, 'Disha', '123');

CREATE TABLE category (
  cat_id INT NOT NULL AUTO_INCREMENT,
  cat_name VARCHAR(100) NOT NULL,
  PRIMARY KEY (cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO category (cat_id, cat_name) VALUES
(1, 'Cake'),
(2, 'Pastry'),
(3, 'Cookie'),
(4, 'Cup Cake');

CREATE TABLE feedback (
  fb_id INT NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone_no BIGINT NOT NULL,
  message VARCHAR(150) NOT NULL,
  PRIMARY KEY (fb_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE product (
  pro_id INT NOT NULL AUTO_INCREMENT,
  cat_id INT NOT NULL,
  pro_name VARCHAR(150) NOT NULL,
  pro_detail VARCHAR(250) NOT NULL,
  pro_price DOUBLE NOT NULL,
  pro_image TEXT NOT NULL,
  PRIMARY KEY (pro_id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO product (pro_id, cat_id, pro_name, pro_detail, pro_price, pro_image) VALUES
(1, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate (1).jpg'),
(2, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate (2).jpg'),
(3, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate  (5).jpg'),
(4, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate (6).jpg'),
(5, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate (7).jpg'),
(6, 1, 'Chocolate Cake', 'It is made with different types of chocolate....', 250, 'upload/Chocolate (3).jpg'),
(7, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(1).jpg'),
(8, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(3).jpg'),
(9, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(4).jpg'),
(10, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(5).jpg'),
(11, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(6).jpg'),
(12, 1, 'Stobery Cake', 'This cake is made with stobery and white cream..', 320, 'upload/Stobery(7).jpg'),
(13, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(1).jpg'),
(14, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(2).jpg'),
(15, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(3).jpg'),
(16, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(4).jpg'),
(17, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(5).jpg'),
(18, 1, 'Aniversary Cake', 'This cake is for any kind of aniversary....', 350, 'upload/Aniversary(6).jpg'),
(19, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(1).jpg'),
(20, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(2).jpg'),
(21, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(3).jpg'),
(22, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(4).jpg'),
(23, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(5).jpg'),
(24, 1, 'Pinapple Cake', 'It is made with Pinapple Pulp', 370, 'upload/Pinapple(6).jpg'),
(25, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(1).jpg'),
(26, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(2).jpg'),
(27, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(3).jpg'),
(28, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(4).jpg'),
(29, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(5).jpg'),
(30, 1, 'Kids Cake', 'This cake is for children....', 350, 'upload/Kids(6).jpg'),
(31, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(1).jpg'),
(32, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(2).jpg'),
(33, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(3).jpg'),
(34, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(4).jpg'),
(35, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(5).jpg'),
(36, 1, 'Orange Cake', 'It is made with Orange Pulp...', 350, 'upload/Orange(6).jpg'),
(37, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(1).jpg'),
(38, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(2).jpg'),
(39, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(3).jpg'),
(40, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(4).jpg'),
(41, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(5).jpg'),
(42, 1, 'Barbie Cake', 'This cake is for small girls and made with barbie girl design..', 340, 'upload/Barbie(6).jpg'),
(43, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(1).jpg'),
(44, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(2).jpg'),
(45, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(3).jpg'),
(46, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(4).jpg'),
(47, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(5).jpg'),
(48, 2, 'Choco Pastry', 'It is made with different types of chocolate and white cream..', 70, 'upload/Pastry(6).jpg'),
(49, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(1).jpg'),
(50, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(2).jpg'),
(51, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(3).jpg'),
(52, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(4).jpg'),
(53, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(5).jpg'),
(54, 2, 'Fruit Pastry', 'This Pastry is made with Fruits..', 100, 'upload/Fruit(6).jpg'),
(55, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(1).jpg'),
(56, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(2).jpg'),
(57, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(3).jpg'),
(58, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(4).jpg'),
(59, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(5).jpg'),
(60, 3, 'Almond Cookie', 'It is made with almond and chocolate.. ', 80, 'upload/almond(6).jpg'),
(61, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(1).jpg'),
(62, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(2).jpg'),
(63, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(3).jpg'),
(64, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(4).jpg'),
(65, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(5).jpg'),
(66, 4, 'Choco Cup Cake', 'It is made with different types of chocolate and white cream....', 60, 'upload/choco cookie(6).jpg'),
(67, 3, 'Molded Cookie ', 'It is made with different molds and white cream....', 70, 'upload/molded(1).jpg'),
(68, 3, 'Molded Cookie ', 'It is made with different molds and white creme..', 70, 'upload/molded(2).jpg'),
(69, 3, 'Molded Cookie ', 'It is made with different molds and white creme..', 70, 'upload/molded(3).jpg'),
(70, 3, 'Molded Cookie ', 'It is made with different molds and white creme..', 70, 'upload/molded(4).jpg'),
(71, 3, 'Molded Cookie ', 'It is made with different molds and white creme..', 70, 'upload/molded(5).jpg'),
(72, 3, 'Molded Cookie ', 'It is made with different molds and white creme..', 70, 'upload/molded(6).jpg'),
(73, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(1).jpg'),
(74, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(2).jpg'),
(75, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(3).jpg'),
(76, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(4).jpg'),
(77, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(5).jpg'),
(78, 4, 'Strawberry Cup Cake', 'This cup cake is made with stobery and white cream..', 70, 'upload/strawberry(6).jpg');
