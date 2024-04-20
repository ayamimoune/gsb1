-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.0.30 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour projet_gsb
CREATE DATABASE IF NOT EXISTS `projet_gsb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `projet_gsb`;

-- Listage de la structure de table projet_gsb. famille
CREATE TABLE IF NOT EXISTS `famille` (
  `id_famille` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_famille`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projet_gsb.famille : ~10 rows (environ)
INSERT INTO `famille` (`id_famille`, `libelle`) VALUES
	(1, 'Antibiotiques'),
	(2, 'Antidouleurs'),
	(3, 'Antihypertenseurs'),
	(4, 'Antifongiques'),
	(5, 'Antiviraux'),
	(6, 'Antispasmodiques'),
	(7, 'Anticoagulants'),
	(8, 'Antihistaminiques'),
	(9, 'Anti-inflammatoires'),
	(10, 'Antipsychotiques');

-- Listage de la structure de table projet_gsb. medecin
CREATE TABLE IF NOT EXISTS `medecin` (
  `id_medecin` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `adresse` varchar(60) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `tel` varchar(10) DEFAULT NULL,
  `specialiteComplementaire` varchar(50) DEFAULT NULL,
  `departement` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_medecin`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projet_gsb.medecin : ~10 rows (environ)
INSERT INTO `medecin` (`id_medecin`, `nom`, `prenom`, `adresse`, `cp`, `ville`, `tel`, `specialiteComplementaire`, `departement`, `mail`, `mdp`) VALUES
	(1, 'Smith', 'John', '123 Main St', '12345', 'New York', '1234567890', 'Cardiologist', 'Cardiology', 'john.smith@email.com', 'password123'),
	(2, 'Johnson', 'Lisa', '456 Elm St', '54321', 'Los Angeles', '9876543210', 'Neurologist', 'Neurology', 'lisa.johnson@email.com', 'mypassword456'),
	(3, 'Brown', 'David', '789 Oak St', '67890', 'Chicago', '5678901234', 'Dermatologist', 'Dermatology', 'david.brown@email.com', 'secure123'),
	(4, 'Williams', 'Sarah', '321 Pine St', '98765', 'San Francisco', '4321098765', 'Pediatrician', 'Pediatrics', 'sarah.williams@email.com', 'pass1234'),
	(5, 'Davis', 'Michael', '654 Birch St', '45678', 'Miami', '9876543210', 'Ophthalmologist', 'Ophthalmology', 'michael.davis@email.com', 'password567'),
	(6, 'Wilson', 'Karen', '876 Cedar St', '23456', 'Houston', '3456789012', 'Orthopedic Surgeon', 'Orthopedics', 'karen.wilson@email.com', 'mypassword123'),
	(7, 'Jones', 'Emily', '234 Maple St', '87654', 'Seattle', '2109876543', 'Gastroenterologist', 'Gastroenterology', 'emily.jones@email.com', 'secure456'),
	(8, 'Taylor', 'Chris', '567 Walnut St', '76543', 'Boston', '5432109876', 'ENT Specialist', 'Otolaryngology', 'chris.taylor@email.com', 'pass5678'),
	(9, 'Lee', 'Jennifer', '345 Cherry St', '98765', 'Dallas', '4321098765', 'Urologist', 'Urology', 'jennifer.lee@email.com', 'mysecurepassword'),
	(10, 'Clark', 'Robert', '789 Poplar St', '23456', 'Denver', '8765432109', 'Psychiatrist', 'Psychiatry', 'robert.clark@email.com', 'password999');

-- Listage de la structure de table projet_gsb. medicament
CREATE TABLE IF NOT EXISTS `medicament` (
  `id_medicament` int NOT NULL AUTO_INCREMENT,
  `nomCommercial` varchar(50) DEFAULT NULL,
  `id_famille` int DEFAULT NULL,
  `composition` varchar(50) DEFAULT NULL,
  `effets` varchar(50) DEFAULT NULL,
  `contreIndication` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_medicament`),
  KEY `id_famille` (`id_famille`),
  CONSTRAINT `medicament_ibfk_1` FOREIGN KEY (`id_famille`) REFERENCES `famille` (`id_famille`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projet_gsb.medicament : ~10 rows (environ)
INSERT INTO `medicament` (`id_medicament`, `nomCommercial`, `id_famille`, `composition`, `effets`, `contreIndication`) VALUES
	(1, 'Amoxicilline', NULL, 'Amoxicilline 500 mg', 'Traitement des infections bactériennes', 'Allergie à l\'amoxicilline'),
	(2, 'Paracétamol', NULL, 'Paracétamol 500 mg', 'Réduction de la fièvre et des douleurs', 'Non recommandé en cas de maladie hépatique'),
	(3, 'Losartan', NULL, 'Losartan 50 mg', 'Réduction de la pression artérielle', 'Femmes enceintes devraient éviter'),
	(4, 'Fluconazole', NULL, 'Fluconazole 150 mg', 'Traitement des infections fongiques', 'Interactions médicamenteuses possibles'),
	(5, 'Aciclovir', NULL, 'Aciclovir 200 mg', 'Traitement des infections herpétiques', 'Réactions allergiques possibles'),
	(6, 'Dicyclomine', NULL, 'Dicyclomine 10 mg', 'Réduction des spasmes musculaires', 'Troubles cardiaques préexistants'),
	(7, 'Warfarine', NULL, 'Warfarine 5 mg', 'Anticoagulant', 'Éviter la vitamine K'),
	(8, 'Cétirizine', NULL, 'Cétirizine 10 mg', 'Traitement des allergies', 'Somnolence possible'),
	(9, 'Ibuprofène', NULL, 'Ibuprofène 200 mg', 'Anti-inflammatoire', 'Gastrite ou ulcères'),
	(10, 'Risperidone', NULL, 'Risperidone 2 mg', 'Traitement des troubles psychotiques', 'Augmentation du risque de diabète');

-- Listage de la structure de table projet_gsb. offrir
CREATE TABLE IF NOT EXISTS `offrir` (
  `id_rapport` int NOT NULL AUTO_INCREMENT,
  `id_medicament` int NOT NULL,
  `quantite` int DEFAULT NULL,
  PRIMARY KEY (`id_rapport`,`id_medicament`),
  KEY `id_medicament` (`id_medicament`),
  CONSTRAINT `offrir_ibfk_1` FOREIGN KEY (`id_rapport`) REFERENCES `rapport` (`id_rapport`),
  CONSTRAINT `offrir_ibfk_2` FOREIGN KEY (`id_medicament`) REFERENCES `medicament` (`id_medicament`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projet_gsb.offrir : ~10 rows (environ)
INSERT INTO `offrir` (`id_rapport`, `id_medicament`, `quantite`) VALUES
	(1, 2, 32),
	(2, 5, 41),
	(3, 1, 23),
	(4, 8, 72),
	(5, 4, 11),
	(6, 3, 23),
	(7, 7, 15),
	(8, 9, 13),
	(9, 6, 25),
	(10, 10, 17);

-- Listage de la structure de table projet_gsb. rapport
CREATE TABLE IF NOT EXISTS `rapport` (
  `id_rapport` int NOT NULL AUTO_INCREMENT,
  `date_rapport` date DEFAULT NULL,
  `motif` varchar(50) DEFAULT NULL,
  `bilan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_rapport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table projet_gsb.rapport : ~0 rows (environ)

-- Listage de la structure de table projet_gsb. visiteur
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `tel` int DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `date_embauche` date DEFAULT NULL,
  PRIMARY KEY (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
