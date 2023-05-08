# php-login-system

This PHP login script is used to register a new user to a website or application. It starts by including two other PHP files, "dbh.php" and "functions.php", which contain database connection and various functions for validating user inputs and creating a new user in the database.

The script checks if the form has been submitted by checking if the 'submit' button has been pressed. If it has been pressed, the script retrieves the user input values using the $_POST method and then checks if all the required input fields are not empty using the function empty_input_signup() defined in functions.php. If any of the fields are empty, the script redirects the user back to the registration page with an error message.

Then the script checks if the user entered a valid email using the function invalid_email() defined in functions.php. If the email is invalid, the script redirects the user back to the registration page with an error message.

Next, the script checks if the email or mobile number already exists in the database using the function email_exist() defined in functions.php. If the email already exists, the script redirects the user back to the registration page with an error message.

Finally, if all the above validations pass, the script calls the function create_user() defined in functions.php to create a new user in the database and redirects the user to a new page or displays a success message.

In summary, this PHP script is used to validate and store user input values to register a new user to a website or application.
