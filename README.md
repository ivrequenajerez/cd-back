# cd-back

`cd-back` is a backend API application built with Laravel, designed to connect with a PostgreSQL database and interface with a React Native frontend application.

## Technologies Used

- **Laravel:** The PHP framework used for building the API.
- **PostgreSQL:** The database used for storing application data.
- **React Native:** The frontend framework connecting to this API.

## Installation

1. **Clone the Repository:**
    ```bash
   git clone https://github.com/ivrequenajerez/cd-back.git
   ```

2. **Navigate to the Project Directory:**
   ```bash
   cd cd-back
   ```

3. **Install Dependencies:**
   ```bash
   composer install
   ```

4. **Set Up Environment Variables:**
   - Copy the `.env.example` file to `.env` and configure it as needed:
     ```bash
     cp .env.example .env
     ```

5. **Generate Application Key:**
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations:**
   ```bash
   php artisan migrate
   ```

7. **Start the Laravel Development Server:**
   ```bash
   php artisan serve
   ```

## Configuration

Update the `.env` file with your specific configuration needs. For example, set the frontend URL:

- **Frontend URL:**
  ```env
  FRONTEND_URL=http://localhost:3000
  ```

## Versions

- **PHP:** ^8.2
- **Laravel Framework:** ^11.9
- **Laravel Sanctum:** ^4.0
- **Laravel Tinker:** ^2.9

### Development Dependencies

- **FakerPHP Faker:** ^1.23
- **Laravel Breeze:** ^2.1
- **Laravel Pint:** ^1.13
- **Laravel Sail:** ^1.26
- **Mockery:** ^1.6
- **Nunomaduro Collision:** ^8.0
- **PHPUnit:** ^11.0.1


