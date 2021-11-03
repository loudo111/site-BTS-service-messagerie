CREATE TABLE IF NOT EXISTS `etudiant` (
  `promotion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objet` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `destinataire` int(11) NOT NULL,
  `expediteur` int(11) NOT NULL,
  `date` varchar(50) DEFAULT NULL,
  `reponse` int(11) DEFAULT NULL,
  `lu` char(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `FK_destinataire` (`destinataire`),
  KEY `FK_expediteur` (`expediteur`),
  KEY `FK_reponse` (`reponse`)
  ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `signup_date` int(10) NOT NULL,
  `lien_portfolio` varchar(300) DEFAULT NULL,
  `statut_admin` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `offre_emploi_stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_Entreprise` varchar(50) DEFAULT NULL,
  `type_offre` varchar(50) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `criterre` varchar(300) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telephone` varchar(14) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `proposition_evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL DEFAULT '',
  `date` date NOT NULL,
  `description` varchar(50) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `cp` int(11) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;