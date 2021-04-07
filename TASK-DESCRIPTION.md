# DevriX: Job board portal requirements

## Introduction and an overview

This project would be a simple job board project listing website similar to jobs.bg, but a simplified version, of course. The project would have a landing page listing all jobs, simple admin area for editing jobs submissions.

## Requirements

We need a simple PHP project that will have the following functionality:
- A simple Job board page listing all job offers
- A submission form providing the option to submit a new job offer
- A dashboard page for administrators to be able to see all jobs submissions, being able to edit and delete entries
  - For the admin area are, we need simple login details, no need of adding custom permissions and roles

For this project, you’ll need to use PHP and create a simple database having only 2 or 3 tables for having the job offers. The best option would be to use MySQL, but this is not mandatory, you may use another service of choice.

You’ll need a LAMP/XAMPP/WAMP stack for the server and your work should focus on establishing a connection between PHP and MySQL in order to perform basic CRUD operations - save the data into the database, write, and read the information from it.
More info on how to setup a localhost server could be found [here](https://www.ionos.com/digitalguide/server/tools/xampp-tutorial-create-your-own-local-test-server/) and [here](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04), based on the OS you are using.

In regards to the front-end views, you can use the resources specifically prepared for you which can be found here:
Code: [https://github.com/xavortm/html-template-jobs/tree/main](https://github.com/xavortm/html-template-jobs/tree/main)
This is how the front-end should look like: [https://html-template-jobs.vercel.app/](https://html-template-jobs.vercel.app/)

The end result of your work should cover the following:
- Having a subm t tission form for submitting job offers. A single offer must have:
  - Title
  - Description
  - Company
  - Salary field
- Having a list of submitted offers
- Having a simple administrative panel listing job offers and being able to delete and edit offers
- Having a README.md file in the Git repository explaining the required setup for the project and short information about the project
- An export of your final database for reviewing the structure and the data

### Bonus points

- Having an option to approve/reject submissions from the administrative panel
- Having an option to search by a keyword for jobs
- Having a paginated listing page, being able to go to page 2, page 3, etc

## What you’ll learn after the successful delivery of the project?

You’ll know how to work with basic PHP classes and functions. You’ll be able to connect PHP with a database and write and read data from a database. You’ll be able to work with a webserver.

## Deadline

We need your submission of the work not later than the 13th of April 2021.
