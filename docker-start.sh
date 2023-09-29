#!/bin/bash

if ! docker info &> /dev/null; then
    echo "Docker isn't running. Please start docker desktop first, then run the script again."
    exit 1
fi

systemctl stop docker

rm ~/.docker/config.json

systemctl start docker

docker login

docker context ls

docker context use desktop-linux

docker-compose up -d --build
