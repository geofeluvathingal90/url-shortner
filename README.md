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


Files changed
#Controller file
1. app/Http/Controllers/ShortLinkController.php

#Service file for database selection and insert
2. app/Services/ShortLinkService.php

#Custom 500 exception page
3. app/Exceptions/CommonServerException.php

#Custom 404 exception page
4. app/Exceptions/CustomModelNotFoundException.php

#Request file for validation 
5. app/Http/Requests/ShortLinkRequest.php

#Blade file
6. resources/views/short_link.blade.php

#Layout file
7. resources/views/page_layouts/layout.blade.php

#Common head page
8. resources/views/common/head.blade.php

#migration files
9. database/migrations/

#Language files for message
10. resources/lang/en/short_link.php

#Route file
11. routes/web.php

#Model file of table
12. app/Models/ShortLink.php

Tables used

1. short_links 