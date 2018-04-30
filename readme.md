Please run the migration with 
with PHP artisan migrate ... It will create the respective tables in the database.

Update the .env with your database connectivity.

The project is not sending the emails right now as i have not configured the Mail driver. Update it accordingly. 

Just to hack to make user verified set is_verified column to 1 in users table