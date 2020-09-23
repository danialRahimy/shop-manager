-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'admin_user'
--
-- ---
DROP TABLE IF EXISTS `admin_user`;

CREATE TABLE `admin_user` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` MEDIUMTEXT NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `cell_number` VARCHAR(11) NULL DEFAULT NULL,
  `role_id` INTEGER NOT NULL,
  `is_active` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
KEY (`id`)
);

-- ---
-- Table 'acl_role'
--
-- ---

DROP TABLE IF EXISTS `acl_role`;

CREATE TABLE `acl_role` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'acl_access'
--
-- ---

DROP TABLE IF EXISTS `acl_access`;

CREATE TABLE `acl_access` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `role_id` INTEGER NOT NULL,
  `plugin_id` INTEGER NOT NULL,
  `access` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_category'
--
-- ---

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `parent_id` INT DEFAULT 0,
  `show_in_menu` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
  `description` MEDIUMTEXT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_category_sub'
--
-- ---

-- DROP TABLE IF EXISTS `product_category_sub`;

-- CREATE TABLE `product_category_sub` (
--   `id` INTEGER NOT NULL AUTO_INCREMENT,
--   `title` VARCHAR(50) NOT NULL,
--   `category_id` INTEGER NOT NULL,
--   `show_in_menu` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
--   `description` MEDIUMTEXT NULL,
--   PRIMARY KEY (`id`)
-- );

-- ---
-- Table 'product'
--
-- ---

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(250) NOT NULL,
  `title_en` VARCHAR(250) DEFAULT NULL,
  `description` MEDIUMTEXT NULL DEFAULT NULL,
  `category_id` INTEGER NOT NULL,
  `quantity` INTEGER NULL DEFAULT NULL,
  `buy_price` INTEGER NOT NULL,
  `sell_price` INTEGER NOT NULL,
  `brand_id` INTEGER NOT NULL,
  `flags` VARCHAR(10) NOT NULL,
  `created_by` VARCHAR(50) NOT NULL,
  `created_at` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_color'
--
-- ---

DROP TABLE IF EXISTS `product_color`;

CREATE TABLE `product_color` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `hex_code` VARCHAR(7) NOT NULL,
  `title` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_image'
--
-- ---

DROP TABLE IF EXISTS `product_image`;

CREATE TABLE `product_image` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `product_id` INTEGER NOT NULL,
  `src` VARCHAR(250) NOT NULL,
  `flags` VARCHAR(10) NOT NULL,
  `alt` text DEFAULT NULL,
  `order` INTEGER NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_brand'
--
-- ---

DROP TABLE IF EXISTS `product_brand`;

CREATE TABLE `product_brand` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `logo_src` VARCHAR(250) NOT NULL,
  `title_fa` VARCHAR(50) NOT NULL,
  `title_en` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_comment'
--
-- ---

DROP TABLE IF EXISTS `product_comment`;

CREATE TABLE `product_comment` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `product_id` INTEGER NOT NULL,
  `comment` MEDIUMTEXT NOT NULL,
  `star` INT NULL DEFAULT NULL,
  `created_by` VARCHAR(50) NOT NULL,
  `created_at` INT NOT NULL,
  `like` VARCHAR(1) NOT NULL DEFAULT 'S' COMMENT 'Y: yes, N: no, S: not voited',
  `flags` VARCHAR(10) DEFAULT 'N',
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer'
--
-- ---

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `family` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `username` VARCHAR(50) NOT NULL,
  `email` VARCHAR(50) DEFAULT NULL,
  `cell_number` VARCHAR(11) NOT NULL,
  `password` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_stat'
--
-- ---

DROP TABLE IF EXISTS `product_stat`;

CREATE TABLE `product_stat` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `product_id` INTEGER NOT NULL,
  `view` INTEGER NULL DEFAULT NULL,
  `buy` INTEGER NULL DEFAULT NULL,
  `reject` INT NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer_address'
--
-- ---

DROP TABLE IF EXISTS `customer_address`;

CREATE TABLE `customer_address` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `customer` VARCHAR(50) NOT NULL,
  `address` VARCHAR(250) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `is_selected` VARCHAR(1) NOT NULL DEFAULT 'N' COMMENT 'Y: yes, N: no',
  `receiver_name` VARCHAR(50) NULL DEFAULT NULL,
  `receiver_cell_number` VARCHAR(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer_basket'
--
-- ---

DROP TABLE IF EXISTS `customer_basket`;

CREATE TABLE `customer_basket` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `customer` VARCHAR(50) NOT NULL,
  `product_id` INTEGER NOT NULL,
  `meta` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'product_relation_color'
--
-- ---

DROP TABLE IF EXISTS `product_relation_color`;

CREATE TABLE `product_relation_color` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `color_id` INTEGER NOT NULL,
  `product_id` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer_factor'
--
-- ---

DROP TABLE IF EXISTS `customer_factor`;

CREATE TABLE `customer_factor` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `customer` VARCHAR(50) NOT NULL,
  `payed` VARCHAR(1) NOT NULL DEFAULT 'N' COMMENT 'Y: yes, N: no, S: not action',
  `address_id` INTEGER NOT NULL,
  `total` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer_factor_details'
--
-- ---

DROP TABLE IF EXISTS `customer_factor_details`;

CREATE TABLE `customer_factor_details` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `factor_id` INTEGER NOT NULL,
  `product_id` INTEGER NOT NULL,
  `product_details` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'shop_section'
--
-- ---

DROP TABLE IF EXISTS `shop_section`;

CREATE TABLE `shop_section` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `sec_type` VARCHAR(50) NOT NULL,
  `title` INTEGER NOT NULL,
  `is_active` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'adv'
--
-- ---

DROP TABLE IF EXISTS `adv`;

CREATE TABLE `adv` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `src` VARCHAR(255) NOT NULL,
  `url` MEDIUMTEXT NOT NULL,
  `sec_id` INTEGER NOT NULL,
  `is_active` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
  `order` INTEGER NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'shop_home_layout'
--
-- ---

DROP TABLE IF EXISTS `shop_home_layout`;

CREATE TABLE `shop_home_layout` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `json_meta` MEDIUMTEXT NOT NULL,
  `is_active` VARCHAR(1) NOT NULL DEFAULT 'N' COMMENT 'Y: yes, N: no',
  `layout_section_id` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'shop_home_layout_section'
--
-- ---

DROP TABLE IF EXISTS `shop_home_layout_section`;

CREATE TABLE `shop_home_layout_section` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `img_scr` MEDIUMTEXT NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'shop_landing'
--
-- ---

DROP TABLE IF EXISTS `shop_landing`;

CREATE TABLE `shop_landing` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(250) NOT NULL,
  `title` VARCHAR(250) NOT NULL,
  `description` MEDIUMTEXT NOT NULL,
  `is_active` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
  `show_in_menu` VARCHAR(1) NOT NULL DEFAULT 'Y' COMMENT 'Y: yes, N: no',
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'customer_product_favorite'
--
-- ---

DROP TABLE IF EXISTS `customer_product_favorite`;
		
CREATE TABLE `customer_product_favorite` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `customer` VARCHAR(50) NOT NULL,
  `product_id` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table Properties
-- ---

ALTER TABLE `admin_user` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `acl_role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `acl_access` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_category` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_color` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_image` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_brand` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_comment` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_stat` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer_address` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer_basket` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `product_relation_color` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer_factor` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer_factor_details` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `shop_section` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `adv` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `shop_home_layout` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `shop_home_layout_section` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `shop_landing` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
ALTER TABLE `customer_product_favorite` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;