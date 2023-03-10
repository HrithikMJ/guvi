#! /usr/bin/bash

while true
do
    inotifywait -e modify ./$1 && ./php.sh $1
done