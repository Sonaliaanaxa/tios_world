ALTER TABLE `users`
CHANGE `image` `logo` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `about_business`;

ALTER TABLE `users`
ADD `image1` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `logo`,
ADD `image2` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image1`,
ADD `image3` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image2`;

ALTER TABLE `users`
ADD `about_founder` longtext COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image3`;

CREATE TABLE `units` (
  `id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

ALTER TABLE `products`
CHANGE `origin_details` `origin` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `is_show`,
ADD `type` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `origin`,
ADD `certification` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `type`,
ADD `back_image` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `map`,
ADD `image1` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `back_image`,
ADD `image2` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `image1`,
ADD `image3` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `image2`,
ADD `image4` varchar(255) COLLATE 'utf8mb4_general_ci' NULL AFTER `image3`,
DROP `product_collection_type`;

ALTER TABLE `collections`
DROP `regular`,
DROP `organic`;

ALTER TABLE `users`
ADD `slug` varchar(255) COLLATE 'utf8mb4_unicode_ci' NOT NULL AFTER `name`;

ALTER TABLE `categories`
ADD `parent_id` int(11) NULL AFTER `user_id`;