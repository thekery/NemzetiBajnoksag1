---  Klubok Táblája --- 

CREATE DATABASE IF NOT EXISTS `nb1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nb1`;

--- Ha már létezik az adatbázis ---

CREATE TABLE IF NOT EXISTS `klub` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `klubnev` varchar(50) NOT NULL ,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

---  Játékosok Táblája --- 

CREATE DATABASE IF NOT EXISTS `nb1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nb1`;

--- Ha már létezik az adatbázis alábbi tábla létrehozása ---

CREATE TABLE IF NOT EXISTS `labdarugok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mezszam` int(2) NOT NULL,
  `klubid` int(2) NOT NULL,
  `posztid` int(2) NOT NULL,
  `utonev` varchar(40) NOT NULL ,
  `vezeteknev` varchar(40) NOT ,
  `szulido` DATE(12) NOT NULL ,
  `magyar` varchar(40) NOT NULL ,
  `kulfoldi` varchar(40) NOT NULL ,
  `ertek` int(3) NOT NULL ,
  
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

---  Posztok Táblája --- 

CREATE DATABASE IF NOT EXISTS `nb1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nb1`;

--- Ha már létezik az adatbázis ---

CREATE TABLE IF NOT EXISTS `poszt` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `posztnev` varchar(50) NOT NULL ,

  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

---  Menu Táblája --- 

CREATE DATABASE IF NOT EXISTS `nb1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nb1`;

--- Ha már létezik az adatbázis ---

CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,

  PRIMARY KEY (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--- Menü elemek feltöltése ---

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('nyitolap', 'Nyitólap', '', '111', 10),
('rolunk', 'Rólunk', '', '111', 20),
('linkek', 'Linkek', '', '100', 30),
('alapinfok', 'Alapinfók', 'rolunk', '111', 40),
('kiegeszitesek', 'Kiegészítések', 'rolunk', '011', 50),
('belepes', 'Belépés', '', '100', 60),
('regisztacio', 'Regisztráció', '', '100', 65),
('kilepes', 'Kilépés', '', '011', 70),
('admin', 'Admin', '', '001', 80);

--- Felhasználó tábla létrehozása ---

CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(60) NOT NULL DEFAULT '',
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--- Felhasználók feltöltése ---

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`,`email`, `jogosultsag`) VALUES
(1, 'Rendszer', 'Admin', 'Admin', sha1('admin'),'admin@admin.hu', '__1'),
(2, 'Családi_2', 'Utónév_2', 'Login2', sha1('login2'),'login2@test.hu', '_1_'),
(3, 'Családi_3', 'Utónév_3', 'Login3', sha1('login3'),'login3@test.hu', '_1_'),
(4, 'Családi_4', 'Utónév_4', 'Login4', sha1('login4'),'login4@test.hu', '_1_'),
(5, 'Családi_5', 'Utónév_5', 'Login5', sha1('login5'),'login5@test.hu', '_1_'),
(6, 'Családi_6', 'Utónév_6', 'Login6', sha1('login6'),'login6@test.hu', '_1_'),
(7, 'Családi_7', 'Utónév_7', 'Login7', sha1('login7'),'login7@test.hu', '_1_'),
(8, 'Családi_8', 'Utónév_8', 'Login8', sha1('login8'),'login8@test.hu', '_1_'),
(9, 'Családi_9', 'Utónév_9', 'Login9', sha1('login9'),'login9@test.hu', '_1_'),
(10, 'Családi_10', 'Utónév_10', 'Login10', sha1('login10'),'login10@test.hu', '_1_');

INSERT INTO `felhasznalok`(`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `email`, `jogosultsag`) 
VALUES ('0','mester','teszt','mester','sha1(mesterTeszt5)','tesztmester@mail.hu','_1_');

--- Hírek tábla létrehozása ---

CREATE TABLE IF NOT EXISTS `hirek` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cim` varchar(100) NOT NULL DEFAULT '',
  `tartalom` varchar(500) NOT NULL DEFAULT '',
  `hiridopont`DATETIME NOT NULL,
  `user_name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--- Hírek feltöltése ---

INSERT INTO `hirek`(`id`, `cim`, `tartalom`, `hiridopont`) 
VALUES ('1','Teszt cím az oldalhoz','Azért jött létre ez a hír hogy kirpóbáljuk hogyan működik a hír betöltő felület. Sokáig azt gondoltam, hogy macerás lesz. Végül megoldottam','2022.11.19 18:00:00'),
('2','2 Teszt','Nehezen jön össze ez a rész.','2022.11.20 18:00:00');

--- Kommentek feltöltése ---

CREATE TABLE IF NOT EXISTS `kommentek` (
    `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `comment_tartalom` varchar(100) NOT NULL DEFAULT '',
    `comment_idopont` DATETIME NOT NULL,
    `hir_id` int(10) NOT NULL,
    `user_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
    ) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;