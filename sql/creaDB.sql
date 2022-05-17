-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema news
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema news
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `news` DEFAULT CHARACTER SET utf8 ;
USE `news` ;

-- -----------------------------------------------------
-- Table `news`.`Category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `news`.`Category` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `news`.`Authors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `news`.`Authors` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  `firstname` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `news`.`Articles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `news`.`Articles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `abstract` TEXT NOT NULL,
  `article` TEXT NOT NULL,
  `image` VARCHAR(255) NULL,
  `reactions` INT NOT NULL DEFAULT 0,
  `date` DATETIME NOT NULL,
  `Category_id` INT NOT NULL,
  `Authors_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Articles_Category1_idx` (`Category_id` ASC) VISIBLE,
  INDEX `fk_Articles_Authors1_idx` (`Authors_id` ASC) VISIBLE,
  CONSTRAINT `fk_Articles_Category1`
    FOREIGN KEY (`Category_id`)
    REFERENCES `news`.`Category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Articles_Authors1`
    FOREIGN KEY (`Authors_id`)
    REFERENCES `news`.`Authors` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `news`.`Users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `news`.`Users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `enabled` TINYINT(1) NOT NULL DEFAULT 0,
  `admin` TINYINT(1) NOT NULL DEFAULT 0,
  `activationCode` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) VISIBLE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `news`.`Comments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `news`.`Comments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `content` TEXT NOT NULL,
  `Users_id` INT NOT NULL,
  `Articles_id` INT NOT NULL,
  `Comments_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Comments_Users_idx` (`Users_id` ASC) VISIBLE,
  INDEX `fk_Comments_Articles1_idx` (`Articles_id` ASC) VISIBLE,
  INDEX `fk_Comments_Comments1_idx` (`Comments_id` ASC) VISIBLE,
  CONSTRAINT `fk_Comments_Users`
    FOREIGN KEY (`Users_id`)
    REFERENCES `news`.`Users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Articles1`
    FOREIGN KEY (`Articles_id`)
    REFERENCES `news`.`Articles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Comments_Comments1`
    FOREIGN KEY (`Comments_id`)
    REFERENCES `news`.`Comments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
