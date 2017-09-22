-- Table structure for table `PRODUCT`
CREATE TABLE PRODUCT(
   ID INT PRIMARY KEY     NOT NULL,
   NAME           VARCHAR(32)   NOT NULL,
   DESCRIPTION    TEXT,
   PRICE          INT,
   CREATED        timestamp NOT NULL,
   MODIFIED       timestamp NOT NULL
);

 
-- Dumping data for table `PRODUCT`
INSERT INTO PRODUCT (ID, NAME, DESCRIPTION, PRICE, CREATED, MODIFIED) VALUES 
(1, 'LG P880 4X HD', 'My first awesome phone!', 336, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(2, 'Google Nexus 4', 'The most awesome phone of 2013!', 299, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(3, 'Samsung Galaxy S4', 'How about no?', 600, '2014-06-01 01:12:26', '2014-05-31 17:12:26'),
(6, 'Bench Shirt', 'The best shirt!', 29, '2014-06-01 01:12:26', '2014-05-31 02:12:21'),
(7, 'Lenovo Laptop', 'My business partner.', 399, '2014-06-01 01:13:45', '2014-05-31 02:13:39'),
(8, 'Samsung Galaxy Tab 10.1', 'Good tablet.', 259, '2014-06-01 01:14:13', '2014-05-31 02:14:08'),
(9, 'Spalding Watch', 'My sports watch.', 199, '2014-06-01 01:18:36', '2014-05-31 02:18:31'),
(10, 'Sony Smart Watch', 'The coolest smart watch!', 300, '2014-06-06 17:10:01', '2014-06-05 18:09:51'),
(11, 'Huawei Y300', 'For testing purposes.', 100, '2014-06-06 17:11:04', '2014-06-05 18:10:54'),
(12, 'Abercrombie Lake Arnold Shirt', 'Perfect as gift!', 60, '2014-06-06 17:12:21', '2014-06-05 18:12:11'),
(13, 'Abercrombie Allen Brook Shirt', 'Cool red shirt!', 70, '2014-06-06 17:12:59', '2014-06-05 18:12:49'),
(25, 'Abercrombie Allen Anew Shirt', 'Awesome new shirt!', 999, '2014-11-22 18:42:13', '2014-11-21 19:42:13'),
(26, 'Another product', 'Awesome product!', 555, '2014-11-22 19:07:34', '2014-11-21 20:07:34'),
(27, 'Bag', 'Awesome bag for you!', 999, '2014-12-04 21:11:36', '2014-12-03 22:11:36'),
(28, 'Wallet', 'You can absolutely use this one!', 799, '2014-12-04 21:12:03', '2014-12-03 22:12:03'),
(30, 'Wal-mart Shirt', '', 555, '2014-12-13 00:52:29', '2014-12-12 01:52:29'),
(31, 'Amanda Waller Shirt', 'New awesome shirt!', 333, '2014-12-13 00:52:54', '2014-12-12 01:52:54'),
(32, 'Washing Machine Model PTRR', 'Some new product.', 999, '2015-01-08 22:44:15', '2015-01-07 23:44:15');