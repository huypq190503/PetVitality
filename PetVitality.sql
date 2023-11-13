CREATE TABLE `danhmuc` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `sanpham` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `img` varchar(255),
  `iddm` int
);

CREATE TABLE `khoiluong` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `loai` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255)
);

CREATE TABLE `ctsp` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `price` int,
  `soluong` int,
  `mota` varchar(255),
  `idsp` int,
  `idsize` int,
  `idloai` int
);

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user` varchar(255),
  `pass` varchar(255),
  `email` varchar(255),
  `address` varchar(255),
  `tel` varchar(255),
  `role` int
);

CREATE TABLE `binhluan` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `iduser` int,
  `idpro` int,
  `ngaybinhluan` date
);

CREATE TABLE `cart` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `iduser` int,
  `total` int
);

CREATE TABLE `cart_detail` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `soluong` int,
  `idcart` int,
  `iduser` int,
  `price` int
);
