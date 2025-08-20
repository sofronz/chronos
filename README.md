# 🕒 Chronos

**Chronos** is a **mini project** for room booking management built with **Laravel + Filament**.  
> ⚠️ This is a demonstration / mini project, not a full production-ready system.

## 🚀 Main Features

### 🛠 Panels
- **Admin & User Panels** separated with a single login system.

### 📅 Booking Management
- Users can **submit bookings**.
- Admins can **Approve / Reject bookings**.
- Conflict detection for overlapping bookings.

### 🏢 Rooms Management
- Admin can **CRUD rooms**.

### 👤 User Management
- Admin can **CRUD users**.

### 📊 Cool Dashboard
- Custom dashboard with statistics widgets:
  - **Total Approved Bookings** ✅
  - **Total Rejected Bookings** ❌
  - **Total Submitted Bookings** 📝
  - **Total Users** 👤
  - **Total Rooms** 🏠

## 🛠️ Technologies Used

- **Backend**: Laravel 12
- **Admin Panel / UI**: [Filament](https://filamentphp.com/) + Tailwind CSS
- **Frontend Enhancements**: Tailwind CSS utilities, Heroicons

### 🔧 Helpful Libraries

- **[Filament](https://filamentphp.com/)** – Admin panel and resource management for Laravel, including dashboards, forms, tables, and notifications.
- **[kalnoy/nestedset](https://github.com/lazychaser/laravel-nestedset)** – For handling hierarchical data structures.
- **[barryvdh/laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)** – For generating IDE helper files and better code completion.
- **[friendsofphp/php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)** – For automatic PHP code formatting and consistency.

## 📦 Installation

1. **Clone repository:**

   ```bash
   git clone https://github.com/sofronz/chronos.git
   cd chronos
   ```

2. **Install backend dependencies:**

   ```bash
   composer install
   ```

3. **Install frontend dependencies:**

   ```bash
   npm install
   ```

4. **Copy the .env file and configure:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run database migrations and seed:**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the development server:**

   ```bash
   php artisan serve
   npm run dev
   ```

## 🔐 Demo Accounts

- **Admin**
  - Email: The admin email is randomly generated from the database.
  - Password: `password`

- **User**
  - Email: The user email is randomly generated from the database.
  - Password: `password`

> Note: Both **Admin** and **User** accounts have dynamically generated email addresses from the database, so the email addresses may vary on different installations or setups. The default password for both Admin and User accounts is `password`.

## 📃 License

This project is licensed under the [MIT License](LICENSE).

## 📫 Contact

For questions or suggestions, feel free to contact [sofronz](https://github.com/sofronz).
