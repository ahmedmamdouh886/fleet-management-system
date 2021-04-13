## Introduction

A trivial mimic Fleet-management system.

## Installation

### Prerequisites

* You must have Docker installed.

### Step 1
```bash
git clone https://github.com/ahmedmamdouh886/fleet-management-system.git
cd fleet-management-system
cp .env.example .env
docker-compose up --build
docker-compose exec app composer install
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
``` 
### Step 2

* Visit: GET http://localhost:8000/api/v1/trips
* Visit: POST http://localhost:8000/api/v1/bookings
* Visit: POST http://localhost:8000/api/v1/login

## Files structure

* app/Http/API/*.php --> It contains the application layer services such as middlewares, controllers, requests layer to validate the request payload, resources layer to format the response.
* app/services/*.php --> It's a layer for handling and isolating the business/application logic.
* app/Support/*.php --> It contains a mimic payment gateways.
* app/Providers/AppServiceProvider.php --> It has the service providers, its responsibility is to inject the dependency into the IOC container.
* app/Exceptions/*.php --> It contains classes regarding the exception handlers.
* routes/api.php --> It contains the API endpoints.
* ./docker-compose.yml --> the docker compose file.
* ./dockerFile --> the docker file.
* ./docker-compose/* --> Contains the docker services configurations such as mysql and nginx.
* ./config/*.php --> Contains the configuration files such as sanctum and more.