-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema inventory
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventory
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventory` DEFAULT CHARACTER SET utf8 ;
USE `inventory` ;

-- -----------------------------------------------------
-- Table `inventory`.`department`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`department` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `namedept` VARCHAR(255) NULL,
                                                        PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`typeplace`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`typeplace` (
                                                       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                       `name` VARCHAR(255) NULL,
                                                       PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`filial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`filial` (
                                                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                    `name` VARCHAR(45) NULL,
                                                    `locality` VARCHAR(45) NULL,
                                                    PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`building`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`building` (
                                                      `id` INT NOT NULL,
                                                      `name` VARCHAR(45) NULL,
                                                      `street` VARCHAR(45) NULL,
                                                      `number` VARCHAR(45) NULL,
                                                      `filial_id` INT UNSIGNED NOT NULL,
                                                      PRIMARY KEY (`id`),
                                                      INDEX `fk_building_filial1_idx` (`filial_id` ASC),
                                                      CONSTRAINT `fk_building_filial1`
                                                          FOREIGN KEY (`filial_id`)
                                                              REFERENCES `inventory`.`filial` (`id`)
                                                              ON DELETE NO ACTION
                                                              ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`floor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`floor` (
                                                   `id` INT NOT NULL,
                                                   `number` INT NULL,
                                                   `building_id` INT NOT NULL,
                                                   PRIMARY KEY (`id`),
                                                   INDEX `fk_floor_building1_idx` (`building_id` ASC),
                                                   CONSTRAINT `fk_floor_building1`
                                                       FOREIGN KEY (`building_id`)
                                                           REFERENCES `inventory`.`building` (`id`)
                                                           ON DELETE NO ACTION
                                                           ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`placement`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`placement` (
                                                       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                       `placement` VARCHAR(45) NULL,
                                                       `typeplace_id` INT UNSIGNED NOT NULL,
                                                       `floor_id` INT NOT NULL,
                                                       PRIMARY KEY (`id`),
                                                       INDEX `fk_placement_typeplace1_idx` (`typeplace_id` ASC),
                                                       INDEX `fk_placement_floor1_idx` (`floor_id` ASC),
                                                       CONSTRAINT `fk_placement_typeplace1`
                                                           FOREIGN KEY (`typeplace_id`)
                                                               REFERENCES `inventory`.`typeplace` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_placement_floor1`
                                                           FOREIGN KEY (`floor_id`)
                                                               REFERENCES `inventory`.`floor` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`workplace`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`workplace` (
                                                       `id` BIGINT NOT NULL,
                                                       `department_id` INT UNSIGNED NOT NULL,
                                                       `placement_id` INT UNSIGNED NOT NULL,
                                                       `active` TINYINT NOT NULL,
                                                       `name` VARCHAR(45) NULL,
                                                       PRIMARY KEY (`id`),
                                                       INDEX `fk_workplace_department_idx` (`department_id` ASC),
                                                       INDEX `fk_workplace_placement1_idx` (`placement_id` ASC),
                                                       UNIQUE INDEX `name_UNIQUE` (`name` ASC),
                                                       CONSTRAINT `fk_workplace_department`
                                                           FOREIGN KEY (`department_id`)
                                                               REFERENCES `inventory`.`department` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_workplace_placement1`
                                                           FOREIGN KEY (`placement_id`)
                                                               REFERENCES `inventory`.`placement` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`employee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`employee` (
                                                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                      `first_name` VARCHAR(255) NULL,
                                                      `surename` VARCHAR(255) NULL,
                                                      `middle_name` VARCHAR(255) NULL,
                                                      `department_id` INT UNSIGNED NOT NULL,
                                                      `workplace_id` BIGINT NOT NULL,
                                                      PRIMARY KEY (`id`),
                                                      INDEX `fk_employee_department1_idx` (`department_id` ASC),
                                                      INDEX `fk_employee_workplace1_idx` (`workplace_id` ASC),
                                                      CONSTRAINT `fk_employee_department1`
                                                          FOREIGN KEY (`department_id`)
                                                              REFERENCES `inventory`.`department` (`id`)
                                                              ON DELETE NO ACTION
                                                              ON UPDATE NO ACTION,
                                                      CONSTRAINT `fk_employee_workplace1`
                                                          FOREIGN KEY (`workplace_id`)
                                                              REFERENCES `inventory`.`workplace` (`id`)
                                                              ON DELETE NO ACTION
                                                              ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`manufacturers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`manufacturers` (
                                                           `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                           `name` VARCHAR(255) NULL,
                                                           PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`type` (
                                                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                  `name` VARCHAR(255) NULL,
                                                  PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`models`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`models` (
                                                    `id` INT NOT NULL,
                                                    `name` VARCHAR(255) NULL,
                                                    `manufacturers_id` INT UNSIGNED NOT NULL,
                                                    `typeinvent_id` INT UNSIGNED NOT NULL,
                                                    PRIMARY KEY (`id`),
                                                    INDEX `fk_models_manufacturers1_idx` (`manufacturers_id` ASC),
                                                    INDEX `fk_models_typeinvent1_idx` (`typeinvent_id` ASC),
                                                    CONSTRAINT `fk_models_manufacturers1`
                                                        FOREIGN KEY (`manufacturers_id`)
                                                            REFERENCES `inventory`.`manufacturers` (`id`)
                                                            ON DELETE NO ACTION
                                                            ON UPDATE NO ACTION,
                                                    CONSTRAINT `fk_models_typeinvent1`
                                                        FOREIGN KEY (`typeinvent_id`)
                                                            REFERENCES `inventory`.`type` (`id`)
                                                            ON DELETE NO ACTION
                                                            ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`providers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`providers` (
                                                       `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                       `name` VARCHAR(255) NOT NULL,
                                                       PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`status` (
                                                    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                    `name` VARCHAR(255) NULL,
                                                    PRIMARY KEY (`id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`inventory`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`inventory` (
                                                       `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                       `parrent_id` BIGINT UNSIGNED NULL,
                                                       `workplace_id` BIGINT NOT NULL,
                                                       `name` VARCHAR(255) NULL,
                                                       `buhcode` VARCHAR(255) NULL,
                                                       `models_id` INT NULL,
                                                       `active` TINYINT NOT NULL,
                                                       `provider_id` INT UNSIGNED NOT NULL,
                                                       `date_of_delivery` TIMESTAMP NOT NULL,
                                                       `guarantee_period` INT NOT NULL,
                                                       `status_id` INT UNSIGNED NOT NULL,
                                                       PRIMARY KEY (`id`),
                                                       INDEX `fk_inventory_inventory1_idx` (`parrent_id` ASC),
                                                       INDEX `fk_inventory_workplace1_idx` (`workplace_id` ASC),
                                                       INDEX `fk_inventory_models1_idx` (`models_id` ASC),
                                                       INDEX `fk_inventory_provider1_idx` (`provider_id` ASC),
                                                       INDEX `fk_inventory_status1_idx` (`status_id` ASC),
                                                       CONSTRAINT `fk_inventory_inventory1`
                                                           FOREIGN KEY (`parrent_id`)
                                                               REFERENCES `inventory`.`inventory` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_inventory_workplace1`
                                                           FOREIGN KEY (`workplace_id`)
                                                               REFERENCES `inventory`.`workplace` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_inventory_models1`
                                                           FOREIGN KEY (`models_id`)
                                                               REFERENCES `inventory`.`models` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_inventory_provider1`
                                                           FOREIGN KEY (`provider_id`)
                                                               REFERENCES `inventory`.`providers` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION,
                                                       CONSTRAINT `fk_inventory_status1`
                                                           FOREIGN KEY (`status_id`)
                                                               REFERENCES `inventory`.`status` (`id`)
                                                               ON DELETE NO ACTION
                                                               ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`typeattrib`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`typeattrib` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `name` VARCHAR(255) NULL,
                                                        `typeinvent_id` INT UNSIGNED NOT NULL,
                                                        PRIMARY KEY (`id`),
                                                        INDEX `fk_typeattrib_typeinvent1_idx` (`typeinvent_id` ASC),
                                                        CONSTRAINT `fk_typeattrib_typeinvent1`
                                                            FOREIGN KEY (`typeinvent_id`)
                                                                REFERENCES `inventory`.`type` (`id`)
                                                                ON DELETE NO ACTION
                                                                ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`roles` (
                                                   `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                   `name` VARCHAR(255) NOT NULL,
                                                   PRIMARY KEY (`id`),
                                                   UNIQUE INDEX `name_UNIQUE` (`name` ASC))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`user` (
                                                  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                  `username` VARCHAR(255) NOT NULL,
                                                  `password` VARCHAR(45) NOT NULL,
                                                  `roles_id` INT UNSIGNED NOT NULL,
                                                  PRIMARY KEY (`id`),
                                                  UNIQUE INDEX `username_UNIQUE` (`username` ASC),
                                                  INDEX `fk_user_roles1_idx` (`roles_id` ASC),
                                                  CONSTRAINT `fk_user_roles1`
                                                      FOREIGN KEY (`roles_id`)
                                                          REFERENCES `inventory`.`roles` (`id`)
                                                          ON DELETE NO ACTION
                                                          ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `inventory`.`moves`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`moves` (
                                                   `inventory_id` BIGINT UNSIGNED NOT NULL,
                                                   `from_id` BIGINT NOT NULL,
                                                   `to_id` BIGINT NOT NULL,
                                                   `date_moves` DATETIME NULL,
                                                   `descriptions` TEXT NULL,
                                                   `user_id` INT UNSIGNED NOT NULL,
                                                   INDEX `fk_moves_inventory1_idx` (`inventory_id` ASC),
                                                   INDEX `fk_moves_workplace1_idx` (`from_id` ASC),
                                                   INDEX `fk_moves_user1_idx` (`user_id` ASC),
                                                   INDEX `fk_moves_workplace2_idx` (`to_id` ASC),
                                                   CONSTRAINT `fk_moves_inventory1`
                                                       FOREIGN KEY (`inventory_id`)
                                                           REFERENCES `inventory`.`inventory` (`id`)
                                                           ON DELETE NO ACTION
                                                           ON UPDATE NO ACTION,
                                                   CONSTRAINT `fk_moves_workplace1`
                                                       FOREIGN KEY (`from_id`)
                                                           REFERENCES `inventory`.`workplace` (`id`)
                                                           ON DELETE NO ACTION
                                                           ON UPDATE NO ACTION,
                                                   CONSTRAINT `fk_moves_user1`
                                                       FOREIGN KEY (`user_id`)
                                                           REFERENCES `inventory`.`user` (`id`)
                                                           ON DELETE NO ACTION
                                                           ON UPDATE NO ACTION,
                                                   CONSTRAINT `fk_moves_workplace2`
                                                       FOREIGN KEY (`to_id`)
                                                           REFERENCES `inventory`.`workplace` (`id`)
                                                           ON DELETE NO ACTION
                                                           ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`attributes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`attributes` (
                                                        `models_id` INT NOT NULL,
                                                        `typeattrib_id` INT UNSIGNED NOT NULL,
                                                        `values` VARCHAR(255) NULL,
                                                        PRIMARY KEY (`models_id`, `typeattrib_id`),
                                                        INDEX `fk_models_has_typeattrib_typeattrib1_idx` (`typeattrib_id` ASC),
                                                        INDEX `fk_models_has_typeattrib_models1_idx` (`models_id` ASC),
                                                        CONSTRAINT `fk_models_has_typeattrib_models1`
                                                            FOREIGN KEY (`models_id`)
                                                                REFERENCES `inventory`.`models` (`id`)
                                                                ON DELETE NO ACTION
                                                                ON UPDATE NO ACTION,
                                                        CONSTRAINT `fk_models_has_typeattrib_typeattrib1`
                                                            FOREIGN KEY (`typeattrib_id`)
                                                                REFERENCES `inventory`.`typeattrib` (`id`)
                                                                ON DELETE NO ACTION
                                                                ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`permission`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`permission` (
                                                        `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                                                        `name` VARCHAR(255) NOT NULL,
                                                        PRIMARY KEY (`id`),
                                                        UNIQUE INDEX `name_UNIQUE` (`name` ASC))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`permission_has_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`permission_has_roles` (
                                                                  `permission_id` INT UNSIGNED NOT NULL,
                                                                  `roles_id` INT UNSIGNED NOT NULL,
                                                                  PRIMARY KEY (`permission_id`, `roles_id`),
                                                                  INDEX `fk_permission_has_roles_roles1_idx` (`roles_id` ASC),
                                                                  INDEX `fk_permission_has_roles_permission1_idx` (`permission_id` ASC),
                                                                  CONSTRAINT `fk_permission_has_roles_permission1`
                                                                      FOREIGN KEY (`permission_id`)
                                                                          REFERENCES `inventory`.`permission` (`id`)
                                                                          ON DELETE NO ACTION
                                                                          ON UPDATE NO ACTION,
                                                                  CONSTRAINT `fk_permission_has_roles_roles1`
                                                                      FOREIGN KEY (`roles_id`)
                                                                          REFERENCES `inventory`.`roles` (`id`)
                                                                          ON DELETE NO ACTION
                                                                          ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `inventory`.`user_has_filial`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventory`.`user_has_filial` (
                                                             `user_id` INT UNSIGNED NOT NULL,
                                                             `filial_id` INT UNSIGNED NOT NULL,
                                                             PRIMARY KEY (`user_id`, `filial_id`),
                                                             INDEX `fk_user_has_filial_filial1_idx` (`filial_id` ASC),
                                                             INDEX `fk_user_has_filial_user1_idx` (`user_id` ASC),
                                                             CONSTRAINT `fk_user_has_filial_user1`
                                                                 FOREIGN KEY (`user_id`)
                                                                     REFERENCES `inventory`.`user` (`id`)
                                                                     ON DELETE NO ACTION
                                                                     ON UPDATE NO ACTION,
                                                             CONSTRAINT `fk_user_has_filial_filial1`
                                                                 FOREIGN KEY (`filial_id`)
                                                                     REFERENCES `inventory`.`filial` (`id`)
                                                                     ON DELETE NO ACTION
                                                                     ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
