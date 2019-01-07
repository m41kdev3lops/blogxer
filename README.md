# BlogXer
An awesome blog built from scratch (with unit testing) using Laravel.

# How to setup

1. clone the project to your local machine using `git clone https://github.com/m41kdev3lops/blogxer`
2. change directory into the created folder `cd blogxer`
3. install composer dependencies using `composer install`
4. duplicate .env.example into a new file called .env
5. run `php artisan key:generate` to generate a new APP_KEY for your application.
6. create a new mysql database
7. edit .env to add your database's credentials.
8. run `php artisan migrate --seed` command to run the db migrations and add some dummy data ( and the admin account in the process )
9. run `php artisan serve` command to run a development server.
10. open http://localhost:8000 in your browser to start the application.

That's it. Enjoy.

# Extras

When you run the db seeds, you'll get an admin account with the following credentials

email: admin@blogxer.com

password: password

use those creds to login as an admin account.

# Features List
-- Admins can:
1. Add categories
2. Add posts
3. Comment on posts
4. Delete comments
5. Delete posts
6. Delete categories with their posts
7. update their information
8. Logout of their account

-- Guests can:
1. View posts
2. Comment on posts

-- General features:
1. Filter posts according to category
2. User-friendly timestamps
3. Logged in admins are automatically remembered
4. Cool feedback system using sweetalert

-- Code features:
1. Up-to-date best practices like using repositories & services
2. Usage of FormRequest class in laravel to validate incoming requests
3. Feature tests and Unit tests covering the majority of the application
4. Clean  and understandable code (At least I hope since opinions vary)

# Front-End features
1. I'm not a designer hence the application is very minimal in design
2. Used Twitter Bootstrap for the design & responsiveness 
3. Used jQuery library

## That's It.
