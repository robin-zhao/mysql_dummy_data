/**
 * Author:  Robin Zhao <rzhao@defymedia.com>
 * Created: May 17, 2016
 */


CREATE TABLE `example1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `age` int(4) NOT NULL DEFAULT '0',
  `description` text,
  `created` timestamp NULL DEFAULT NULL,
  `salary` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;