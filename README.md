# url-shortner
PHP version: 7.4.30
Laravel Framework 8.83.23
Composer version 1.10.13


#Please follow below steps to run the code

1. Run "Composer install"
2. Rename env.example to .env
3. Update APP_URL and create database and update configuration in .env
4. Run "php artisan migrate"
5. Execute the code in browser
6. A form will be displayed where you can enter url and short url will be genereated.


#Files changed
1. app/Http/Controllers/ShortLinkController.php (Controller file)
2. app/Services/ShortLinkService.php (Service file for database selection and insert)
3. app/Exceptions/CommonServerException.php (Custom 500 exception page)
4. app/Exceptions/CustomModelNotFoundException.php (ustom 404 exception page)
5. app/Http/Requests/ShortLinkRequest.php (Request file for validation)
6. resources/views/short_link.blade.php (Blade file)
7. resources/views/page_layouts/layout.blade.php (Layout file)
8. resources/views/common/head.blade.php (Common head page)
9. database/migrations/ (migration files)
10. resources/lang/en/short_link.php (Language files for message)
11. routes/web.php (Route file)
12. app/Models/ShortLink.php (Model file of table)

#Tables used

1. short_links 