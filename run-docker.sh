#!/bin/bash

docker build -t url-shortener:1.0 .
docker run -dp 9000 --name url-shortener url-shortener:1.0