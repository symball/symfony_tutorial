#!/bin/bash
echo "###################################################"
echo "Creating an environment file to use in docker build"
echo "###################################################"
echo "WEB_BASE=/var/www/html" > .env
echo "USER_ID=$UID" >> .env
echo "GROUP_ID=$(id -g)" >> .env
echo "###################################################"
echo "Building Docker files. This may take some time"
echo "###################################################"
docker-compose build
echo "###################################################"
echo "Complete! Now type 'docker-compose up' to run"
echo "###################################################"
