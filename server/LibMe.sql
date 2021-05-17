-- to create books table
CREATE TABLE BOOKS
(
  B_NO INT (11),
  ISBN INT (13),
  BOOK_NAME VARCHAR (100),
  AUTHOR VARCHAR(100),
  PUBLISHER_NAME VARCHAR (50),
  CATEGORY_NAME VARCHAR (30),
  COPIES INT (4)
);
-- to insert books
INSERT INTO books (`B_NO`, `BOOK_NAME`, `AUTHOR`, `PUBLISHER_NAME`, `CATEGORY_NAME`, `COPIES`) VALUES
(1, 'Software engineering', 'Jane Doe', 'Doe Publications', 'computer science', 2);

-- to create issue table 
CREATE TABLE ISSUE (
    ID int NOT NULL AUTO_INCREMENT,
    ISSUE_DATE  DATE NOT NULL,
    DUE_DATE DATE NOT NULL,
    COPIES_AVAILABLE INT,
    FOREIGN KEY (B_NO) REFERENCES books(B_NO)
);

--to get date in a specific format SELECT DATE_FORMAT("2017-06-15", "%d-%m-%Y");

-- to create table admins
CREATE TABLE `admins` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `mobile`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin@1234', 1148458757);