CREATE SCHEMA IF NOT EXISTS `reservations` DEFAULT CHARACTER SET utf8 ;
USE `reservations` ;

-- -----------------------------------------------------
-- Table `reservations`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservations`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `prenom` VARCHAR(50) NULL,
  `nom` VARCHAR(50) NULL,
  `email` VARCHAR(150) NULL,
  `mdp` VARCHAR(250) NULL,
  `role` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reservations`.`type_activities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservations`.`type_activities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reservations`.`activities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservations`.`activities` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NULL,
  `type_id` INT NULL,
  `place_disponibles` INT NULL,
  `description` VARCHAR(50) NULL,
  `datetime_debut` INT NULL,
  `duree` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_activities_type_activities1_idx` (`type_id` ASC) VISIBLE,
  CONSTRAINT `fk_activities_type_activities1`
    FOREIGN KEY (`type_id`)
    REFERENCES `reservations`.`type_activities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reservations`.`reservations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservations`.`reservations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `user_id` INT NULL,
  `activite_id` INT NULL,
  `date_reservation` VARCHAR(150) NULL,
  `etat` TINYINT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_reservations_users_idx` (`user_id` ASC) VISIBLE,
  INDEX `fk_reservations_activities1_idx` (`activite_id` ASC) VISIBLE,
  CONSTRAINT `fk_reservations_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `reservations`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_reservations_activities1`
    FOREIGN KEY (`activite_id`)
    REFERENCES `reservations`.`activities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
bdd.txt
3 KB

ALTER TABLE `users` CHANGE `isAdmin` `role` VARCHAR(50) NULL DEFAULT 'user';