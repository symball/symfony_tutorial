# Symfony Tutorial

This repository includes all the resources you will need to follow the tutorial found on the the following website

[simonball.me](https://simonball.me/tutorial)

Each Tutorial is represented by a different branch, with the master branch representing the initial state of a Symfony project (with some minor differences listed below) ready to be run in Docker.

Making your First pages - [making-your-first-pages](https://www.simonball.me/p/making-your-first-pages)

Adding Persistent Data - [adding-persistent-data](https://www.simonball.me/p/adding-persistent-data)

An Administration Interface [an-administration-interface](https://www.simonball.me/p/an-administration-interface)

User Interaction [user-interaction](https://www.simonball.me/p/user-interaction)

Services [services](https://www.simonball.me/p/services)

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
