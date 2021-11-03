ALTER TABLE message ADD CONSTRAINT `FK_destinataire` FOREIGN KEY (`destinataire`) REFERENCES `user` (`id`);
ALTER TABLE message ADD CONSTRAINT `FK_expediteur` FOREIGN KEY (`expediteur`) REFERENCES `user` (`id`);
ALTER TABLE message ADD CONSTRAINT `FK_reponse` FOREIGN KEY (`reponse`) REFERENCES `message` (`id`);
ALTER TABLE proposition_evenement ADD CONSTRAINT `FK_proposition_evenement_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
ALTER TABLE evenement ADD CONSTRAINT `FK_evenement_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)
ALTER TABLE offre_emploi_stage ADD CONSTRAINT `FK_offre_emploi_stage_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`)