# Expense Tracking API

This is a simple RESTful API built with Laravel 12.x for managing personal expenses, incomes, and budgets. It features a simple, intuitive interface and robust security features to protect user data.

## Features

- **User Authentication**: Secure user login and registration.
- **Expense Management**: Add, update, delete, and view expenses.
- **Incomes Management**: Add, update, delete, and view incomes.
- **Budget Management**: Add, update, delete, and view budgets.
- **Category Support**: Organize expenses by categories.
- **Reporting**: Generate summaries of expenses over time.
- **RESTful API**: Fully REST-compliant endpoints.

## Prerequisites

- PHP >= 8.2
- Composer
- MySQL or any supported database
- Web server (e.g., Apache or Nginx)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/abogo-nono/expense-tracking-api.git
    cd expense-tracking-api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Configure the environment:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update database and other configuration details in the `.env` file.

4. Run database migrations:
    ```bash
    php artisan migrate
    ```

5. Start the development server:
    ```bash
    php artisan serve
    ```

## API Endpoints

| Method | Endpoint              | Description                  |
|--------|-----------------------|------------------------------|
| POST   | `/api/register`       | Register a new user          |
| POST   | `/api/login`          | Authenticate a user          |
| GET    | `/api/expenses`       | List all expenses            |
| POST   | `/api/expenses`       | Create a new expense         |
| PUT    | `/api/expenses/{id}`  | Update an expense            |
| DELETE | `/api/expenses/{id}`  | Delete an expense            |
| GET    | `/api/incomes`        | List all incomes             |
| POST   | `/api/incomes`        | Create a new income          |
| PUT    | `/api/incomes/{id}`   | Update an income             |
| DELETE | `/api/incomes/{id}`   | Delete an income             |
| GET    | `/api/budgets`        | List all budgets             |
| POST   | `/api/budgets`        | Create a new budget          |
| PUT    | `/api/budgets/{id}`   | Update a budget              |
| DELETE | `/api/budgets/{id}`   | Delete a budget              |
| GET    | `/api/categories`     | List all categories          |
| POST   | `/api/categories`     | Create a new category        |
| PUT    | `/api/categories/{id}`| Update a category            |
| DELETE | `/api/categories/{id}`| Delete a category            |
| GET    | `/api/reports`        | Generate expense reports     |

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).
