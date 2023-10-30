SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zeno = "+00:00";

CREATE TABLE `tb_user` (
  `id` int (11) NOT NULL,
  `nama` varchar(200) CHARACTER SET utf8mb4 DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `level`, `nohp`) VALUES
	(1, 'abc', 'abc@abc.com', '5f4dcc3b5aa765d61d8327deb882cf99', 2, '123456789011'),
	(2, 'owner', 'admin@admin.com', '5f4dcc3b5aa765d61d8327deb882cf99', 1, '123456789011'),
	(3, 'abcd', 'abcd@abcd.com', '5f4dcc3b5aa765d61d8327deb882cf99', 3, '123456789011'),
	(4, 'abcde', 'abcde@abcde.com', '5f4dcc3b5aa765d61d8327deb882cf99', 4, '123456789011');

ALTER TABLE 'tb_user'
  ADD PRIMARY KEY ('id');

ALTER TABLE 'tb_user'
  MODIFY 'id' int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;


