SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='';

CREATE SCHEMA IF NOT EXISTS `mybestroulette` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mybestroulette` ;

-- -----------------------------------------------------
-- Table `mybestroulette`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `avatar` VARCHAR(255) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`event` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NULL,
  `creator_id` INT UNSIGNED NOT NULL,
  `description` TEXT NULL,
  `start_at` DATETIME NOT NULL,
  `ends_at` DATETIME NULL,
  `location` VARCHAR(512) NULL,
  `min_participants` INT NULL,
  `max_participants` INT NULL,
  `last_randomization_at` DATETIME NULL,
  `price` FLOAT(7,2) NULL,
  `is_finished` TINYINT(1) NOT NULL DEFAULT false,
  `surprise_me` TINYINT(1) NOT NULL DEFAULT false,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`tag` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `label` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `label_UNIQUE` (`label` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`user_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`user_tag` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `tag_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_UserTag_User_id_idx` (`user_id` ASC),
  INDEX `FK_UserTag_Tag_id_idx` (`tag_id` ASC),
  CONSTRAINT `FK_UserTag_User_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `mybestroulette`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_UserTag_Tag_id`
    FOREIGN KEY (`tag_id`)
    REFERENCES `mybestroulette`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`event_tag`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`event_tag` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` INT UNSIGNED NOT NULL,
  `tag_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_EventTag_Event_id_idx` (`event_id` ASC),
  INDEX `FK_EventTag_Tag_id_idx` (`tag_id` ASC),
  CONSTRAINT `FK_EventTag_Event_id`
    FOREIGN KEY (`event_id`)
    REFERENCES `mybestroulette`.`event` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_EventTag_Tag_id`
    FOREIGN KEY (`tag_id`)
    REFERENCES `mybestroulette`.`tag` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`event_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`event_user` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_id` INT UNSIGNED NOT NULL,
  `user_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_EventUser_User_id_idx` (`user_id` ASC),
  INDEX `FK_EventUser_Event_id_idx` (`event_id` ASC),
  CONSTRAINT `FK_EventUser_User_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `mybestroulette`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_EventUser_Event_id`
    FOREIGN KEY (`event_id`)
    REFERENCES `mybestroulette`.`event` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mybestroulette`.`notification`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mybestroulette`.`notification` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `title` VARCHAR(255) NULL,
  `content` TEXT NULL,
  `created_at` DATETIME NOT NULL,
  `is_read` TINYINT(1) NOT NULL DEFAULT false,
  `event_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_Notification_User_id_idx` (`user_id` ASC),
  INDEX `FK_Notification_Event_id_idx` (`event_id` ASC),
  CONSTRAINT `FK_Notification_User_id`
    FOREIGN KEY (`user_id`)
    REFERENCES `mybestroulette`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Notification_Event_id`
    FOREIGN KEY (`event_id`)
    REFERENCES `mybestroulette`.`event` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
