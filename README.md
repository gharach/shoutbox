1. Get your free Pusher API Keys at [https://pusher.com](https://pusher.com)
2. Clone this repo
3. Install Composer packages

4. Install NPM packages
   ```
   npm install
   ```
5. Create a Mysql database and configure  the .env file
6. Enter your API keys in `.env`
   ```
    PUSHER_APP_ID=
    PUSHER_APP_KEY=
    PUSHER_APP_SECRET=
    PUSHER_APP_CLUSTER=
   ```
7. Initialize the database
    ```
    php artisan migrate
    ```
8. Compile the webpages and run it
    ```
    npm run dev
    php artisan serve
