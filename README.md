

# EasyColoc – Shared Apartment Manager

## 📌 Project Overview

**EasyColoc** is a web application that simplifies managing shared apartments.
It tracks shared expenses, automatically calculates debts between members, and provides a clear “who owes what to whom” view — no manual calculations needed.
The app is built with **Laravel, Blade, Tailwind CSS, and JavaScript**.

---

## 🚀 Features

* Create and manage shared apartments (colocations).
* Invite members via email/token and manage roles.
* Add, categorize, and track expenses with automatic balance calculation.
* View a simplified “who owes whom” summary.
* Mark payments as paid to reduce debts.
* Reputation system that tracks financial behavior (+1/-1).
* Admin dashboard for global statistics and user moderation.

---

## 🖥️ Tech Stack

* **Backend:** Laravel (MVC architecture)
* **Database:** PostgreSQL via migrations
* **ORM:** Eloquent (relationships: hasMany, belongsToMany)
* **Authentication:** Laravel Breeze
* **Frontend:** Blade + Tailwind CSS + native JavaScript
* **Version Control:** Git & GitHub

---

## 🌱 Git Workflow

* **`main` branch** → Active development.

### Workflow

```bash
# Clone repository
git clone <repository-link>

# Switch to develop branch
git switch -c develop

# Commit and push changes
git add .
git commit -m "Your message"
git push origin develop

# Merge completed work into main
git switch main
git merge develop
git push origin main
```

---

## 🔮 Future Features

* Stripe payment integration.
* Real-time notifications for expenses and payments.
* Calendar for tracking shared bills.
* Export expenses and balances as CSV or PDF.

---

## 🛠️ How to Use

1. **Clone the repository**

```bash
git clone <repository-link>
cd EasyColoc
```

2. **Install dependencies**

```bash
composer install
npm install
```

3. **Set up environment**

```bash
cp .env.example .env
php artisan key:generate
```

4. **Run database migrations**

```bash
php artisan migrate
```

5. **Start the app**

```bash
php artisan serve
```

6. **Using the application**

* Register or login.
* Create a new colocation (you become the Owner).
* Invite members and manage roles.
* Add expenses, view balances, and mark payments as paid.
* Admins can view statistics and manage users.






