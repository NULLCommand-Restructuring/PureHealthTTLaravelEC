# PureHealthTT

PureHealthTT is an e-commerce website selling plant-based foods, built using the Laravel framework for the backend and Laravel's Blade templates for the frontend. A MySQL database is used to manage the site's data.

## Main Features

- **Login/Logout**: Users can log in and log out of their accounts.
- **Account Management**: Users can create, edit, and delete their accounts.
- **Administration**: Administrators can manage users, products, and orders.
- **Product Management**: Add, delete, and edit products.
- **Shopping Cart**: Add products to the cart, view the cart.
- **Order Placement**: Place orders and make payments using VN Pay's test environment.
- **Order Tracking**: View order status and list of placed orders.
- **Feedback and Comments**: Users can provide feedback and comment on purchased products.
- **Product Consultation**: Use artificial intelligence to recommend products to users.
- **Business Analysis**: Use artificial intelligence to analyze business conditions from database data.
- **Revenue and Order Charts**: Display revenue and order charts by month.
- **Product Search**: Search for products by name, category, or keyword.
- **Product Reviews**: Users can review purchased products.
- **Online Support**: Live chat with customer support.
- **Detailed Reports**: Export detailed reports on revenue, orders, and customers.
- **And many other features**: ...

## System Requirements

- **PHP**: Version 8.0 or higher.
- **Composer**: PHP dependency management tool.
- **Docker**: Optional, if you want to run MySQL service using Docker (latest version).

## Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/NULLCommand-Restructuring/PureHealthTTLaravelEC.git
   cd PureHealthTTLaravelEC
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Initialize MySQL service**:
   Use Docker to initialize a MySQL container and import data from `database.sql`:
   ```bash
   docker run --name purehealthtt-mysql -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=purehealthtt -d mysql:latest
   docker cp database.sql purehealthtt-mysql:/docker-entrypoint-initdb.d/
   docker exec -i purehealthtt-mysql mysql -uroot -proot purehealthtt < database.sql
   ```

4. **Configure environment**:
   Create a `.env` file from the sample `.env.example` file and update the necessary configuration information:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Start the server**:
   ```bash
   php artisan serve
   ```

## Usage

- Access the website at `http://localhost:8000`.
- Need to adjust the login information for the user with administrative privileges to ensure they can log in and manage the site.
<!-- 
## Demo

Here are some screenshots of the application in action:

![1](https://via.placeholder.com/800x400) -->

## Contribution

We welcome contributions from the community! If you would like to contribute to the **PureHealthTT** project, please follow these steps:

1. **Fork the Repository**: Click the "Fork" button at the top right corner of the repository page to create a copy of the repository in your GitHub account.

2. **Clone Your Fork**: Clone the forked repository to your local machine using the following command:

 ```bash
   git clone https://github.com/NULLCommand-Restructuring/PureHealthTTLaravelEC.git
   cd PureHealthTTLaravelEC
   ```

3. **Create a Branch**: Create a new branch for your feature or bug fix:
   ```bash
   git checkout -b your-feature-branch
   ```

4. **Make Changes**: Implement your changes in the new branch. Ensure your code follows the project's coding standards and includes appropriate tests.

5. **Commit Changes**: Commit your changes with a descriptive commit message:
   ```bash
   git add .
   git commit -m "Description of your changes"
   ```

6. **Push to GitHub**: Push your changes to your forked repository:
   ```bash
   git push origin your-feature-branch
   ```

7. **Submit a Pull Request**: Go to the original repository and click the "New Pull Request" button. Select your branch and submit the pull request. Provide a clear description of your changes and any related issues.

8. **Review Process**: Your pull request will be reviewed by the maintainers. They may request changes or ask for additional information. Please be responsive and address any feedback promptly.

Thank you for your contributions! Together, we can make **PureHealthTT** even better.

## Contact

If you have any questions or feedback, please contact via email: nguyenhuutaistd1@gmail.com.