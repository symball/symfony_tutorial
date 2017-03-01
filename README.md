# Symfony Tutorial

This repository includes all the resources you will need to follow the tutorial found on the the following website

[simonball.me](https://simonball.me/tutorial)

Each Tutorial is represented by a different branch, with the master branch representing the initial state of a Symfony project (with some minor differences listed below) ready to be run in Docker.

[part-1](https://www.simonball.me/p/making-your-first-pages)

[part-2](https://www.simonball.me/p/adding-persistent-data)

[part-2](https://www.simonball.me/p/an-administration-interface)

[part-4](https://www.simonball.me/p/user-interaction)


## Running the code in Docker
The Docker image set should be initialised using the shell script `initial.sh` which prepares the images in a fashion which will allow the project to run and allow you to edit the site locally without any permission errors. Once you have run the above script, the web environment can be brought up by running `docker-compose up`.

Due to the way Symfony projects are packaged, you are not ready yet. One of the containers running is named project_toolchain (a collection of tools to manage the project without needing to install locally) and you will run `composer install` from this container. In order to do that:

```
# Discover the name of the image, most likely symfony_tutorial_project_toolchain_1
docker ps
# Bring up a shell. Substitute symfony_tutorial_project_toolchain_1 if named differently
docker exec -it symfony_tutorial_project_toolchain_1 bash
# Run Composer install
composer install
```

If (at the end of downloading the packages) Composer prompts you for some information, be sure to leave the database parameters as defaults, the parameters.yml.dist file has already been setup to connect for you. The only option recommended to change is the `secret`

## Minor differences in Symfony project

* The firewall in web/app_dev.php has been disabled so that the project can be properly accessed in a web browser
* The default parameters.yml.dist has been modified so that the Database defaults are configured for use in Docker
* Composer update has been run once, as of March 1st 2017
