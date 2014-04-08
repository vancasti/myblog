CREATE TABLE IF NOT EXISTS `dev_blogg`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));


CREATE TABLE IF NOT EXISTS `dev_blogg`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  `id_rol` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_idx` (`id_rol` ASC),
  CONSTRAINT `id`
    FOREIGN KEY (`id_rol`)
    REFERENCES `dev_blogg`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `dev_blogg`.`tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `dev_blogg`.`categories` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `valor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

CREATE TABLE `dev_blogg`.`publications` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(100) NOT NULL,
  `url` VARCHAR(60) NOT NULL,
  `cuerpo` TEXT NOT NULL,
  `fcreacion` DATETIME NOT NULL,
  `fmodificacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fpublicacion` DATETIME NULL,
  `id_autor` INT(11) NOT NULL,
  `id_categoria` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_idx` (`id_autor` ASC),
  INDEX `id_idx1` (`id_categoria` ASC),
  CONSTRAINT `publications-users`
    FOREIGN KEY (`id_autor`)
    REFERENCES `dev_blogg`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `publications-categories`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `dev_blogg`.`categories` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `dev_blogg`.`publications_tags` (
  `id_publication` INT(11) NOT NULL,
  `id_tag` INT(11) NOT NULL,
  PRIMARY KEY (`id_publication`, `id_tag`),
  INDEX `publication-tag_idx` (`id_tag` ASC),
  CONSTRAINT `tag_fk`
    FOREIGN KEY (`id_tag`)
    REFERENCES `dev_blogg`.`tags` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `publi_fk`
    FOREIGN KEY (`id_publication`)
    REFERENCES `dev_blogg`.`publications` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `dev_blogg`.`statistics` (
  `id` INT(11) NOT NULL,
  `id_noticia` INT(11) NOT NULL,
  `nfacebook` INT NULL,
  `ntwitter` INT NULL,
  `ngoogle+` INT NULL,
  `ncomentarios` INT NULL,
  `nvisitas` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `statistics-publications_idx` (`id_noticia` ASC),
  CONSTRAINT `statistics-publications`
    FOREIGN KEY (`id_noticia`)
    REFERENCES `dev_blogg`.`publications` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE `dev_blogg`.`redirects` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(45) NOT NULL,
  `controller` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`));

