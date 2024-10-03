CREATE DATABASE IF NOT EXISTS `base_de_datos`;
USE `base_de_datos`;

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `task_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tasks` (`id`, `task_name`, `created_at`) VALUES
	(1, 'Tarea 1', '2024-10-03 17:05:01'),
	(2, 'Tarea 2', '2024-10-03 17:05:02'),
	(3, 'Tarea 3', '2024-10-03 17:05:03'),
	(4, 'Tarea 4', '2024-10-03 17:05:04'),
	(5, 'Tarea 5', '2024-10-03 17:05:05');
