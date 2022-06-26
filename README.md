# PALPOCKET

Pal Pocket is a commercial application allowing the user, a company or an individual, to track his incomes and expenses for any period of time, and to have a visibility of them through an automatically generated chart. The application was created using Laravel. 



## How to run the app

1. Download the application and open the folder
2. Install all dependencies using the ‘npm I’ command.
3. Start the web server using the ‘php artisan serve’. The app will be served at http://localhost:80000/.
4. Go to http://localhost:80000/ in your browser and access to the home page.


## User stories

- A  user can register
- A  user can login
- A user can create a new income
- A  user can edit an income
- A  user can delete an income
- A  user can search for an income
- A  user can create an expense 
- A  user can edit an expense
- A  user can search for an expense
- A  user can delete an expense
- A user can generate a chart following the nature of the information and time range he’s looking for.


## Features

- Creating an income
	The income created is displayed of the « income » index page.
	The income’s informations must be relevant and complete to be validated.

- Editing an animal
	The income informations are displayed on an editable form.
	The income’s new informations must be relevant and complete to be validated.

- Deleting an animal
	The income deleted is removed from the database and doesn’t appear anymore.

- Searching an animal
	The keyword searched gets sent to backend and allows to get any corresponding animal among the existing ones. 

- Creating an expense
	The income created is displayed of the « expense » index page.
	The expense informations must be relevant and complete to be validated.

- Editing an expense
	The expense informations are displayed on an editable form.
	The expense’s new informations must be relevant and complete to be validated.

- Deleting an expense
	The expense deleted is removed from the database and doesn’t appear anymore.

- Generating a chart
	The user chooses the nature of the chart he wants to generate: Income, Expense or Gross Revenue.
	The user chooses the time range the chart must represent.
	The data previously entered by the user is used to generate a chart.


## Coming features

- New front-end template.

## Technologies

- PHP
- Laravel
- JavaScript
- JsChart


## Dependencies

- Bootstrap 5.1.3
- Mdm-for-laravel 1.0.0
- Chart.js 3.7.1
