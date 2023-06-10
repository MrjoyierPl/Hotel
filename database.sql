
CREATE DATABASE HotelDB;

USE HotelDB;


CREATE TABLE Hotels (
    HotelID INT PRIMARY KEY,
    Name VARCHAR(50),
    Address VARCHAR(100),
    City VARCHAR(50),
    Country VARCHAR(50)
);


CREATE TABLE Rooms (
    RoomID INT PRIMARY KEY,
    HotelID INT,
    RoomNumber VARCHAR(10),
    Type VARCHAR(50),
    Price DECIMAL(10,2),
    Occupied BIT,
    FOREIGN KEY (HotelID) REFERENCES Hotels(HotelID)
);


CREATE TABLE Reservations (
    ReservationID INT PRIMARY KEY,
    RoomID INT,
    CheckIn DATE,
    CheckOut DATE,
    GuestName VARCHAR(50),
    GuestEmail VARCHAR(50),
    FOREIGN KEY (RoomID) REFERENCES Rooms(RoomID)
);