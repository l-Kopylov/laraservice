-- Очищаем таблицы, если они уже существуют
DROP TABLE IF EXISTS `additional_options`;
DROP TABLE IF EXISTS `materials`;

-- Создание таблицы материалов
CREATE TABLE `materials` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price_per_square_meter` INT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

-- Создание таблицы дополнительных опций
CREATE TABLE `additional_options` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` INT UNSIGNED NOT NULL,
    `created_at` TIMESTAMP NULL DEFAULT NULL,
    `updated_at` TIMESTAMP NULL DEFAULT NULL
);

-- Вставка материалов
INSERT INTO `materials` (`name`, `price_per_square_meter`, `created_at`, `updated_at`) VALUES
('Материал A', 250, NOW(), NOW()),
('Материал B', 300, NOW(), NOW()),
('Материал C', 400, NOW(), NOW()),
('Материал D', 350, NOW(), NOW()),
('Материал E', 450, NOW(), NOW());

-- Вставка дополнительных опций
INSERT INTO `additional_options` (`name`, `price`, `created_at`, `updated_at`) VALUES
('Ламинация потолка', 1500, NOW(), NOW()),
('Подсветка LED', 2000, NOW(), NOW()),
('Многоуровневый потолок', 2500, NOW(), NOW()),
('Установка дополнительных карнизов', 1000, NOW(), NOW()),
('Покраска', 800, NOW(), NOW()),
('Монтаж скрытых проводов', 1200, NOW(), NOW()),
('Антистатическая обработка', 500, NOW(), NOW());