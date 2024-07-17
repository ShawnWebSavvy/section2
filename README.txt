Hello 

Please download the project to your xampp/htdocs folder Start XAMPP Control Panel Open your browser to -> http://localhost/Section2/ 

Please open and run XAMPP control panel.

Open Postman 
Create a new request
Select the POST method, with  this url 
http://127.0.0.1:9000/validate
Add two Parameters with values
parameter - phone_number 
value - 0117051011

parameter - country_code
value - 011

This will validate the number
And insert into a MySQL databasee if the number does not exist.



Please run
./vendor/bin/phpunit
for unit tests


