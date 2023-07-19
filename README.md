
## Installation and Run

- git clone https://github.com/rhranadu/oggrow.git
- composer install
- Copy the example env file and make the required configuration changes in the .env file - cp .env.example .env
- Run the database migrations (Set the database connection in .env before migrating) - php artisan migrate
- php artisan data:generate(Execute the following command to generate the user dataset) .
- php artisan jwt:secret(Run the following command to generate the JWT secret key).
- php artisan websockets:serve & php artisan queue:work(Start the WebSocket Server and Queue Worker).


