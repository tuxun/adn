-- phpMyAdmin SQL Dump
-- version 4.2.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2014 at 04:59 PM
-- Server version: 5.5.39-1
-- PHP Version: 5.6.0-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `orm`
--

-- --------------------------------------------------------

--
-- Table structure for table `Article`
--

CREATE TABLE IF NOT EXISTS `Article` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `article` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `rootnuke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rootvalid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usernuke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uservalid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `commentable` tinyint(1) NOT NULL,
  `inmenu` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Article`
--

INSERT INTO `Article` (`id`, `email`, `article`, `user`, `date`, `rootnuke`, `rootvalid`, `usernuke`, `uservalid`, `titre`, `commentable`, `inmenu`) VALUES
(0, 'tuxunpro@gmail.com', 'discut', 'tuxun', '2014-09-17 00:00:00', '', 'CONFIRMED', '', 'CONFIRMED', 'fake', 0, 0),
(1, 'tuxunpro@gmail.com', '<h4>Venez découvrir le monde du logiciel libre à ADETI!</h4><p id="adeti">\r\nADETI est une association (loi 1901) basée à Tours dont l''objectif principal est la promotion de la culture du logiciel libre dans la région tourangelle.\r\n<br/><br/>\r\nPour nous organiser et répondre à vos questions, nous tenons une permanence le mardi au centre <a  href=" http://www.openstreetmap.org/way/248476030#map=17/47.41370/0.68619" id="t1">Léo Lagrange Gentiana</a> à Tours nord (90 avenue Maginot) de 18h30 à 20h30.<br/><br/>\r\nNous tenons aussi une <a href="#mail-list">mailing-list</a>* pour échanger des informations et gérer les problèmes que nous rencontrons tous les jours. Vous pouvez vous y inscrire, si vous voulez des renseignements avant de venir, par exemple, n''hésitez pas c''est fait pour ça.\r\n<br/><br/>\r\nNous pouvons aussi vous fournir (librement!) des CD de démonstration ou une clé USB permettant de démarrer votre ordinateur sur un système d''exploitation alternatif sans rien installer, et organisons de temps en temps des rassemblements pour promouvoir l''usage des logiciels libres. C''est ce qu''on appelle <a href="https://fr.wikipedia.org/wiki/Install_party">des install party !</a><br/><br/>\r\nNous vous attendons avec impatience!\r\n</p>\r\n<p id="mail-list">*A propos de notre mailing list...\r\nUne mailing-list est un système permettant à un utilisateur inscrit dans un groupe de transmettre un message à tout ce groupe d''utilisateur grace à une seule addresse mail.\r\nVous pouvez vous inscrire à la notre <a href="http://lists.adeti.org/cgi-bin/mailman/listinfo/libre-en-touraine">ici</a> et lui écrire en utilisant le formulaire ci dessous.\r\n</p>', 'tuxun', '2014-09-17 00:00:00', '', 'CONFIRMED', '', 'CONFIRMED', 'Permanences', 1, 1),
(2, 'tuxunpro@gmail.com', '<span class="menuleftfooter">\r\n        <a href=''http://www.php.net/''>\r\n			<img  src="http://diasporaesprod.free.fr/rsc/img/footer/php5-powered.gif" alt="logo de PHP5" height=''15'' width=''80'' />\r\n        </a><br/>\r\n        <a href=''http://www.mysql.fr/''>\r\n            <img  src="http://diasporaesprod.free.fr/rsc/img/footer/mysql-powered.gif" alt="logo de MySQL5" height=''15'' width=''80'' />\r\n        </a>\r\n    </span>\r\n	<span class="menurightfooter" style="display:block;margin:auto;">\r\n	    <a href=''http://validator.w3.org/check?uri=http%3A%2F%2Flug.adeti.org%2Fanniv.php&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;ss=1&amp;outline=1&amp;group=0&amp;verbose=1&amp;user-agent=W3C_Validator%2F1.3+http%3A%2F%2Fvalidator.w3.org%2Fservices''>\r\n            <img  src="http://diasporaesprod.free.fr/rsc/img/footer/w3c-xhtml1.1.gif" alt="Site valide XHTML strict 1.1" height=''15'' width=''80'' />\r\n        </a><br/>\r\n        <a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Flug.adeti.org%2Fanniv.php">\r\n            <img src="http://diasporaesprod.free.fr/rsc/img/footer/w3c-css2.1.gif" alt="Valid CSS 2.1" height="15" width="80" />\r\n        </a>\r\n    </span>\r\n	<div style="clear:none;display:block;margin-top:5px;" class="centered">\r\n		<a href="http://www.adeti.org/-L-association-">Tuxun Free Software <img src="/lug/sf2/src/Adeti/BlogBundle/Resources/public/images/ccbyncsa.png" alt="Creative Commons" height="22" width="80" /> TFLSH 2011-2014\r\n		</a>\r\n	</div>', 'tuxun', '2014-09-17 00:00:01', '', 'CONFIRMED', '', 'CONFIRMED', 'FOOT', 0, 0),
(3, 'tuxunpro@gmail.com', '<p class="scontenu">*\r\nhttp://www.adeti.org/Adherer<br/>\r\nhttp://www.adeti.org/Les-statuts<br/>\r\nhttp://www.adeti.org/Autorisation-de-reproduction-et-de<br/>\r\nhttp://www.adeti.org/Tracts<br/>\r\nhttp://www.adeti.org/-L-association-<br/>\r\n</p>', 'tuxun', '2014-09-17 00:00:02', '', 'CONFIRMED', '', 'CONFIRMED', 'Liens utiles', 1, 1),
(4, 'tuxunpro@gmail.com', '  <div><span id="alerttt">Attention: Site en chantier<br/>\r\nVous pouvez utiliser le formulaire ci dessous pour nous contacter<br/>Sinon... on se voit en septembre!</span></div>\r\n<div id="admlogo">!</div>', 'tuxun', '2014-09-17 00:00:01', '', 'CONFIRMED', '', 'CONFIRMED', 'HEAD', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Commentaire`
--

CREATE TABLE IF NOT EXISTS `Commentaire` (
`id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `rootnuke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rootvalid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usernuke` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uservalid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reponseto` int(11) NOT NULL,
  `idArticle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Commentaire`
--

INSERT INTO `Commentaire` (`id`, `email`, `message`, `user`, `date`, `rootnuke`, `rootvalid`, `usernuke`, `uservalid`, `reponseto`, `idArticle_id`) VALUES
(2, 'benoit-mendousse@mailoo.org', '1T1M', 'tuxun', '2014-09-20 00:00:00', '', 'CONFIRMED', '', 'CONFIRMED', 0, 1),
(3, 'benoit-mendousse@mailoo.org', '1T2M', 'benoit', '2014-09-20 00:00:04', '', 'CONFIRMED', '', 'CONFIRMED', 0, 1),
(4, 'benoit-mendousse@mailoo.org', '1T3M', 'tuxun', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 0, 1),
(5, 'benoit-mendousse@mailoo.org', '2T1M', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 0, 3),
(6, 'benoit-mendousse@mailoo.org', '2T2M', 'tuxun', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 0, 3),
(7, 'benoit-mendousse@mailoo.org', '2T3M', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 0, 3),
(8, 'benoit-mendousse@mailoo.org', 'D1M1', 'patzub', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 8, 0),
(9, 'benoit-mendousse@mailoo.org', 'D2M1', 'le lud', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 9, 0),
(10, 'benoit-mendousse@mailoo.org', 'D3M1', 'tux', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 10, 0),
(11, 'benoit-mendousse@mailoo.org', 'D1M2', 'tux', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 8, 0),
(12, 'benoit-mendousse@mailoo.org', 'D1M3', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 11, 0),
(13, 'benoit-mendousse@mailoo.org', 'D2M2', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 9, 0),
(14, 'benoit-mendousse@mailoo.org', 'D2M3', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 13, 0),
(15, 'benoit-mendousse@mailoo.org', 'D3M2', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 10, 0),
(16, 'benoit-mendousse@mailoo.org', 'D3M3', 'benoit', '2014-09-20 00:00:07', '', 'CONFIRMED', '', 'CONFIRMED', 15, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Article`
--
ALTER TABLE `Article`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Commentaire`
--
ALTER TABLE `Commentaire`
 ADD PRIMARY KEY (`id`), ADD KEY `IDX_E16CE76BF0609876` (`idArticle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Article`
--
ALTER TABLE `Article`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Commentaire`
--
ALTER TABLE `Commentaire`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commentaire`
--
ALTER TABLE `Commentaire`
ADD CONSTRAINT `FK_E16CE76BF0609876` FOREIGN KEY (`idArticle_id`) REFERENCES `Article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
