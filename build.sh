#!/bin/bash

outfile="wiringPi.i"

if [ -d wiringPi ]; then
	echo "Checking for and downloading newest version of wiringPi...."
	cd wiringPi
	git pull
	echo "Building and Installing wiringPi libraries and utilities..."
	./build
	cd ..
else
	echo "Downloading newest version of wiringPi...."
	git clone git://git.drogon.net/wiringPi
	cd wiringPi
	echo "Building and Installing wiringPi libraries and utilities..."
	./build
	cd ..
fi

echo "Writing an interface file for SWIG...."
echo "%module wiringPi" >$outfile
echo "%{" >>$outfile
for i in wiringPi/wiringPi/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ] && echo "#include \"$j.h\"" >>$outfile
done
echo "%}" >>$outfile
echo >>$outfile
for i in wiringPi/wiringPi/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ] && echo "%include \"$j.h\"" >>$outfile
done

echo "Using SWIG to create PHP module source...."
swig -php $outfile

echo "Compiling PHP module source...."
gcc `php-config --includes` -fpic -c wiringPi_wrap.c
gcc -shared wiringPi_wrap.o -o wiringPi.so

echo "Copying wiringPi.so to PHP extensions dir..."
sudo cp -f wiringPi.so `php-config --extension-dir`/
echo "There is a wiringPi.php include file that loads the module and provides a wiringPi class."
echo "DONE!"

