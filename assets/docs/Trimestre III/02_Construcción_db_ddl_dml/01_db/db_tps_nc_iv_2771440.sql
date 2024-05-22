## DROP DATABASE `db_tps_nc_iv_2771440`;
-- MySQL Script generated by MySQL Workbench
-- Thu May  2 19:44:44 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering
SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS,
  UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
  FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE,
  SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- -----------------------------------------------------
-- Schema db_tps_nc_iv_2771440
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_tps_nc_iv_2771440
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_tps_nc_iv_2771440` DEFAULT CHARACTER SET utf8;
USE `db_tps_nc_iv_2771440`;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`ROLES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`ROLES` (
  `rol_code` INT NOT NULL AUTO_INCREMENT,
  `rol_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`rol_code`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`USERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`USERS` (
  `rol_code` INT NOT NULL,
  `user_code` INT NOT NULL AUTO_INCREMENT,
  `user_name` VARCHAR(100) NOT NULL,
  `user_lastname` VARCHAR(100) NOT NULL,
  `user_id` VARCHAR(20) NOT NULL,
  `user_email` VARCHAR(100) NOT NULL,
  `user_pass` VARCHAR(200) NOT NULL,
  `user_state` TINYINT NOT NULL,
  PRIMARY KEY (`user_code`),
  INDEX `ind_users_roles` (`rol_code` ASC),
  CONSTRAINT `fk_users_roles` FOREIGN KEY (`rol_code`) REFERENCES `db_tps_nc_iv_2771440`.`ROLES` (`rol_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`CUSTOMERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`CUSTOMERS` (
  `customer_code` INT NOT NULL,
  `customer_datebirth` DATE NOT NULL,
  `customer_address` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`customer_code`),
  CONSTRAINT `fk_customers_users` FOREIGN KEY (`customer_code`) REFERENCES `db_tps_nc_iv_2771440`.`USERS` (`user_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`CATEGORIES`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`CATEGORIES` (
  `category_code` INT NOT NULL,
  `category_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`category_code`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`PRODUCTS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`PRODUCTS` (
  `category_code` INT NOT NULL,
  `product_code` INT NOT NULL,
  `product_name` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`product_code`),
  INDEX `ind_products_categories` (`category_code` ASC),
  CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_code`) REFERENCES `db_tps_nc_iv_2771440`.`CATEGORIES` (`category_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`ORDERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`ORDERS` (
  `customer_code` INT NOT NULL,
  `order_code` INT NOT NULL,
  `order_date` DATE NOT NULL,
  PRIMARY KEY (`order_code`),
  INDEX `ind_orders_customers` (`customer_code` ASC),
  CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_code`) REFERENCES `db_tps_nc_iv_2771440`.`CUSTOMERS` (`customer_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `db_tps_nc_iv_2771440`.`LIST_PRODUCTS_ORDERS`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_tps_nc_iv_2771440`.`LIST_PRODUCTS_ORDERS` (
  `order_code` INT NOT NULL,
  `product_code` INT NOT NULL,
  `quantity_products` INT NOT NULL,
  INDEX `ind_list_products_orders` (`order_code` ASC),
  INDEX `ind_list_products_products` (`product_code` ASC),
  CONSTRAINT `fk_list_products_orders` FOREIGN KEY (`order_code`) REFERENCES `db_tps_nc_iv_2771440`.`ORDERS` (`order_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_list_products_products` FOREIGN KEY (`product_code`) REFERENCES `db_tps_nc_iv_2771440`.`PRODUCTS` (`product_code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB;
SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;