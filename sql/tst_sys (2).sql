SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `productss` (
  `id` int(12) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_retail` varchar(255) NOT NULL,
  `prod_stock` varchar(255) NOT NULL,
  `prod_whlsale` varchar(255) NOT NULL,
  `prod_qnt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `productss` (`id`, `prod_name`, `prod_retail`, `prod_stock`, `prod_whlsale`, `prod_qnt`) VALUES
(1, 'skyflakes', '6', '7', '67', '3');



CREATE TABLE `trans` (
  `id` int(12) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `coutof_sold` varchar(255) NOT NULL,
  `date_sold` date NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(1, 'riri', '1415', 'Rey'),
(2, 'clay', '1234', 'Clement'),
(3, 'hya', '1234', 'Hyacint'),
(4, 'checel', '1234', 'Checel');


ALTER TABLE `productss`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `productss`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `trans`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


