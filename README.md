# Currency Exchange Rates

This project provides an interface for displaying and managing currency exchange rates against the US Dollar. It includes a synchronization mechanism with an external API that updates the currency rates every 30 sec, and an admin panel for managing the data.

## Requirements

- Docker
- Docker Compose

## Installation

Follow these steps to install and set up the project:

1. Clone the repository:

   ```bash
   git clone git@github.com:Kutabarik/currency-app.git
   cd currency-app
   ```

2. Start Docker Compose:

   ```bash
   docker compose up -d
   ```

3. Enter the `php` container:

   ```bash
   docker exec -it php sh
   ```

4. Install Composer dependencies:

   ```bash
   composer install
   ```

5. Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

6. Run the database migrations:

   ```bash
   php artisan migrate
   ```

7. Set permissions for the `storage` directory:
   ```bash
   chmod 777 -R storage/
   ```
8. Run the task scheduler that updates the currency rates every 30 seconds
   ```bash
   php artisan schedule:run
   ```
