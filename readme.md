# Coding Assignment for *cba.pl*
## Installation
+ Run *git clone* to get a local copy of the repository.
+ Run *composer install* to install all dependencies.
+ Create a *mySQL database* and populate your fields into the *.env.example* file, renaming it to *.env*.
+ Run *composer database:create*
+ Run *composer database:seed*
+ Run *vendor/bin/doctrine orm:generate-proxies*
+ Run *php -S localhost:8000*

You can now visit the application by navigating in your browser to *http://localhost:8000*. You can log in using either *First User* or *Second User* as your user name.