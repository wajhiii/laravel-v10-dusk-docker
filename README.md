## Project 
    This is a web application built on the Laravel framework. Application have form with all the company symbol  from where you can select the specific company symbol and see the detail page of that company with graphical data of company with open and close price. This application also have test cases integration in it. Below are the instruction for project usage and test cases.

## Getting Started
    To get started with this project, you can follow these steps:

## Prerequisites
    Before you begin, make sure you have the following installed:
- PHP
- Composer
- PHPUnit
## Installation
- Clone the repository: git clone https://github.com/wajhiii/xm-assignment
- Change directory into the project folder: cd xm-assignment
- Install PHP dependencies: composer install
- Set up the .env file by copying the .env.example file: cp .env.example .env
- Generate an application key: php artisan key:generate
- Run database migrations: php artisan migrate
- Start the server: php artisan serve
- Visit http://localhost:8000 in your web browser

## Usage
    Once you have the project up and running, you can use it to do the following:

- Perform form operation by selecting  Company Symbol.
- Email message should be received on submitted email address.
- View historical quotes for submitted Company Symbol 
- Historical data retrieved, display on screen a chart of the Open and Close prices.


## Running the Test Case
    To run this test case, follow these steps:

### Browser Test case
    Run the Browser test case, follow these steps:
- Change directory to the project's root folder: cd /path/to/project
- Run the test case using PHPUnit: php artisan dusk


### Feature Test Case & Unit Test Case
    Run the feature and unit test case, follow these steps:
- Run the test case using PHPUnit: php artisan test

## Dependencies
This test case has the following dependencies:

- Laravel framework
- Mockery library


### Plugins

- **[Chart.js](https://www.chartjs.org/)**
- **[datepicker](https://jqueryui.com/datepicker/)**


## Docker
- docker-compose up in project root
