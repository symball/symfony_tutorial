# Symfony Tutorial

This repository includes all the resources you will need to follow the tutorial found on the the following website

[simonball.me](https://simonball.me/tutorial)

Each Tutorial is represented by a different branch, with the master branch representing the initial state of a Symfony project (with some minor differences listed below) ready to be run in Docker.

Creating our template - [creating_our_template](https://www.simonball.me/tutorial/symfony/creating-our-template)

Setting up Data objects - [setting_up_data_objects](https://www.simonball.me/tutorial/symfony/setting-up-data-objects)

Saving and retrieving data [saving_and_retrieving_data](https://www.simonball.me/tutorial/symfony/saving-and-retrieving-data)

Ready to go User System [ready_to_go_user_system](https://www.simonball.me/tutorial/symfony/ready-to-go-user-system)

Setting up the admin builder [setting_up_the_admin_builder](https://www.simonball.me/tutorial/symfony/setting-up-the-admin-builder)

The Form Builder [the_form_builder](https://www.simonball.me/tutorial/symfony/the-form-builder)

A better form [a_better_form](https://www.simonball.me/tutorial/symfony/a-better-form)

Micro Services [micro_services](https://www.simonball.me/tutorial/symfony/micro-services)

Event Listeners [event_listeners](https://www.simonball.me/tutorial/symfony/event-listeners)

## Important Note
If you choose to switch branches during your development, I strongly recommend you run `composer install` each time as it is possible new Symfony packages are expected.

## Running the code in Docker
The Docker image set should be initialised using the shell script `initial.sh` which:

* Sets up the Docker environment for you
* Performs the initial Symfony install
* Gets you an interactive shell on the toolchain container

## Minor differences in Symfony project

* The firewall in web/app_dev.php has been disabled so that the project can be properly accessed in a web browser
* The default parameters.yml.dist has been modified so that the Database defaults are configured for use in Docker
