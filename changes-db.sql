ALTER TABLE `users`
CHANGE `image` `logo` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `about_business`;

ALTER TABLE `users`
ADD `image1` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `logo`,
ADD `image2` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image1`,
ADD `image3` varchar(255) COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image2`;

ALTER TABLE `users`
ADD `about_founder` longtext COLLATE 'utf8mb4_unicode_ci' NULL AFTER `image3`;