# Web-Programming-Project

# Lost and Found Web Application

Welcome to the Lost and Found web application! This project was developed as part of the web programming course for B.Tech. It aims to assist students in finding lost items and reporting found items to help individuals recover their belongings. This README provides an overview of the project, installation instructions, and key features.

## Table of Contents
- [Project Overview](#project-overview)
- [Installation](#installation)
- [Usage](#usage)
- [Features](#features)
- [Contributing](#contributing)
- [License](#license)

## Project Overview
The Lost and Found web application is designed to create a centralized platform for students to report lost items and search for their belongings. The application allows users to register and login to their accounts, enabling them to post details about their lost items. Additionally, if a user finds an item, they can report it through the application. The system then help people find lost and found items, notifying the relevant individuals through mail.

## Installation
To run the Lost and Found web application locally, follow these steps:

1. Clone the repository:  git clone https://github.com/silla2807/Web-Programming-Project.git

2. Navigate to the project directory: cd Web-Programming-Project

3. Install the required dependencies: npm install


4. Set up the database:
- Create a new database (database name : lostfound) using a preferred database management system (e.g., MySQL, PostgreSQL).
- Update the database connection configuration in the project's configuration files to match your database credentials.

5. Launch the application:

npm start

6. Open a web browser and visit `http://localhost/LostFound/home.html` to access the Lost and Found web application.

## Usage
Once the application is up and running, users can perform the following actions:

- Register an account: Users can sign up by providing the necessary information, such as name, user id, email address, and password.
- Log in: Users can log in using their registered email address and password.
- Report a lost item: Logged-in users can submit details about an item they have lost, including a description, category, and any identifying information.
- Report a found item: Users can report a found item by providing details similar to those for reporting lost items.
- Search for lost items: Users can search for lost items by any description keywords.
- Notifications: The system automatically directs to the reported person's email address on clicking the "Notify" button thereby enabling communication between the relevant users.
## Features
The Lost and Found web application includes the following key features:

- User authentication: Users can create accounts and securely log in.
- Lost item reporting: Users can report items they have lost, providing essential details.
- Found item reporting: Users can report items they have found and submit relevant information.
- Search functionality: Users can search for lost items based on category or description keywords.
- Matching algorithm:The system notifyes users accordingly based on whether the item is lost or found.
- Notifications: Users receive mails about items, helping them recover their belongings.

## Website Overview
Please note that the reference website available at [https://silla2807.github.io/Lost-and-Found/](https://silla2807.github.io/Lost-and-Found/) showcases a subset of features available in the complete codebase. However, we would like to assure you that the actual codebase provided includes all the features as mentioned in the project documentation. You can refer to the codebase for a comprehensive understanding of the application's functionality.

## Contributing
We welcome contributions to the Lost and Found web application. To contribute, follow these steps:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix.
3. Make your modifications and commit them with descriptive commit messages.
4. Push your changes to your forked repository.
5. Submit a pull request to the main repository, clearly explaining your changes and the problem they solve.

## License
The Lost and Found web application is licensed under the [MIT License](LICENSE). You are free to modify and distribute the application according to the terms and conditions of this license.

Please note that this project was developed for educational purposes, and we cannot guarantee ongoing maintenance or support.





