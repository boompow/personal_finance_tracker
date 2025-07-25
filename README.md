
# Personal Finance Tracker

Hello, This is a mini-project built as part of Kuraztech Backend-track Internship. It is a Laravel-based web application to help users manage their personal finances by tracking transactions, categorizing expenses/income. This project demonstrates full CRUD (Create, Read, Update, Delete) operations for transactions, categories, and users.

## Features
- User authentication and profile management
- Transaction tracking (expenses and income)
- Category management
- Dashboard and reports
- RESTful CRUD operations for all main entities

## CRUD Operations

### 1. Transactions
- **Create:** Users can add new transactions specifying item, amount, price, note, type (expense/income), category, and user.
- **Read:** View a list of all transactions, filter by category, type, or user. Detailed view for each transaction.
- **Update:** Edit transaction details such as item, amount, price, note, type, category, and user.
- **Delete:** Remove transactions from the system.

### 2. Categories
- **Create:** Add new categories to organize transactions (e.g., Food, Salary, Utilities).
- **Read:** View all categories and see associated transactions.
- **Update:** Edit category names and details.
- **Delete:** Remove categories (with proper handling of associated transactions).

### 3. Users
- **Create:** Register new users via authentication system.
- **Read:** View user profiles and their transaction history.
- **Update:** Edit user profile information.
- **Delete:** Remove users (admin only, with cascading effects on transactions).

## Technology Stack
- **Backend:** Laravel (PHP)
- **Frontend:** Blade templates, Tailwind CSS, Vite
- **Database:** SQLite
- **Testing:** Pest, PHPUnit

## Getting Started
1. **Clone the repository:**
   ```powershell
   git clone <repo-url>
   cd personal_finance_tracker
   ```
2. **Install dependencies:**
   ```powershell
   composer install; npm install
   ```
3. **Set up environment:**
   - Copy `.env.example` to `.env` and configure database settings.
   - Run migrations and seeders:
     ```powershell
     php artisan migrate --seed
     ```
4. **Start the development server:**
   ```powershell
   php artisan serve
   ```
5. **Access the app:**
   Open [http://localhost:8000](http://localhost:8000) in your browser.

## Project Structure
- `app/Models/` - Eloquent models for User, Category, Transaction
- `app/Http/Controllers/` - Controllers for handling CRUD logic
- `database/migrations/` - Database schema
- `database/factories/` - Model factories for testing/seeding
- `resources/views/` - Blade templates for UI
- `routes/web.php` - Web routes

## Testing
Run tests using Pest or PHPUnit:
```powershell
php artisan test
```

## License
MIT

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## Author
Boompow
