INSERT INTO `evenement` (`id`, `nom`, `date`, `description`, `ville`, `CP`, `adresse`) VALUES
	(1, 'evenement1', '2020-05-21', NULL, 'niort', 79000, 'Place de la breche'),
	(2, 'evenement2', '2021-09-12', NULL, 'La roche Sur yon', 85000, 'Place la rochfoucault'),
	(3, 'evenement4', '2021-04-15', NULL, 'Fontenay le comte', 85200, 'Place verdin'),
	(4, 'evenement5', '2021-05-09', NULL, 'niort', 79000, 'Place de la breche'),
	(5, 'evenement6', '2022-01-21', NULL, 'niort', 79000, 'Place de la breche'),
	(6, 'evenement Ajouter', '2021-07-30', 'une descriprtion', 'Niort', 79000, 'Place de la BrÃ¨che');

INSERT INTO `proposition_evenement` (`id`, `nom`, `date`, `description`, `ville`, `cp`, `adresse`) VALUES
	(1, 'evenement Proposer', '2021-04-16', 'une description', 'Fontenay Le Comte', 85200, 'Place Verdin');

INSERT INTO `user` (`id`, `username`, `password`, `email`, `signup_date`, `lien_portfolio`, `statut_admin`) VALUES
	(1, 'admin', 'abcdef', 'admin@mail.com', 1617268678, NULL, 1),
	(2, 'alex', '123456', 'alexandre@mail.fr', 1617268690, 'https://alexandrebaudry.wixsite.com/portfolio', 0),
	(3, 'personne1', '123456', 'personne1@mail.fr', 1617268719, NULL, 0),
	(4, 'personne2', 'jjjjjj', 'pers@mail.com', 1617510798, NULL, 0),
	(5, 'personne3', '123456', 'personne3@mail.com', 1623156627, NULL, NULL);

INSERT INTO `message` (`id`, `objet`, `description`, `destinataire`, `expediteur`, `date`, `reponse`, `lu`) VALUES
	(1, 'salut', 'bonjour j\'envoie ce message afin de faire un test sur les message', 2, 1, '1617313640', 2, NULL),
	(2, NULL, 'd\'accord', 1, 2, '1617518796', 3, NULL),
	(3, NULL, 'nouveau test', 2, 2, '1617518870', NULL, NULL),
	(4, 'salut', 'bonjour j\'envoie ce message afin de faire un test sur les message', 3, 1, '1617867095', 5, NULL),
	(5, NULL, 'd\'accord', 1, 3, '1617867126', 7, NULL),
	(6, 'message de test', 'nouveau test', 3, 1, '1618409788', NULL, '1'),
	(7, NULL, 'hfh', 3, 1, '1620130509', NULL, '1');

INSERT INTO `offre_emploi_stage` (`id`, `nom_Entreprise`, `type_offre`, `description`, `criterre`, `mail`, `telephone`) VALUES
	(1, 'entreprise1', 'stage', 'test de description', 'expert en php', 'entreprise1@mail.fr', '02 03 03 03 03'),
	(2, 'entreprise2', 'emploi', '', 'expert en java', 'entreprise2@mail.fr', '01 54 65 98 45'); 