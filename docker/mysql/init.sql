CREATE DATABASE IF NOT EXISTS `db_productos` DEFAULT CHARACTER SET utf8mb4 COLLATE
utf8mb4_unicode_ci;
USE `db_productos`;
CREATE TABLE IF NOT EXISTS `products` (
`id` INT AUTO_INCREMENT PRIMARY KEY,
`name` VARCHAR(255) NOT NULL,
`description` TEXT,
`price` DECIMAL(10,2) DEFAULT 0.00,
`created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Datos de ejemplo
INSERT INTO `products` (`name`, `description`, `price`) VALUES
('Camiseta', 'Camiseta algodón 100%', 19.90),
('Taza', 'Taza cerámica 300ml', 7.50),
('Libreta', 'Libreta A5, 80 páginas', 4.20);