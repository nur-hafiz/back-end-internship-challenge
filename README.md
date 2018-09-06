Employee attendance tracking
======
Description
------
This application tracks an employees time of coming into and leaving work. The application has 2 forms and 4 main classes.

Main Classes
------
User - Contains properties of users and methods to fill and retrieve the properties
Record - Contains properties of records and methods to fill and retrieve the properties
User_DB - Contains MySQL queries to manipulate User data in DB
Record_DB - Contains MySQL queries to manipulate Record data in DB

Forms
------
new_users - To save new users into the system, primarily uses User and User_DB classes
attendace - Uses server timing for users to clock in and out of the system
