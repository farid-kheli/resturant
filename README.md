# Restaurant App

This is a restaurant management application that allows customers to scan a QR code at their table to place orders directly from their mobile devices. The app streamlines the ordering process for both customers and staff, improving efficiency and customer experience.

## Features

- **QR Code Ordering:** Customers scan a QR code at their table to access the menu and place orders.
- **User Authentication:** Secure registration and login for customers and staff.
- **Menu Management:** Staff can create, update, and delete menu items.
- **Table Management:** Staff can add or remove tables.
- **Order Management:** Customers can place orders, and staff can manage them.
- **Reviews:** Customers can leave reviews for menu items; admins can moderate reviews.
- **Role-Based Access:** Different permissions for customers, staff, and admins.

## API Overview

- **Authentication:** Register and login endpoints for users.
- **Menu:** Endpoints for viewing and managing menu items.
- **Tables:** Endpoints for managing tables.
- **Orders:** Endpoints for placing and managing orders.
- **Reviews:** Endpoints for submitting and moderating reviews.

## Getting Started

1. **Clone the repository:**
   ```bash
   git clone <repository-url>
   cd resturant
   ```

2. **Install dependencies:**
   ```bash
   composer install
   ```

3. **Set up environment:**
   - Copy `.env.example` to `.env` and configure your database and other settings.

4. **Run migrations:**
   ```bash
   php artisan migrate
   ```

5. **Start the server:**
   ```bash
   php artisan serve
   ```

6. **Access the API:**  
   The API will be available at `http://localhost:8000/api`.

## Usage

- Customers scan the QR code at their table to access the menu and place orders.
- Staff and admins can log in to manage menu items, tables, and reviews.

## License

This project is licensed under the MIT License.
