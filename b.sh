#!/bin/sh


while read line;
do 
	echo "sudo chmod 777" $line;
done < f.txt

