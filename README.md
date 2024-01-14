# ProjetPW!
ProjetPW Brye_Diagne L3 MIAGE

Pour cloner le projet en local sur votre machine, lancez la commande suivante:

git clone https://github.com/lyndaBrye/ProjetPW.git

la base de donnees utilisé est clubsportif




Bade de données:

-- Table des catégories
CREATE TABLE categories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    code_raccourci VARCHAR(10) NOT NULL
);

-- Table des contacts
CREATE TABLE contacts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    numero_tel VARCHAR(15) NOT NULL
);

-- Table des licenciés
CREATE TABLE licencies (
    id INT PRIMARY KEY AUTO_INCREMENT,
    numero_licence VARCHAR(20) UNIQUE NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    contact_id_id INT,
    categorie_id_id INT,
    FOREIGN KEY (contact_id_id) REFERENCES contacts(id),
    FOREIGN KEY (categorie_id_id) REFERENCES categories(id)
);

-- Table des éducateurs
CREATE TABLE educateurs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    est_administrateur BOOLEAN NOT NULL,
    licencie_id_id INT,
    FOREIGN KEY (licencie_id_id) REFERENCES licencies(id)
);
