# BloXer
An awesome blog built from scratch using Laravel.

# How to setup ( After cloning the project on your local machine. )

1. edit the .env file to add your database credentials.
2. create a new database
3. open the terminal and cd into the main directory of the project.
4. run `php artisan migrate --seed` command to run the db migrations and add some dummy data ( and the admin account in the process ).
5. run `php artisan serve` command to run a development server.
6. open http://localhost:8000 in your browser to start the application.

That's it. Enjoy.

# Extras

When you run the db seeds, you'll get an admin account with the following credentials

email: admin@blogxer.com

password: password

use those creds to login as an admin account.
