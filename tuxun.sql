-- phpMyAdmin SQL Dump
-- version 4.2.7.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2014 at 04:01 AM
-- Server version: 5.5.38-0+wheezy1
-- PHP Version: 5.6.0-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tuxun`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_articles`
--

CREATE TABLE IF NOT EXISTS `blog_articles` (
`id` int(11) NOT NULL,
  `usermail` text NOT NULL,
  `articles_postd` text NOT NULL,
  `userpostr` text NOT NULL,
  `datepost` text NOT NULL,
  `root_nukethis_uid` text NOT NULL,
  `root_valide_this` text NOT NULL,
  `user_nukethis_uid` text NOT NULL,
  `user_valide_this` text NOT NULL,
  `titre` text NOT NULL,
  `commentable` tinyint(1) NOT NULL DEFAULT '0',
  `in_menu` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog_articles`
--

INSERT INTO `blog_articles` (`id`, `usermail`, `articles_postd`, `userpostr`, `datepost`, `root_nukethis_uid`, `root_valide_this`, `user_nukethis_uid`, `user_valide_this`, `titre`, `commentable`, `in_menu`) VALUES
(1, 'tuxunpro@gmail.com', '<h4>Venez découvrir le monde du logiciel libre à ADETI!</h4><p id="adeti">\r\nADETI est une association (loi 1901) basée à Tours dont l''objectif principal est la promotion de la culture du logiciel libre dans la région tourangelle.\r\n<br/><br/>\r\nPour nous organiser et répondre à vos questions, nous tenons une permanence le mardi au centre <a  href=" http://www.openstreetmap.org/way/248476030#map=17/47.41370/0.68619" id="t1">Léo Lagrange Gentiana</a> à Tours nord (90 avenue Maginot) de 18h30 à 20h30.<br/><br/>\r\nNous tenons aussi une <a href="#mail-list">mailing-list</a>* pour échanger des informations et gérer les problèmes que nous rencontrons tous les jours. Vous pouvez vous y inscrire, si vous voulez des renseignements avant de venir, par exemple, n''hésitez pas c''est fait pour ça.\r\n<br/><br/>\r\nNous pouvons aussi vous fournir (librement!) des CD de démonstration ou une clé USB permettant de démarrer votre ordinateur sur un système d''exploitation alternatif sans rien installer, et organisons de temps en temps des rassemblements pour promouvoir l''usage des logiciels libres. C''est ce qu''on appelle <a href="https://fr.wikipedia.org/wiki/Install_party">des install party !</a><br/><br/>\r\nNous vous attendons avec impatience!\r\n</p>\r\n<p id="mail-list">*A propos de notre mailing list...\r\nUne mailing-list est un système permettant à un utilisateur inscrit dans un groupe de transmettre un message à tout ce groupe d''utilisateur grace à une seule addresse mail.\r\nVous pouvez vous inscrire à la notre <a href="http://lists.adeti.org/cgi-bin/mailman/listinfo/libre-en-touraine">ici</a> et lui écrire en utilisant le formulaire ci dessous.\r\n</p>', 'tuxun', 'mar. 05 juil. 2020 01:51:13', '4554', 'CONFIRMED', '', 'CONFIRMED', 'Adeti.org', 1, 0),
(2, 'tuxunpro@gmail.com', '<span class="menuleftfooter">\r\n        <a href=''http://www.php.net/''>\r\n			<img  src="http://diasporaesprod.free.fr/rsc/img/footer/php5-powered.gif" alt="logo de PHP5" height=''15'' width=''80'' />\r\n        </a><br/>\r\n        <a href=''http://www.mysql.fr/''>\r\n            <img  src="http://diasporaesprod.free.fr/rsc/img/footer/mysql-powered.gif" alt="logo de MySQL5" height=''15'' width=''80'' />\r\n        </a>\r\n    </span>\r\n	<span class="menurightfooter" style="display:block;margin:auto;">\r\n	    <a href=''http://validator.w3.org/check?uri=http%3A%2F%2Flug.adeti.org%2Fanniv.php&amp;charset=%28detect+automatically%29&amp;doctype=Inline&amp;ss=1&amp;outline=1&amp;group=0&amp;verbose=1&amp;user-agent=W3C_Validator%2F1.3+http%3A%2F%2Fvalidator.w3.org%2Fservices''>\r\n            <img  src="http://diasporaesprod.free.fr/rsc/img/footer/w3c-xhtml1.1.gif" alt="Site valide XHTML strict 1.1" height=''15'' width=''80'' />\r\n        </a><br/>\r\n        <a href="http://jigsaw.w3.org/css-validator/validator?uri=http%3A%2F%2Flug.adeti.org%2Fanniv.php">\r\n            <img src="http://diasporaesprod.free.fr/rsc/img/footer/w3c-css2.1.gif" alt="Valid CSS 2.1" height="15" width="80" />\r\n        </a>\r\n    </span>\r\n	<div style="clear:none;display:block;margin-top:5px;" class="centered">\r\n		<a href="http://www.adeti.org/-L-association-">Tuxun Free Software <img src="/lug/sf2/src/Adeti/BlogBundle/Resources/public/images/ccbyncsa.png" alt="Creative Commons" height="22" width="80" /> TFLSH 2011-2014\r\n		</a>\r\n	</div>', 'tuxun', 'mar. 05 juil. 2010 01:51:13', '', 'CONFIRMED', '', 'CONFIRMED', 'FOOT', 0, 0),
(3, ' tuxunpro@gmail.com', '<p class="scontenu">*\r\nhttp://www.adeti.org/Adherer<br/>\r\nhttp://www.adeti.org/Les-statuts<br/>\r\nhttp://www.adeti.org/Autorisation-de-reproduction-et-de<br/>\r\nhttp://www.adeti.org/Tracts<br/>\r\nhttp://www.adeti.org/-L-association-<br/>\r\n</p>', 'tuxun', 'mar. 05 juil. 2014 01:51:13', 'CONFIRMED', 'CONFIRMED', '', 'CONFIRMED', 'Documentations', 1, 0),
(4, 'tuxunpro@gmail.com', '  <div><span id="alerttt">Attention: Site en chantier<br/>\r\nVous pouvez utiliser le formulaire ci dessous pour nous contacter<br/>Sinon... on se voit en septembre!</span></div>\r\n<div id="admlogo">!</div>', 'tuxun', 'mar. 05 juil. 2010 01:52:13', '', 'CONFIRMED', '', 'CONFIRMED', 'HEAD', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE IF NOT EXISTS `blog_comments` (
  `index_comments` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `usermail` text NOT NULL,
  `msgpostd` text NOT NULL,
  `userpostr` text NOT NULL,
  `datepost` text NOT NULL,
  `root_nukethis_uid` text NOT NULL,
  `root_valide_this` text NOT NULL,
  `user_nukethis_uid` text NOT NULL,
  `user_valide_this` text NOT NULL,
  `reponseto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='test pour lexs entrées du "blog"';

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`index_comments`, `id_article`, `usermail`, `msgpostd`, `userpostr`, `datepost`, `root_nukethis_uid`, `root_valide_this`, `user_nukethis_uid`, `user_valide_this`, `reponseto`) VALUES
(0, 0, 'benoit-mendousse@mailoo.org', '1stopic', 'benoit', 'dim. 06 juil. 2014 16:18:42', 'auvd53b95ac2d9b184.19285424', 'CONFIRMED', 'vuvn53b95ac2d9b1b7.52711273', 'CONFIRMED', 0),
(1, 0, 'tuxuntrash@gmail.com', '2eme stopic Salut, je déclare la fonction "ajout facon blog" fonctionnelle! évitez quand meme le code <a href="http://www.w3.org/html/">html</a>.!', 'tuxun', 'mar. 16 juil. 2014 16:51:13', 'auvd53bb327115c598.16718987', 'CONFIRMED', 'vuvn53bb327115c5b1.49833192', 'CONFIRMED', 1),
(2, 0, 'tuxuntrash@gmail.com', '3stopic', 'tuxun', 'dim. 20 juil. 2014 21:26:16 ', 'auvd53cc17d886ced8.28368005', 'CONFIRMED', 'vuvn53cc17d886cf08.80234834', 'CONFIRMED', 2),
(3, 0, 'tuxuntrash@gmail;com', '1smsg 1stopic', 'vgh', 'Sat Aug 16 12:06:49 ', 'auvd53ef2d39da68f9.89088643', 'CONFIRMED', 'vuvn53ef2d39da6a18.56989069', 'CONFIRMED', 0),
(4, 0, 'tuxuntrash@gmail;com', '2smsg 1stopic', 'vgh', 'Sat Aug 16 12:08:16 ', 'auvd53ef2d90e4bcc0.35375794', 'CONFIRMED', 'vuvn53ef2d90e4bde6.47892705', 'CONFIRMED', 0),
(5, 0, 'tuxuntrash@gmail;com', '1smsg 2stopic', 'vgh', 'Sat Aug 16 12:11:14 ', 'auvd53ef2e42b25290.21143708', 'CONFIRMED', 'vuvn53ef2e42b253a5.81497798', 'CONFIRMED', 1),
(6, 0, 'tuxuntrash@gmail;com', '1smsg 2stopic', 'vgh', 'Sat Aug 16 12:20:29 ', 'auvd53ef306deb1767.36664265', 'CONFIRMED', 'vuvn53ef306deb18d1.76940336', 'CONFIRMED', 1),
(7, 0, 'tuxuntrash@gmail.com', 'ddddddddddd\r\n', 'sffffff', 'Tue Aug 19 23:58:04 ', 'auvd53f3c86c6087c0.95908427', 'CONFIRMED', 'vuvn53f3c86c6088e6.81560424', 'CONFIRMED', 2),
(8, 1, 'tuxuntrash@gmail.com', 'article1testcomm\r\n', 'sffffff', 'Tue Aug 16 23:58:04 ', 'auvd53f3c86c6087c0.95908427', 'CONFIRMED', 'vuvn53f3c86c6088e6.81560424', 'CONFIRMED', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_articles`
--
ALTER TABLE `blog_articles`
 ADD UNIQUE KEY `inde` (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
 ADD UNIQUE KEY `index_comments` (`index_comments`), ADD UNIQUE KEY `index` (`datepost`(30));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_articles`
--
ALTER TABLE `blog_articles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
