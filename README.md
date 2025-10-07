# ЛЦТ 25 | Команда №56 | Город | Задача 1

# Здесь бекенд

# Фронтенд по ссылке https://github.com/AKryshnia/LCT-front

A comprehensive Laravel-based API system for managing and analyzing flight statistics across different regions. This project provides detailed flight data management with advanced statistical analysis capabilities.

## Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Configuration](#configuration)
- [API Documentation](#api-documentation)
  - [Authentication](#authentication)
  - [Cities API](#cities-api)
  - [Regions API](#regions-api)
  - [Flights API](#flights-api)
  - [Statistics API](#statistics-api)
- [Data Models](#data-models)
- [Database Schema](#database-schema)
- [Development](#development)
- [Testing](#testing)
- [Docker Support](#docker-support)
- [Contributing](#contributing)
- [License](#license)

## Overview

LTC 2025 Leader Statistics is a sophisticated flight data management and analytics platform built with Laravel. The system provides comprehensive APIs for managing cities, regions, flights, and generating detailed statistical reports. It features advanced flight statistics with breakdowns by time periods, regions, and various flight characteristics.

## Features

- **Flight Management**: Complete CRUD operations for flight data
- **Regional Analysis**: Flight statistics broken down by regions
- **Advanced Statistics**: Multi-dimensional statistical analysis including:
  - Yearly, monthly, weekly, quarterly, and seasonal breakdowns
  - Flight duration analysis with midnight crossing support
  - Flight type and zone analysis
- **Geographic Data**: City and region management with geographic coordinates
- **Media Support**: Image handling for regions using Spatie Media Library
- **RESTful APIs**: Well-structured REST endpoints with proper validation
- **Docker Support**: Containerized deployment with Docker Compose
- **Python Integration**: Flight data parsing with Python scripts

## Technology Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Database**: MySQL/PostgreSQL (configurable)
- **Authentication**: Laravel Sanctum
- **Media Management**: Spatie Media Library
- **Testing**: Pest PHP
- **Containerization**: Docker & Docker Compose
- **Python Integration**: Custom flight data parser
- **Code Quality**: Laravel Pint (PSR-12)

## Project Structure

```
├── app/
│   ├── app/
│   │   ├── Modules/           # Modular architecture
│   │   │   ├── City/         # City management module
│   │   │   ├── Region/       # Region management module
│   │   │   ├── Flight/       # Flight management module
│   │   │   └── Statistics/   # Statistics analysis module
│   │   ├── Http/
│   │   ├── Models/
│   │   └── Providers/
│   ├── config/               # Configuration files
│   ├── database/             # Migrations, seeders, factories
│   ├── routes/               # Route definitions
│   └── tests/                # Test suites
├── parser_flights/           # Python flight data parser
├── regions_geo/              # Geographic region data
├── docker-files/             # Docker configuration
└── docker-compose.yml        # Docker services
```

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- Docker & Docker Compose (optional)

### Local Development Setup

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd ltc2025_leaderstat
   ```

2. **Install PHP dependencies**
   ```bash
   cd app
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Start development server**
   ```bash
   composer run dev
   ```

### Docker Setup

1. **Build and start containers**
   ```bash
   docker-compose up -d
   ```

2. **Install dependencies**
   ```bash
   docker-compose exec app composer install
   docker-compose exec app npm install
   ```

3. **Setup database**
   ```bash
   docker-compose exec app php artisan migrate
   docker-compose exec app php artisan db:seed
   ```

## Configuration

### Environment Variables

Key environment variables to configure:

```env
APP_NAME="LTC 2025 Leader Statistics"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ltc2025_leaderstat
DB_USERNAME=root
DB_PASSWORD=

SANCTUM_STATEFUL_DOMAINS=localhost:3000
```

## API Documentation

### Base URL
```
http://localhost:8000/api
```

### Authentication

The API uses Laravel Sanctum for authentication. Include the bearer token in the Authorization header:

```http
Authorization: Bearer {your-token}
```

### Cities API

#### Get All Cities
```http
GET /api/city
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Moscow",
      "name_alt": "Москва",
      "okato": "45000000000",
      "oktmo": "45000000",
      "is_dual_name": false,
      "is_capital": true,
      "zip": "101000",
      "population": 12500000,
      "year_founded": 1147,
      "name_en": "Moscow",
      "lat": "55.7558",
      "lon": "37.6176"
    }
  ]
}
```

#### Get Single City
```http
GET /api/city/{id}
```

#### Create City
```http
POST /api/city
Content-Type: application/json

{
  "name": "Saint Petersburg",
  "name_alt": "Санкт-Петербург",
  "population": 5400000,
  "year_founded": 1703,
  "lat": "59.9311",
  "lon": "30.3609"
}
```

#### Update City
```http
PUT /api/city/{id}
Content-Type: application/json

{
  "name": "Updated City Name",
  "population": 6000000
}
```

#### Delete City
```http
DELETE /api/city/{id}
```

### Regions API

#### Get All Regions
```http
GET /api/region
```

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "name": "Moscow Oblast",
      "type": "oblast",
      "okato": "46000000000",
      "population": "7500000",
      "year_founded": "1929",
      "name_en": "Moscow Oblast"
    }
  ]
}
```

#### Get Single Region
```http
GET /api/region/{id}
```

#### Create Region
```http
POST /api/region
Content-Type: application/json

{
  "name": "Leningrad Oblast",
  "type": "oblast",
  "population": "1800000",
  "year_founded": "1927"
}
```

#### Update Region
```http
PUT /api/region/{id}
Content-Type: application/json

{
  "name": "Updated Region Name",
  "population": "2000000"
}
```

#### Delete Region
```http
DELETE /api/region/{id}
```

### Flights API

#### Get All Flights
```http
GET /api/flight
```

**Query Parameters:**
- `region_id`: Filter by region ID
- `date_from`: Filter flights from date (YYYY-MM-DD)
- `date_to`: Filter flights to date (YYYY-MM-DD)
- `flight_type`: Filter by flight type
- `page`: Page number for pagination
- `per_page`: Number of items per page

**Response:**
```json
{
  "data": [
    {
      "id": 1,
      "sid": "FL001",
      "reg": "RA-12345",
      "dep": "SVO",
      "dest": "LED",
      "eet": "01:30",
      "zona": "Moscow",
      "typ": "Commercial",
      "dof": "2024-01-15",
      "dep_time": "08:00:00",
      "arr_time": "09:30:00",
      "region_id": 1,
      "region": {
        "id": 1,
        "name": "Moscow Oblast"
      }
    }
  ],
  "links": {
    "first": "http://localhost:8000/api/flight?page=1",
    "last": "http://localhost:8000/api/flight?page=10",
    "prev": null,
    "next": "http://localhost:8000/api/flight?page=2"
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 10,
    "per_page": 15,
    "to": 15,
    "total": 150
  }
}
```

#### Get Single Flight
```http
GET /api/flight/{id}
```

#### Create Flight
```http
POST /api/flight
Content-Type: application/json

{
  "sid": "FL002",
  "reg": "RA-67890",
  "dep": "LED",
  "dest": "SVO",
  "eet": "01:30",
  "zona": "Moscow",
  "typ": "Commercial",
  "dof": "2024-01-16",
  "dep_time": "10:00:00",
  "arr_time": "11:30:00",
  "region_id": 1
}
```

#### Update Flight
```http
PUT /api/flight/{id}
Content-Type: application/json

{
  "dep_time": "10:30:00",
  "arr_time": "12:00:00"
}
```

#### Delete Flight
```http
DELETE /api/flight/{id}
```

### Statistics API

#### Get Region Statistics
```http
GET /api/statistics/region/{region_id}
```

**Response:**
```json
{
  "region": {
    "id": 1,
    "name": "Moscow Oblast",
    "name_alt": "Московская область"
  },
  "summary": {
    "total_flights": 1250,
    "years_covered": 3,
    "weeks_covered": 52
  },
  "statistics": {
    "by_year": [
      {
        "year": 2022,
        "flight_count": 400,
        "avg_flight_time": 1.5,
        "min_flight_time": 0.5,
        "max_flight_time": 3.2
      },
      {
        "year": 2023,
        "flight_count": 450,
        "avg_flight_time": 1.6,
        "min_flight_time": 0.4,
        "max_flight_time": 3.5
      }
    ],
    "by_year_and_month": [
      {
        "year": 2023,
        "months": [
          {
            "month": 1,
            "flight_count": 35,
            "avg_flight_time": 1.4,
            "min_flight_time": 0.5,
            "max_flight_time": 2.8
          }
        ]
      }
    ],
    "by_year_and_week": [
      {
        "year": 2023,
        "weeks": [
          {
            "week_number": 1,
            "flight_count": 8,
            "avg_flight_time": 1.3,
            "min_flight_time": 0.6,
            "max_flight_time": 2.1
          }
        ]
      }
    ],
    "by_quarter": [
      {
        "quarter": 1,
        "flight_count": 300,
        "avg_flight_time": 1.5,
        "min_flight_time": 0.4,
        "max_flight_time": 3.2
      }
    ],
    "by_year_and_quarter": [
      {
        "year": 2023,
        "quarters": [
          {
            "quarter": 1,
            "flight_count": 110,
            "avg_flight_time": 1.4,
            "min_flight_time": 0.5,
            "max_flight_time": 2.9
          }
        ]
      }
    ],
    "by_year_and_season": [
      {
        "year": 2023,
        "seasons": [
          {
            "season": "Winter",
            "flight_count": 120,
            "avg_flight_time": 1.6,
            "min_flight_time": 0.4,
            "max_flight_time": 3.1
          },
          {
            "season": "Spring",
            "flight_count": 115,
            "avg_flight_time": 1.5,
            "min_flight_time": 0.5,
            "max_flight_time": 2.8
          }
        ]
      }
    ]
  }
}
```

## Data Models

### Flight Model
- `id`: Primary key
- `sid`: Flight identifier
- `reg`: Aircraft registration
- `dep`: Departure airport
- `dest`: Destination airport
- `eet`: Estimated elapsed time
- `zona`: Zone information
- `typ`: Flight type
- `dof`: Date of flight
- `dep_time`: Departure time
- `arr_time`: Arrival time
- `region_id`: Foreign key to regions table

### Region Model
- `id`: Primary key
- `name`: Region name
- `name_alt`: Alternative name
- `okato`: OKATO code
- `oktmo`: OKTMO code
- `population`: Population count
- `year_founded`: Foundation year
- `name_en`: English name
- `lat`: Latitude
- `lon`: Longitude

### City Model
- `id`: Primary key
- `name`: City name
- `name_alt`: Alternative name
- `okato`: OKATO code
- `oktmo`: OKTMO code
- `is_dual_name`: Dual name flag
- `is_capital`: Capital flag
- `zip`: Postal code
- `population`: Population count
- `year_founded`: Foundation year
- `name_en`: English name
- `lat`: Latitude
- `lon`: Longitude

## Database Schema

The system uses the following main tables:

- `cities`: City information with geographic data
- `regions`: Regional data with administrative codes
- `flights`: Flight records with timing and routing information
- `media`: Media files (images) for regions

## Development

### Code Style
The project uses Laravel Pint for code formatting:

```bash
./vendor/bin/pint
```

### Running Tests
```bash
composer test
```

### Database Migrations
```bash
php artisan migrate
php artisan migrate:rollback
```

### Seeding Data
```bash
php artisan db:seed
```

## Testing

The project uses Pest PHP for testing:

```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit
```

## Docker Support

### Services
- **app**: Laravel application
- **db**: MySQL database
- **nginx**: Web server
- **redis**: Cache and session storage

### Commands
```bash
# Start all services
docker-compose up -d

# View logs
docker-compose logs -f app

# Execute commands in container
docker-compose exec app php artisan migrate
docker-compose exec app composer install
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

### Development Guidelines
- Follow PSR-12 coding standards
- Write tests for new features
- Update documentation for API changes
- Use meaningful commit messages

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

For more information or support, please contact the development team.