Trust Coconut Manufacturing and Product Management System

## Table of Contents
 - [Overview](#overview)
 - [Features](#features)
 - [Technologies Used](#technologies-used)
 - [Setup Instructions](#setup-instructions)
 - [Usage](#usage)
 - [Database Schema](#database-schema)
 - [Screenshots](#screenshots)
 - [Contributing](#contributing)
 - [License](#license)

 ## Overview
 Trust Coconut Manufacturing and Product Management System is a web application designed to manage manufacturing details and product records efficiently. It allows users to input, store, and view information related to manufacturing processes, shipment details, product inventory, sales records, and more.

 ## Features
 - **User Authentication**: Secure login system with session management for authenticated access.
 - **Data Management**: CRUD operations (Create, Read, Update, Delete) for manufacturing and product records.
 - **Database Integration**: MySQL database backend for storing and retrieving data.
 - **Responsive Design**: Utilizes Bootstrap for a responsive and user-friendly interface.
 - **Form Validation**: Validates user inputs to ensure data integrity.
 - **Dynamic Data Display**: Displays dynamic data fetched from the database in tabular format.

 ## Technologies Used
 - **Frontend**: HTML, CSS, Bootstrap
 - **Backend**: PHP
 - **Database**: MySQL
 - **Session Management**: PHP Sessions

 ## Setup Instructions
 To run this project locally, follow these steps:

 1. **Clone the repository**:
 ```bash
 git clone https://github.com/NelushGayashan/COCONUT_PROJECT.git
 cd COCONUT_PROJECT
 ```

 2. **Database Setup**:
 - Create a MySQL database and import the SQL schema from `demo.sql`.

 3. **Configure Database Connection**:
 - Update the database connection details in `db/config.php`.

 4. **Start the PHP Development Server**:
 - If you have PHP installed locally, you can start the PHP development server:
 ```vbnet
 php -S localhost:8000
 ```
 Replace `localhost:8000` with your preferred localhost and port.

 5. **Open in Browser**:
 - Open your web browser and navigate to `http://localhost:8000` (or your specified localhost URL).

 6. **Login**:
 - Use your credentials to log in to the application.

 ## Usage
 - Upon logging in, you can manage manufacturing and product records through the user-friendly interface.
 - Add new records, update existing records, and delete records as needed.
 - Navigate through different sections using the navigation bar (e.g., Seed Company, Harvester, Manufacturer).

 ## Database Schema
 The database schema consists of the following tables:

- `users`: Stores user credentials including username and password.
- `employees`: Stores employee details including name, address, and salary.
- `seed_company`: Stores details about seed companies including company name, lot coordinates, plant brand, certifying agency, and variety.
- `harvester`: Stores harvester details including harvester EA, lot ID, coordinates, variety, attributes, yield, harvester date, chemical application, date sold, manufacturer EA, and associated company farmer ID.
- `manufacturer`: Stores manufacturer details including manufacturer EA, shipment date, shipment credentials, grain type, purchase date, variety, quantity, date sold, manufacturer date, product ID, product name, weight, and manufacturer name.


 ## Screenshots
![Ceylon Coconut Foundation - Login - localhost](https://github.com/user-attachments/assets/c67ecbd6-75b4-4db1-97f1-930e4e5d54a8)
![Ceylon Coconut Foundation - Homepage](https://github.com/user-attachments/assets/f94b737c-d469-4361-b3b7-56f4fc2b221b)
![Ceylon Coconut Foundation-Add Seed Company Details](https://github.com/user-attachments/assets/fb3e8064-0053-43b2-9627-0d14c72f4452)


 ## Contributing
 Contributions are welcome! Fork the repository and submit a pull request with your improvements.

 ## License
 This project is licensed under the [MIT License](LICENSE).
