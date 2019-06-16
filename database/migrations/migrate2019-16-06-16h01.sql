-- MySQL dump 10.17  Distrib 10.3.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: wimw
-- ------------------------------------------------------
-- Server version	10.3.14-MariaDB-1:10.3.14+maria~bionic

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie` (
  `id_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plafond` decimal(7,2) NOT NULL DEFAULT 0.00,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie`
--

LOCK TABLES `categorie` WRITE;
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` VALUES (1,'Logement',100.00,'Vos dépenses relatives au logement : Loyer, Décoration, Eau, Électricité, Entretien, etc.'),(2,'Alimentations & Restauration',100.00,'Vos achats du quotidient : Supermarché, Cafés, Fasts Foods, Restaurants, etc.'),(3,'Auto & Transport',100.00,'Tout ce qui concerne vos déplacements : Train, Transports en commun, Locations de véhicules, Assurance véhicule, Avion, Carburant, Entretien, Péage, Stationnement...'),(4,'Achats & Shopping',100.00,'Habits, Musique, Cadeaux, Films, Jeux Vidéo, etc.'),(5,'Loisirs & Sorties',100.00,'Bars, Divertissements, Hobbies, Hôtels, Sorties culturelles, Sports'),(6,'Dépenses PRO',100.00,'Frais d\'impression, Comptabilité, Fournitures de bureau, Frais d\'expédition, Services en ligne, etc.'),(7,'Santé',100.00,'Dentiste, Mutuelle, Médecin, Pharmacie, Opticien, Autres'),(8,'Banque',100.00,'Débit mensuel, Frais bancaires, Remboursement emprunt, etc.'),(9,'Scolarité & Enfants',100.00,'Baby-sitters, Fournitures scolaires, Jouets, Logement étudiant, Prêt étudiant, etc.'),(10,'Abonnements',100.00,'TV, Internet, Téléphonie mobile, Téléphonie fixe, Autres'),(11,'Retraits, Chèques & Virements',100.00,'Opérations internes'),(12,'Esthétique & Soins',100.00,'Coiffeur, Esthétique, Cosmétique, Spa & massages, etc.'),(13,'Impôts & Taxes',100.00,'Amendes, Impôts fonciers, Impôts sur le revenu, Taxes, Autres taxes, etc.'),(14,'Divers / Autre',100.00,'Dépenses à catégoriser'),(15,'Ma première catégorie',200.00,'youhou !'),(16,'Ordinateur',1200.00,NULL);
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_custom`
--

DROP TABLE IF EXISTS `categorie_custom`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_custom` (
  `fk_categorie` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`fk_categorie`),
  CONSTRAINT `categorie_depense_custom_categorie_FK` FOREIGN KEY (`fk_categorie`) REFERENCES `categorie` (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_custom`
--

LOCK TABLES `categorie_custom` WRITE;
/*!40000 ALTER TABLE `categorie_custom` DISABLE KEYS */;
INSERT INTO `categorie_custom` VALUES (15),(16);
/*!40000 ALTER TABLE `categorie_custom` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_custom_TO_user`
--

DROP TABLE IF EXISTS `categorie_custom_TO_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_custom_TO_user` (
  `fk_fk_categorie_custom` int(10) unsigned NOT NULL,
  `fk_user` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fk_fk_categorie_custom`,`fk_user`),
  KEY `appartenir_a_users_FK` (`fk_user`),
  CONSTRAINT `appartenir_a_categorie_depense_custom_FK` FOREIGN KEY (`fk_fk_categorie_custom`) REFERENCES `categorie_custom` (`fk_categorie`),
  CONSTRAINT `appartenir_a_users_FK` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_custom_TO_user`
--

LOCK TABLES `categorie_custom_TO_user` WRITE;
/*!40000 ALTER TABLE `categorie_custom_TO_user` DISABLE KEYS */;
INSERT INTO `categorie_custom_TO_user` VALUES (15,2),(16,2);
/*!40000 ALTER TABLE `categorie_custom_TO_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorie_depense`
--

DROP TABLE IF EXISTS `categorie_depense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorie_depense` (
  `fk_categorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fk_categorie`),
  CONSTRAINT `categorie_depense_categorie_FK` FOREIGN KEY (`fk_categorie`) REFERENCES `categorie` (`id_categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorie_depense`
--

LOCK TABLES `categorie_depense` WRITE;
/*!40000 ALTER TABLE `categorie_depense` DISABLE KEYS */;
INSERT INTO `categorie_depense` VALUES (1),(2),(3),(4),(5),(6),(7),(8),(9),(10),(11),(12),(13),(14);
/*!40000 ALTER TABLE `categorie_depense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_us`
--

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depense`
--

DROP TABLE IF EXISTS `depense`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depense` (
  `id_depense` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date_depense` date NOT NULL DEFAULT curdate(),
  `montant` decimal(7,2) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fk_user` int(10) unsigned NOT NULL,
  `fk_nature_paiement` int(10) unsigned NOT NULL,
  `fk_categorie` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_depense`),
  KEY `depense_users_FK` (`fk_user`),
  KEY `depense_nature_paiement_FK` (`fk_nature_paiement`),
  KEY `depense_categorie_FK` (`fk_categorie`),
  CONSTRAINT `depense_categorie_FK` FOREIGN KEY (`fk_categorie`) REFERENCES `categorie` (`id_categorie`) ON DELETE CASCADE,
  CONSTRAINT `depense_nature_paiement_FK` FOREIGN KEY (`fk_nature_paiement`) REFERENCES `nature_paiement` (`id_nature_paiement`) ON DELETE CASCADE,
  CONSTRAINT `depense_users_FK` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depense`
--

LOCK TABLES `depense` WRITE;
/*!40000 ALTER TABLE `depense` DISABLE KEYS */;
INSERT INTO `depense` VALUES (1,'2019-06-16',50.00,'Ma première dépense','ma première dépense à ce jour !',2,2,1),(2,'2019-06-16',150.00,NULL,NULL,2,6,16),(3,'2019-06-16',300.00,'Restaurants',NULL,2,3,2),(4,'2019-06-16',15.00,NULL,NULL,2,1,2),(5,'2019-06-16',15.00,NULL,NULL,2,1,2),(6,'2019-06-16',25.00,NULL,NULL,2,1,14),(7,'2019-04-17',20.00,'Ma dépense d\'avril',NULL,2,1,5),(8,'2016-08-16',68.00,'Une dépense de 2016',NULL,2,1,6);
/*!40000 ALTER TABLE `depense` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_06_16_075841_create_contact_us_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nature_paiement`
--

DROP TABLE IF EXISTS `nature_paiement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nature_paiement` (
  `id_nature_paiement` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_nature_paiement`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nature_paiement`
--

LOCK TABLES `nature_paiement` WRITE;
/*!40000 ALTER TABLE `nature_paiement` DISABLE KEYS */;
INSERT INTO `nature_paiement` VALUES (1,'Espèces'),(2,'Carte de Crédit'),(3,'Virement bancaire'),(4,'Chèque'),(5,'Ticket restaurant'),(6,'Prélèvement automatique');
/*!40000 ALTER TABLE `nature_paiement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proverbe`
--

DROP TABLE IF EXISTS `proverbe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proverbe` (
  `id_proverbe` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proverbe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee_proverbe` int(4) NOT NULL,
  PRIMARY KEY (`id_proverbe`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proverbe`
--

LOCK TABLES `proverbe` WRITE;
/*!40000 ALTER TABLE `proverbe` DISABLE KEYS */;
INSERT INTO `proverbe` VALUES (1,'Économise dans le temps, tu auras au besoin.','Le dictionnaire des proverbes et idiotismes allemands',1827),(2,'Qui économise quand il a, possède au besoin.',' Les proverbes de l\'Allemagne',1886),(3,'Qui n\'économise le centime ne sera jamais maitre d\'un décime.','Les proverbes de l\'Allemagne',1886),(4,'Un centime est aussitôt économisé que gagné.','Les proverbes et locutions allemandes ',1835),(5,'Qui n\'économise pas à temps voulu manque du nécessaire au besoin.','Les proverbes de l\'Allemagne',1886),(6,'L\'économie est un trésor qui t\'enrichira plus que l\'or.','Les proverbes et dictons de la France',1872),(7,'Sans l\'économie la misère entre à brassées et s\'en va par pincées.','Le recueil d\'apophtegmes et axiomes',1855),(8,'L\'économe paie ses dettes ; le paresseux les augmente.','Les proverbes et dictons agricoles',1865),(9,'Argent bien placé vaut mieux qu\'économie mal entendue.','Le dictionnaire des proverbes et idiotismes français',1827),(10,'L\'économie épargne, et l\'avarice entasse.','Les proverbes et dictons latins',1757),(11,'Centime après centime, on obtient un dollar.','American proverbs',1977),(12,'Économie vaut mieux que profit.','Les proverbes et dictons russes',1884),(13,'Qui veut être riche doit économiser.','Les proverbes des Bamilékés',1964),(14,'Un sou est un sou, et qui l\'épargne gagne.','Les proverbes et adages anglais',1854);
/*!40000 ALTER TABLE `proverbe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'toto','toto@gmail.com',NULL,'$2y$10$l/f.aymOsxOCsgRY2A2WOOq7.fw2LpeDiwKdg2nWahjqyRGFKkJem',NULL,'2019-06-11 18:04:35','2019-06-11 18:04:35'),(2,'titi','titi@gmail.com',NULL,'$2y$10$1Ej5.xvbv1tN5abd3bMP7uZirY8E0w0s11vaEoaGsbCjACDYm5eLu',NULL,'2019-06-15 14:15:06','2019-06-15 14:15:06');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-16 16:00:40
