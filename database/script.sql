-- Création du schéma (Décommenter la ligne pour drop le schéma si besoin)
##############################################################
## Création des tables d'authentification propres à Laravel ##
##############################################################
CREATE TABLE `users`
(
	`id` INT(10) UNSIGNED NOT NULL,
	`name` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`email` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`email_verified_at` TIMESTAMP NULL DEFAULT NULL,
	`password` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`remember_token` VARCHAR(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	`created_at` TIMESTAMP NULL DEFAULT NULL,
	`updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
ALTER TABLE `users` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` MODIFY `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT;
CREATE TABLE `password_resets` 
(
	`email` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`token` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

##############################################################
## Création des tables relatives à la gestion des dépenses  ##
##############################################################

CREATE TABLE nature_paiement
(

	`id_nature_paiement` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,

	CONSTRAINT `nature_paiement_PK` PRIMARY KEY (`id_nature_paiement`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categorie
(

	`id_categorie` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR (255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`plafond` DECIMAL (7,2) NOT NULL DEFAULT 0 ,
	`description` VARCHAR (255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,

	CONSTRAINT `categorie_depense_PK` PRIMARY KEY (`id_categorie`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE depense
(

	`id_depense` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`date_depense` DATE NOT NULL DEFAULT (CURRENT_DATE),
	`montant` DECIMAL (7,2) NOT NULL,
	`nom` VARCHAR (255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
	`description` VARCHAR (255) COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
	`fk_user` INT(10) UNSIGNED NOT NULL,
	`fk_nature_paiement` INT(10) UNSIGNED NOT NULL,
	`fk_categorie` INT(10) UNSIGNED NULL DEFAULT NULL,

	CONSTRAINT `depense_PK` PRIMARY KEY(`id_depense`), 
	CONSTRAINT `depense_users_FK` FOREIGN KEY(`fk_user`) REFERENCES users(`id`) ON DELETE CASCADE,
	CONSTRAINT `depense_nature_paiement_FK` FOREIGN KEY(`fk_nature_paiement`) REFERENCES nature_paiement(`id_nature_paiement`) ON DELETE CASCADE,
	CONSTRAINT `depense_categorie_FK` FOREIGN KEY(`fk_categorie`) REFERENCES categorie(`id_categorie`) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categorie_custom
(

	`fk_categorie` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	CONSTRAINT `categorie_depense_custom_PK` PRIMARY KEY (`fk_categorie`), 
	CONSTRAINT `categorie_depense_custom_categorie_FK` FOREIGN KEY (`fk_categorie`) REFERENCES categorie(`id_categorie`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categorie_depense
(

	`fk_categorie` INT(10) UNSIGNED NOT NULL,
	CONSTRAINT `categorie_depense_PK` PRIMARY KEY (`fk_categorie`),
	CONSTRAINT `categorie_depense_categorie_FK` FOREIGN KEY (`fk_categorie`) REFERENCES categorie(`id_categorie`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categorie_custom_TO_user
(

	`fk_fk_categorie_custom` INT(10) UNSIGNED NOT NULL,
	`fk_user` INT(10) UNSIGNED NOT NULL,
	CONSTRAINT `appartenir_a_PK` PRIMARY KEY (`fk_fk_categorie_custom`, `fk_user`),
	CONSTRAINT `appartenir_a_categorie_depense_custom_FK` FOREIGN KEY (`fk_fk_categorie_custom`) REFERENCES categorie_custom(`fk_categorie`),
	CONSTRAINT `appartenir_a_users_FK` FOREIGN KEY (`fk_user`) REFERENCES users(`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


#########################################################################################
## Création de la table de proverbes, pour afficher un proverbe aléatoire sur le site  ##
#########################################################################################

CREATE TABLE proverbe
(
	
	id_proverbe INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	proverbe VARCHAR (255) NOT NULL,
	source VARCHAR (255) NOT NULL,
	annee_proverbe INT(4) NOT NULL,

	CONSTRAINT proverbe_PK PRIMARY KEY (id_proverbe)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
