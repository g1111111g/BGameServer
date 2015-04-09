#!/bin/sh 
protoc test.proto --java_out=./
cp -rf test.proto test1.proto
sed -i 1,5d test1.proto
sed -i s/\\/\\/.*//g test1.proto
php protoc-php.php test1.proto
