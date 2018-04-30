Please run the migration with 
with PHP artisan migrate ... It will create the respective tables in the database.

** Run Composer update. 

** Update the .env with your database connectivity.

** Check for the .env file as its not part of commit .. create one and copy contents of .env.example.. Also create or update backend database
**

** secure the site if using valet with valet secure command .. if it throws php linking error update the version of php by issuing command brew install php

The project is not sending the emails right now as i have not configured the Mail driver. Update it accordingly. 

Just a hack to make user verified set is_verified column to 1 in users table