-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 24 mai 2018 à 12:56
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `alaska`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapters`
--

DROP TABLE IF EXISTS `chapters`;
CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `content` text CHARACTER SET latin1 NOT NULL,
  `creation_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chapters`
--

INSERT INTO `chapters` (`id`, `title`, `content`, `creation_date`) VALUES
(1, 'Chapitre 1 - New York', 'New York ! D\'abord j\'ai été confondu par ta beauté, ces grandes filles d\'or aux jambes longues.\r\nSi timide d\'abord devant tes yeux de métal bleu, ton sourire de givre\r\nSi timide. Et l\'angoisse au fond des rues à gratte-ciel\r\nLevant des yeux de chouette parmi l\'éclipse du soleil.\r\nSulfureuse ta lumière et les fûts livides, dont les têtes foudroient le ciel\r\nLes gratte-ciel qui défient les cyclones sur leurs muscles d\'acier et leur peau patinée de pierres.\r\nMais quinze jours sur les trottoirs chauves de Manhattan\r\n– C\'est au bout de la troisième semaine que vous saisit la fièvre en un bond de jaguar\r\nQuinze jours sans un puits ni pâturage, tous les oiseaux de l\'air\r\nTombant soudain et morts sous les hautes cendres des terrasses.\r\nPas un rire d\'enfant en fleur, sa main dans ma main fraîche\r\nPas un sein maternel, des jambes de nylon. Des jambes et des seins sans sueur ni odeur.\r\nPas un mot tendre en l\'absence de lèvres, rien que des cœurs artificiels payés en monnaie forte\r\nEt pas un livre où lire la sagesse. La palette du peintre fleurit des cristaux de corail.\r\nNuits d\'insomnie ô nuits de Manhattan ! si agitées de feux follets, tandis que les klaxons hurlent des heures vides\r\nEt que les eaux obscures charrient des amours hygiéniques, tels des fleuves en crue des cadavres d\'enfants.\r\n\r\n[...]\r\n\r\nExtrait de A New York - Léopold Sédar Senghor', '2018-04-20 15:24:14'),
(2, 'Chapitre 2 - La panne', '«Vous vous êtes mis à écrire parce que vous deviez écrire un livre et non pas pour donner du sens à votre vie? Faire pour faire n\'a jamais eu de sens: il n\'y avait donc rien d\'étonnant à ce que vous ayez été incapable d\'écrire la moindre ligne. Le don de l\'écriture est un don non pas parce que vous écrivez correctement, mais parce que vous pouvez donner du sens à votre vie. (...) Les écrivains vivent plus intensément que les autres, je crois. N\'écrivez pas au nom de notre amitié, Marcus. Ecrivez parce que c\'est le seul moyen pour vous de faire de cette minuscule chose insignifiante qu\'on appelle vie une expérience valable et gratifiante.»\r\n\r\nLa Vérité sur l\'Affaire Harry Quebert\r\nJoël Dicker', '2018-04-22 14:18:05'),
(3, 'Chapitre 3 - Le départ', 'Une Ile sauvage du sud de l’Alaska, accessible uniquement par bateau ou par hydravion, tout en forêts humides et montagnes escarpées. C’est dans ce décor que Jim décide d’emmener son fils de treize ans pour y vivre dans une cabane isolée, une année durant.\r\n\r\nSukkwan island\r\n\r\nDavid Vann', '2018-04-23 18:08:30');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_id` int(11) NOT NULL,
  `author` varchar(255) CHARACTER SET latin1 NOT NULL,
  `comment` text CHARACTER SET latin1 NOT NULL,
  `comment_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `chapter_id`, `author`, `comment`, `comment_date`) VALUES
(1, 1, 'Juliet', 'Le début de l\'intrigue.... Envie d\'aller voir New York. J\'ai hâte de lire la suite! ', '2018-05-24 07:12:21'),
(2, 2, 'Juliet', 'Pas facile l\'écriture mais une belle description de la panne d\'inspiration. c\'est pour çà le départ? C\'est quand même un peu loin l\'Alaska ;) ', '2018-05-24 14:18:34'),
(3, 3, 'Juliet', 'Le lieu est là.....\r\nJe me languis les prochains chapitres.\r\nMerci de nous faire participer! :) ', '2018-05-24 18:11:00'),
(4, 1, 'Roméo', 'Une superbe description de New York!', '2018-05-09 17:04:55'),
(5, 1, 'Paulo', 'Superbe! Continuez!\r\n', '2018-05-10 17:30:52'),
(6, 2, 'L\'auteur', 'Merci! :)', '2018-05-14 18:28:05'),
(7, 2, 'Romeo', 'Un beau texte!\r\n', '2018-05-20 13:05:25'),
(8, 1, 'L\'auteur', 'Merci!', '2018-05-20 18:56:33'),
(9, 1, 'L\'auteur', 'Encore merci :)', '2018-05-20 19:13:43'),
(10, 1, 'Foued', 'La ville qui ne dort jamais?\r\n', '2018-05-20 19:41:29'),
(11, 2, 'Marc', 'Je suis d\'accord avec Romeo, un beau texte sur la page blanche', '2018-05-21 10:17:07'),
(12, 3, 'L\'auteur', 'Merci :)', '2018-05-21 18:10:02'),
(13, 3, 'L\'auteur', 'Merci :)\r\n', '2018-05-21 18:18:41'),
(14, 3, 'Akim', 'Bien écrit!', '2018-05-23 10:58:15'),
(15, 1, 'Jean-Pierre', 'Super!', '2018-05-23 17:12:10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
