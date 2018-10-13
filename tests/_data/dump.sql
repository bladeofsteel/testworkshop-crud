CREATE TABLE IF NOT EXISTS `articles`
(
  `id`   int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `body` text         NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Clear articles table
TRUNCATE `articles`;

-- Insert predefined articles records
INSERT INTO `articles` (`id`, `name`, `body`) VALUES
   (1, 'First Article', 'First article body'),
   (2, 'Another Article', 'Second article body');
