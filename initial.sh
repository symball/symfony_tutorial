#!/bin/bash
#!/
#!/# Author Simon Ball <contact@simonball.me>
# This is just a quick shell script to bootstrap Docker Symfony projects

# Function to check whether command exists or not
exists()
{
  if command -v $1 &>/dev/null
  then
    return 0
  else
    return 1
    fi
}

# Start by checking whether docker and docker-compose exist
echo "Checking whether needed tools found"
if exists docker
  then echo "Docker found"
  else echo "Docker not found, exiting"
  exit
fi

if exists docker-compose
  then echo "Docker-compose found"
  else echo "Docker-compose not found, exiting"
  exit
fi

# Try and get the user ID
USER_ID=$UID
id_command='id -u'
[ -z "$USER_ID" ] && USER_ID=$(id -u)

# Try and use the script parameter if one exists
[ -z "$USER_ID" ] && [ "$1" ] && USER_ID=$1
fi

if [ -z "$USER_ID" ]
then
  echo "Could not get User ID"
  echo "Try finding your uid by running 'id' and relaunch this script appending the number on the end."
  echo "e.g - sh initial.sh 1000"
fi
exit

echo "Creating an environment file to use in docker build"
echo "USER_ID=$USER_ID" > .env
echo "GROUP_ID=$(id -g)" >> .env

echo "Building Docker files. This may take some time"
docker-compose build

echo "Starting up Docker environment"
docker-compose up -d

# Wait until docker is available
until docker exec -t symfonytutorial_project_toolchain_1 ls -la > /dev/null 2>&1; do sleep 2; done

echo "Docker environment is up and running"

echo "Running Composer install"
docker exec -it symfonytutorial_project_toolchain_1 composer install --no-interaction
echo "Dumping Assets"
docker exec -it symfonytutorial_project_toolchain_1 php bin/console assets:install --symlink --relative

echo "### NOTES ###"
echo "To get back to your parent system"
echo "exit"
echo "To shutdown the environment, once you are back in your parent shell"
echo "docker-compose stop"
echo "In the future, if you want to boot up the environment again"
echo "docker-compose up"
echo "In the future, to get a shell in the toolchain, once Docker is up"
echo "docker exec -it firstworldtest_project_toolchain_1 bash"
echo "### END NOTES ###"
echo "Ready for you to run. Getting an interactive shell prompt in the project directory"
docker exec -it symfonytutorial_project_toolchain_1 bash
