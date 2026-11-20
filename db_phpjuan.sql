SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

CREATE DATABASE IF NOT EXISTS `db_phpjuan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_phpjuan`;

CREATE TABLE IF NOT EXISTS `tb_judul_game` (
  `id_judul_game` int(11) NOT NULL AUTO_INCREMENT,
  `judul_game` varchar(255) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_judul_game`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_judul_game` (`id_judul_game`, `judul_game`, `Created_at`) VALUES
(1, 'Elden Ring', current_timestamp()),
(2, 'Persona 3 Reload', current_timestamp()),
(3, 'Hollow Knight : Silksong', current_timestamp()),
(4, 'Persona 5 Royale', current_timestamp()),
(5, 'Clair Obscure 33', current_timestamp());

COMMIT;
