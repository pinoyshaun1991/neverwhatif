Neverwhatif Task
===============================

### How to test
1. Create table in database called neverwhatif.
2. Run `php artisan migrate` to migrate across the database schema.
3. Run `php artisan serve`. Once navigated to the localhost, you are presented with the default Laravel home page including a form to enter; Your Name, Email & Message.
4. Validation is put in place for each of those fields, after entering the information press Submit.
5. The page should refresh and by clicking the View Messages link you will be presented with a table containing the information entered into the database.
6. Unit tests have been implemented using PHP Unit, to execute please cd to the root directory and run the following command `./vendor/bin/phpunit tests`.

*If no classes seem to load please try and run `composer dump-autoload`.  
