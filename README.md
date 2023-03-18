# laravel-paid-membership-app
A one-time premium membership payment application using Stripe Payment Intents API
## Overview 
This project demonstrates how to implement Stripe Payment Intents API to handle payment flows. It tracks a payment from creation through checkout, and triggers additional authentication steps when required. In addition, it uses the Model-View-Controller (MVC) pattern using PHP and Laravel.

In this project, I have created a simple application that allows users to create and account, login and make a one-time membership payment via Stripe. The user information is stored in a MySQL database, and Laravel's Eloquent ORM is used to interact with the database.

## Requirements

To run this project, you will need the following software installed on your system:

- PHP 7.3 or higher
- MySQL 5.7 or higher
- Composer
- Laravel 8

## Installation
To install and run this project on your system, follow these steps:

1. Clone the repository to your local machine:
```
git clone https://github.com/gmnyaki/laravel-paid-membership-app.git  

```
2. Navigate to the project directory:
```
cd laravel-paid-membership-app

```
3. Install the project dependencies using Composer:

```
composer install

```
4. Create a copy of the .env.example file and rename it to .env:
```
cp .env.example .env

```
5. Generate an application key:
```
php artisan key:generate
```
6. Configure the database settings in the .env file:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```
7. Migrate the database tables:
```
php artisan migrate
```
8. Start the development server:
```
php artisan serve
```
## Usage
To use the application, open a web browser and navigate to the URL(http://memberpass.test) displayed in the terminal when you started the development server. You will see a login or register. First, register an account to be able to pay for a membership. Once an account is created successfully, you will be redirected to a dashboard, from here you will see a link to members area. If not paid, you will be redirected to a payment page to make a one-time membership payment. Once you make a payment, you will have access to members page.   
## Project Structure
The project is structured according to Laravel's conventions: 

**'app/Models**: Contains the Eloquent models for the application.  
**app/Http/Controllers**: Contains the controllers for the application.  
**app/Http/Requests**: Contains the form request validation classes for the application.  
**resources/views**: Contains the views for the application.  
**routes/web.php**: Contains the routes for the application.

## Contributing  
If you would like to contribute to this project, please fork the repository and submit a pull request.

## Concepts
This a simple project demonstrates how to implement the Payment Intents API for Stripe payments.
For Installing and setting up the stripe library, setting up service provider and storing Api keys securely in app visit the following files.
**app\providers\stripeServiceProvider.php**
**app\config\stripe**
**.env**   
Using Stripe Payment Intents for:    
**Automatic authentication handling.**
**No double charges.**
**Strong customer Authentication.**  
Setting up payment Intent See:
**app\Http\Controllers\Member\PaymentController**
Webhooks : Public URL for your local Stripe webhook endpoint, which makes it easier to test and debug your webhook endpoints.
**app\Http\Controllers\StripeWebhookController.php**   

##Security
Protecting our open stripe webhook by verifying that when we send the request its only coming from Stripe using signing secret.
Prevent members from landing on payment page if already paid.
Protecting double charges 
**App\Http\Middleware\RedirectIfPaid**
**App\Http\Controllers\PaymentController**   

## Demo images 
![login demo](https://user-images.githubusercontent.com/25588619/223938765-65ccc3e8-946d-4828-bb20-839b133095a4.JPG)
![register demo](https://user-images.githubusercontent.com/25588619/223938794-26032821-ef44-42c5-8042-18a95961967f.JPG)
![Readme cover](https://user-images.githubusercontent.com/25588619/223936736-69822b57-2b8b-4a73-80b4-05208ca9b0c6.JPG)


## License

This project is licensed under the MIT License. See the **LICENSE** file for details.

