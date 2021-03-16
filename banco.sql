-- -----------------------------------------------------
-- Base A
-- -----------------------------------------------------
CREATE DATABASE 'basea';
ALTER DATABASE `basea` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- -----------------------------------------------------
-- Table `pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `divida` (
        `idDivida` INT(11) NOT NULL AUTO_INCREMENT,
        `tipo` VARCHAR(20) NOT NULL,
        `dataVencimento` DATE NOT NULL,
	`valorOrignario` float(10) NULL DEFAULT NULL,
        `vl_multa` float(10) unsigned DEFAULT 0 NOT NULL,
        PRIMARY KEY (`idDivida`)       
);

-- -----------------------------------------------------
-- Table `pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pessoa` (
        `idPessoa` INT(11) NOT NULL AUTO_INCREMENT,
        `nome` VARCHAR(70) NOT NULL,
        `cpf` VARCHAR(20) NOT NULL,
        `idade` INT(3) NOT NULL,
        `endereco` VARCHAR(70) NULL DEFAULT NULL,
        `divida_id` int(11) NULL,
	`dataCadastro` DATETIME NOT NULL,
        PRIMARY KEY (`idPessoa`),
        CONSTRAINT `fk_divida_pessoa` FOREIGN KEY (`divida_id`) REFERENCES `divida` (`idDivida`)
);

CREATE INDEX idx_pessoa ON pessoa (cpf ASC, endereco ASC);

-------------------------------------------------------------------------------
-- -----------------------------------------------------
-- Base B
-- -----------------------------------------------------
CREATE DATABASE 'baseb';
ALTER DATABASE `baseb` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `lista_bens` (
        `idBens` INT(11) NOT NULL AUTO_INCREMENT,
        `tipo` VARCHAR(20) NOT NULL,
	`descricao` VARCHAR(70) NULL DEFAULT NULL,
        PRIMARY KEY (`idBens`)       
);

CREATE TABLE IF NOT EXISTS `score` (
        `idScore` INT(11) NOT NULL AUTO_INCREMENT,
        `idPessoa` VARCHAR(20) NOT NULL,
	`tipoFonteRenda` VARCHAR(20) NULL DEFAULT NULL,
        `bens_id` int(11) NOT NULL,
	`dataCadastro` DATETIME NOT NULL,
        PRIMARY KEY (`idScore`),
        CONSTRAINT `fk_divida_bens` FOREIGN KEY (`bens_id`) REFERENCES `lista_bens` (`idBens`)
);

-------------------------------------------------------------------------------
-- -----------------------------------------------------
-- Base C
-- -----------------------------------------------------
CREATE DATABASE 'basec';
ALTER DATABASE `basec` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `tb_ultimaCompra` (
        `idUltimaCompra` INT(11) NOT NULL AUTO_INCREMENT,
        `valor` float(10) NULL DEFAULT NULL,
        `dataCompra` DATETIME NOT NULL,
        PRIMARY KEY (`idUltimaCompra`)
);

CREATE TABLE IF NOT EXISTS `log` (
        `idLog` INT(11) NOT NULL AUTO_INCREMENT,
        `idPessoa` VARCHAR(20) NOT NULL,
	`movimentacaoFinanceira` VARCHAR(20) NULL DEFAULT NULL,
	`ultimaCompra_id` int(11) NOT NULL,
        `dataRegistro` DATETIME NOT NULL,
        PRIMARY KEY (`idLog`),
        CONSTRAINT `fk_divida_log` FOREIGN KEY (`ultimaCompra_id`) REFERENCES `tb_ultimaCompra` (`idUltimaCompra`)
);