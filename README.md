# 📦 Invora - Modern POS & Inventory Management System

A professional, full-featured Point of Sale (POS) and Inventory Management web application built with **Laravel**, **Tailwind CSS**, and **MySQL**. Developed as an enterprise-grade solution for seamless stock tracking, secure staff access, and automated invoice generation.

---

## 🚀 Key Features

* **🔐 Secure Authentication:** Admin and staff login protected with secure password hashing.
* **👥 User Management (Staff CRUD):** Complete CRUD operations to manage system users and staff access levels.
* **📦 Inventory & Product Management:** Real-time stock tracking, monitoring product names, codes, costs, prices, and quantities.
* **🛒 Customer Management:** Comprehensive buyer database management.
* **🧾 Smart Invoicing & Auto-Restock:** Dynamic invoicing workflow where selected item quantities are automatically deducted from the inventory upon completion.
* **🎨 Modern UI/UX:** Clean, monochrome-themed dashboard with soft sky/emerald accents, interactive modals, and real-time database analytics.
* **📄 PDF Export:** Integrated DomPDF support for professional invoice exports isolated from standard layouts.

---

## 🛠️ Tech Stack

* **Backend:** PHP 8.2+, Laravel 12
* **Database:** MySQL
* **Frontend:** Tailwind CSS, Blade Templates, JavaScript (Interactive Modals)
* **PDF Generation:** DomPDF
* **Version Control:** Git & GitHub

---

## 📋 System Requirements

Ensure your local development environment meets the following:
* PHP >= 8.2
* Composer
* Node.js & NPM
* MySQL / MariaDB

---

## ⚙️ Installation & Setup

Follow these steps to set up the project locally on your machine:

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/your-username/invora-pos-system.git](https://github.com/your-username/invora-pos-system.git)
   cd invora-pos-system

2. **Install PHP dependencies:**
    ```bash
   composer install

3. **Configure Environment File:**
    ```bash
   cp .env.example .env
    php artisan key:generate

4. **Configure Database:**
   Open your .env file and update your database credentials:
    ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=invora_db
   DB_USERNAME=root
   DB_PASSWORD=

5. **Run Migrations & Seeders:**
    ```bash
   php artisan migrate --seed

6. **Start the Local Development Server::**
    ```bash
   php artisan serve
  Open your browser and navigate to: http://127.0.0.1:8000

---

## 📸 Screenshots & Overview
Dashboard: Real-time analytics overview displaying products, customers, and active staff metrics with proportional distribution charts.
Invoices: Clean billing interface with quick PDF download and 3-option smart deletion (Cancel, Delete Only, Restock & Delete).

---
## 🛡️ License
This project is developed for enterprise assessment purposes.

---
