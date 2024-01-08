## Tutorial Install
1. clone project ini 
    ```git
    git clone https://github.com/yogzsp/paman-ridho.git
    ```
2. install laravel dan composer lalu masukan perintah berikut
    ```bash
    composer install
    ```
3. copy environmentnya
    ```
    cp .env.example .env
    ```
4. generate
    ```
    php artisan key:generate
    ```
5. migrate database
    ```
    php artisan migrate:fresh --seed
    ```
6. Jalankan server
    ```
    php artisan serve
    ```