CREATE DATABASE IF NOT EXISTS `CarTier` DEFAULT CHARACTER SET = 'utf8mb4';
USE `CarTier`;

-- CREATE user ();

CREATE TABLE car (
    id INT auto_increment,
    Brand_Name VARCHAR(255),
    Model_Name VARCHAR(255),
    Vehicule_Type VARCHAR(255),
    Creation_Year DATE,
    Horse_Power VARCHAR(255),
    -- Transmission VARCHAR(255)
    Fuel_Type VARCHAR(255),
    Capacity INT(5),
    number_Doors TINYINT,
    number_Seats TINYINT,
    

) ENGINE=InnoDB DEFAULT CHARSET='utf8';

-- CREATE city ();

-- CREATE reservation ();
Make Id,"Make Name","Model Id","Model Name","Trim Id","Trim Year","Trim Name","Trim Description","Trim Msrp","Trim Invoice","Trim Created","Trim Modified","Engine Id","Engine Type","Engine Fuel Type","Engine Cylinders","Engine Size","Engine Horsepower Hp","Engine Horsepower Rpm","Engine Torque Ft Lbs","Engine Torque Rpm","Engine Valves","Engine Valve Timing","Engine Cam Type","Engine Drive Type","Engine Transmission","Body Id","Body Type","Body Doors","Body Seats","Body Length","Body Width","Body Height","Body Wheel Base","Body Front Track","Body Rear Track","Body Ground Clearance","Body Cargo Capacity","Body Max Cargo Capacity","Body Curb Weight","Body Gross Weight","Body Max Payload","Body Max Towing Capacity","Mileage Id","Mileage Fuel Tank Capacity","Mileage Combined Mpg","Mileage Epa City Mpg","Mileage Epa Highway Mpg","Mileage Range City","Mileage Range Highway","Mileage Epa Combined Mpg Electric","Mileage Epa City Mpg Electric","Mileage Epa Highway Mpg Electric","Mileage Range Electric","Mileage Epa Kwh 100 Mi Electric","Mileage Epa Time To Charge Hr 240v Electric","Mileage Battery Capacity Electric"