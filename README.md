# 🍽️ Restaurant App

This is a restaurant management application that allows customers to scan a QR code at their table to place orders directly from their mobile devices. The app streamlines the ordering process for both customers and staff, improving efficiency and customer experience.

## ✨ Features

* 📱 **QR Code Ordering:** Customers scan a QR code at their table to access the menu and place orders.
* 🔐 **User Authentication:** Secure registration and login for customers and staff.
* 🍔 **Menu Management:** Staff can create, update, and delete menu items.
* 🪑 **Table Management:** Staff can add or remove tables.
* 📝 **Order Management:** Customers can place orders, and staff can manage them.
* 🌟 **Reviews:** Customers can leave reviews for menu items; admins can moderate reviews.
* 🛡️ **Role-Based Access:** Different permissions for customers, staff, and admins.

## 🚀 API Overview

* 🔑 **Authentication:** Register and login endpoints for users.
* 🍽️ **Menu:** Endpoints for viewing and managing menu items.
* 🪑 **Tables:** Endpoints for managing tables.
* 📝 **Orders:** Endpoints for placing and managing orders.
* ⭐ **Reviews:** Endpoints for submitting and moderating reviews.

## 📚 API Endpoints

Below is a list of available API endpoints, their methods, URLs, required parameters, and authentication requirements.

### 🔐 Authentication

| Method | URL           | Params (JSON)                                 | Auth Required | Description         |
| ------ | ------------- | --------------------------------------------- | ------------- | ------------------- |
| POST   | /api/register | name, email, password, password\_confirmation | No            | Register a new user |
| POST   | /api/login    | email, password                               | No            | Login and get token |

---

### 👤 User

| Method | URL         | Params (JSON)                    | Auth Required | Description            |
| ------ | ----------- | -------------------------------- | ------------- | ---------------------- |
| GET    | /api/user   | -                                | Yes           | Get authenticated user |
| PUT    | /api/user   | name, email, password (optional) | Yes           | Update user profile    |
| DELETE | /api/delete | -                                | Yes           | Delete user account    |

---

### 📝 Posts

| Method | URL             | Params (JSON)  | Auth Required | Description      |
| ------ | --------------- | -------------- | ------------- | ---------------- |
| GET    | /api/posts      | -              | No            | List all posts   |
| POST   | /api/posts      | title, content | Yes           | Create a post    |
| GET    | /api/posts/{id} | -              | No            | Get post details |
| PUT    | /api/posts/{id} | title, content | Yes           | Update a post    |
| DELETE | /api/posts/{id} | -              | Yes           | Delete a post    |

---

### 🍔 Menu Management (Staff Only)

| Method | URL                              | Params (JSON)        | Auth Required | Description      |
| ------ | -------------------------------- | -------------------- | ------------- | ---------------- |
| POST   | /api/Admin/create/menu/item      | name, price, details | Staff         | Create menu item |
| PUT    | /api/Admin/update/menu/item/{id} | name, price, details | Staff         | Update menu item |
| DELETE | /api/Admin/delete/menu/item/{id} | -                    | Staff         | Delete menu item |

---

### 🪑 Table Management (Staff Only)

| Method | URL                          | Params (JSON)        | Auth Required | Description  |
| ------ | ---------------------------- | -------------------- | ------------- | ------------ |
| POST   | /api/Admin/create/tabel      | table\_number, seats | Staff         | Create table |
| DELETE | /api/Admin/delete/tabel/{id} | -                    | Staff         | Delete table |

---

### 🛡️ Account Management (Admin Only)

| Method | URL                           | Params (JSON)               | Auth Required | Description                |
| ------ | ----------------------------- | --------------------------- | ------------- | -------------------------- |
| POST   | /api/Admin/create/acont       | name, email, password, role | Admin         | Create staff/admin account |
| DELETE | /api/Admin/delete/review/{id} | -                           | Admin         | Delete a review            |

---

### 🌟 Reviews

| Method | URL                   | Params (JSON)             | Auth Required | Description          |
| ------ | --------------------- | ------------------------- | ------------- | -------------------- |
| POST   | /api/user/review/menu | menu\_id, rating, comment | Yes           | Submit a menu review |

---

### 💡 Example

#### 📝 Register

```http
POST /api/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password",
  "password_confirmation": "password"
}
```

#### 🔑 Login

```http
POST /api/login
Content-Type: application/json

{
  "email": "john@example.com",
  "password": "password"
}
```

#### 🍕 Create Menu Item (Staff)

```http
POST /api/Admin/create/menu/item
Authorization: Bearer {token}
Content-Type: application/json

{
  "name": "Pizza",
  "price": 12.99,
  "details": "Delicious cheese pizza"
}
```

> **Note:** All endpoints under `/api/Admin/` require authentication and the appropriate role (`Staff` or `Admin`).

## 🛠️ Getting Started

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

   * Copy `.env.example` to `.env` and configure your database and other settings.

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

## 🎮 Usage

* Customers scan the QR code at their table to access the menu and place orders.
* Staff and admins can log in to manage menu items, tables, and reviews.

## 📄 License

This project is licensed under the MIT License.
