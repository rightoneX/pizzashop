# Pizza Shop Online 

Online store with millions goods from the country of the rising sun to riching people around the globe.

## How to configurate envorement and run the project

    The product runs under php 8.0

## Setting up the Database

```sh
> mysql -r root -u pizza < db/pizza.sql
```

### To run php server locally

```sh
> php -S localhost:5500 -t ~/Documents/projects/pizzashop
```


CREATE TABLE `customer` (
  `customerID` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '.',
  PRIMARY KEY (`customerID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;