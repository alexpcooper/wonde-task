# Wonde Task

This is a demonstration web application, designed to give teachers the ability to see which students are in their classes, using the Wonde API.

## Installation
There are Docker files included with this project, but whether you use Docker or not you will need carry out the following...

1. Clone the repository
2. Rename or copy the .env.example to .env
3. Populate the .env file with the environment variables below
4. Run `composer install`
5. Run `php artisan key:gen`

### Environment Variables

* **WONDE_CLIENT_ID** (School ID)
* **WONDE_CLIENT_SECRET**
* **SETUP_HTTPS** (_optional_ true | false, forces https depending upon your setup)

### Requirements
This app has been built using Laravel 12 and php8.4. [Laravel 12 is supported from php8.2](https://endoflife.date/laravel).

### Database
Please note that this app does not use a database. Given the focus of the task is the interaction with the Wonde API, I felt that this was an unnecessary complexity.


## Usage
Upon loading the app you'll see a (faux) login page. This pre-populates a dropdown of IDs taken from the API. Select your user, ensure the password field is populated (with anything) and then select "Sign in".
![testcasesimage](https://gist.github.com/user-attachments/assets/b401b2c3-b0a0-4612-8e08-db79623858f2)

Once logged in you will be taken to a Dashboard listing different areas of functionality. The first one, "Classes" (highlighted) is the only one that will work, taking you to a page showing the classes relevant to the user selected.

## Authentication
Clearly I wouldn't dream of usually pre-populating a login form with a dropdown and the acceptance of any password (more so considering the implications of GDPR and data held on children). This was a compromise to reduce the need for a database and an authentication library.

In this scenario, the selected Employee ID is stored in the session and the existence of this value determines whether you are logged in or not. A very basic middleware layer checks on the session and redirects you to the login page when a value can't be retrieved.