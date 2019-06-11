USE wimw;

##############################################
## PEUPLEMENT DES DONNÉES SUR LES PROVERBES ##
##############################################
INSERT INTO proverbe(`proverbe`, `source`, `annee_proverbe`)
VALUES
('Économise dans le temps, tu auras au besoin.', 'Le dictionnaire des proverbes et idiotismes allemands', 1827),
('Qui économise quand il a, possède au besoin.', ' Les proverbes de l\'Allemagne', 1886),
('Qui n\'économise le centime ne sera jamais maitre d\'un décime.', 'Les proverbes de l\'Allemagne', 1886),
('Un centime est aussitôt économisé que gagné.', 'Les proverbes et locutions allemandes ', 1835),
('Qui n\'économise pas à temps voulu manque du nécessaire au besoin.', 'Les proverbes de l\'Allemagne', 1886),
('L\'économie est un trésor qui t\'enrichira plus que l\'or.', 'Les proverbes et dictons de la France', 1872),
('Sans l\'économie la misère entre à brassées et s\'en va par pincées.', 'Le recueil d\'apophtegmes et axiomes', 1855),
('L\'économe paie ses dettes ; le paresseux les augmente.', 'Les proverbes et dictons agricoles', 1865),
('Argent bien placé vaut mieux qu\'économie mal entendue.', 'Le dictionnaire des proverbes et idiotismes français', 1827),
('L\'économie épargne, et l\'avarice entasse.', 'Les proverbes et dictons latins', 1757),
('Centime après centime, on obtient un dollar.', 'American proverbs', 1977),
('Économie vaut mieux que profit.', 'Les proverbes et dictons russes', 1884),
('Qui veut être riche doit économiser.', 'Les proverbes des Bamilékés', 1964),
('Un sou est un sou, et qui l\'épargne gagne.', 'Les proverbes et adages anglais', 1854);

###############################################
## PEUPLEMENT DES DONNÉES SUR LES CATÉGORIES ##
###############################################

INSERT INTO categorie(`nom`, `description`)
VALUES
('Logement', 'Vos dépenses relatives au logement : Loyer, Décoration, Eau, Électricité, Entretien, etc.'),
('Alimentations & Restauration', 'Vos achats du quotidient : Supermarché, Cafés, Fasts Foods, Restaurants, etc.'),
('Auto & Transport', 'Tout ce qui concerne vos déplacements : Train, Transports en commun, Locations de véhicules, Assurance véhicule, Avion, Carburant, Entretien, Péage, Stationnement...'),
('Achats & Shopping', 'Habits, Musique, Cadeaux, Films, Jeux Vidéo, etc.'),
('Loisirs & Sorties', 'Bars, Divertissements, Hobbies, Hôtels, Sorties culturelles, Sports'),
('Dépenses PRO', 'Frais d\'impression, Comptabilité, Fournitures de bureau, Frais d\'expédition, Services en ligne, etc.'),
('Santé', 'Dentiste, Mutuelle, Médecin, Pharmacie, Opticien, Autres'),
('Banque', 'Débit mensuel, Frais bancaires, Remboursement emprunt, etc.'),
('Scolarité & Enfants', 'Baby-sitters, Fournitures scolaires, Jouets, Logement étudiant, Prêt étudiant, etc.'),
('Abonnements', 'TV, Internet, Téléphonie mobile, Téléphonie fixe, Autres'),
('Retraits, Chèques & Virements', 'Opérations internes'),
('Esthétique & Soins', 'Coiffeur, Esthétique, Cosmétique, Spa & massages, etc.'),
('Impôts & Taxes', 'Amendes, Impôts fonciers, Impôts sur le revenu, Taxes, Autres taxes, etc.'),
('Divers / Autre', 'Dépenses à catégoriser');

INSERT INTO categorie_depense(`fk_categorie`)
VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14);


##############################################
## PEUPLEMENT DES DONNÉES SUR LES PAIEMENTS ##
##############################################

INSERT INTO nature_paiement(`nom`)
VALUES
('Espèces'),
('Carte de Crédit'),
('Virement bancaire'),
('Chèque'),
('Ticket restaurant'),
('Prélèvement automatique');
