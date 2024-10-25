DROP DATABASE IF EXISTS `Car-Tier`;
CREATE DATABASE `Car-Tier` DEFAULT CHARACTER SET = 'utf8mb4';
USE `Car-Tier`;

-- CREATE user ();

CREATE TABLE user (
    userId INT AUTO_INCREMENT,
    lastName VARCHAR(50) NOT NULL,
    firstName VARCHAR(255) NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    userType INT NOT NULL,
    PRIMARY KEY(userId),
    UNIQUE(email),
    UNIQUE(phoneNumber)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE car (
    carId INT AUTO_INCREMENT,
    brandName VARCHAR(255) NOT NULL,
    modelName VARCHAR(255) NOT NULL,
    vehicleType VARCHAR(255) NOT NULL,
    creationYear DATE,
    horsePower VARCHAR(255) NOT NULL,
    fuelType VARCHAR(255) NOT NULL,
    capacity INT,
    numberDoors TINYINT,
    numberSeats TINYINT NOT NULL,
    PRIMARY KEY(carId)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

-- CREATE city ();

CREATE TABLE reservation (
    reservationId INT AUTO_INCREMENT,
    reservationStartDate DATE NOT NULL,   -- Date de début de la réservation
    reservationEndDate DATE NOT NULL,     -- Date de fin de la réservation
    reservationStartTime TIME NOT NULL,   -- Heure de début de la réservation
    reservationEndTime TIME NOT NULL,     -- Heure de fin de la réservation
    totalPrice INT NOT NULL,
    userId INT NOT NULL,
    PRIMARY KEY(reservationId),
    FOREIGN KEY(userId) REFERENCES user(userId)
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

CREATE TABLE car_reserved (
    reservationId INT,
    carId INT,
    PRIMARY KEY(reservationId, carId),
    FOREIGN KEY(reservationId) REFERENCES reservation(reservationId) ON DELETE CASCADE,
    FOREIGN KEY(carId) REFERENCES car(carId) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET='utf8';

INSERT INTO car (brandName, modelName, vehicleType, creationYear, horsePower, fuelType, capacity, numberDoors, numberSeats) VALUES
    ('Renault', 'Clio', 'Berline', '2020-01-01', '100', 'Essence', 45, 5, 5),
    ('Renault', 'Mégane', 'Berline', '2021-01-01', '115', 'Diesel', 50, 5, 5),
    ('Renault', 'Captur', 'SUV', '2022-01-01', '130', 'Essence', 48, 5, 5),
    ('Renault', 'Kadjar', 'SUV', '2019-01-01', '140', 'Diesel', 55, 5, 5),
    ('Renault', 'Zoé', 'Électrique', '2022-01-01', '90', 'Électrique', 52, 5, 5), -- Pour un véhicule électrique, cela pourrait représenter la capacité de la batterie en kWh.
    ('Renault', 'Koleos', 'SUV', '2021-01-01', '160', 'Diesel', 60, 5, 5),
    ('Renault', 'Talisman', 'Berline', '2020-01-01', '150', 'Essence', 47, 4, 5),
    ('Renault', 'Twizy', 'Électrique', '2018-01-01', '20', 'Électrique', 6, 2, 2), -- Capacité batterie en kWh.
    ('Renault', 'Espace', 'Monospace', '2020-01-01', '160', 'Diesel', 65, 5, 7),
    ('Renault', 'Arkana', 'SUV Coupé', '2022-01-01', '140', 'Essence', 50, 5, 5);
