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

cat wiringPi/wiringPi/wiringPi.h |grep -v "wiringPiSetupPiFace" >wiringPi.h

echo "Writing an interface file for SWIG...."
echo "%module wiringPi" >$outfile
echo "%{" >>$outfile
echo "#include \"wiringPi.h\"" >>$outfile
for i in wiringPi/wiringPi/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ] && [ "$j" != "wiringPi/wiringPi/wiringPi" ] && echo "#include \"$j.h\"" >>$outfile
done
for i in wiringPi/devLib/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ] && echo "#include \"$j.h\"" >>$outfile
done
echo "%}" >>$outfile
echo >>$outfile

echo "%include \"wiringPi.h\"" >>$outfile
for i in wiringPi/wiringPi/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ]  && [ "$j" != "wiringPi/wiringPi/wiringPi" ] && echo "%include \"$j.h\"" >>$outfile
done
for i in wiringPi/devLib/*.o; do
	j=`echo $i|rev|cut -c3-|rev`
	[ -f $j.h ] && echo "%include \"$j.h\"" >>$outfile
done

echo "Using SWIG to create PHP module source...."
swig -php $outfile

echo "Compiling PHP module source...."
gcc `php-config --includes` -fpic -c wiringPi_wrap.c
#gcc -shared wiringPi_wrap.o -lwiringPi -o wiringPi.so
gcc -shared wiringPi_wrap.o -lwiringPi -lwiringPiDev -o wiringPi.so

echo "Copying wiringPi.so to PHP extensions dir..."
echo "extension=`php-config --extension-dir`/wiringPi.so" >wiringPi.ini

sudo cp -f wiringPi.so `php-config --extension-dir`/
sudo cp -f wiringPi.ini /etc/php5/conf.d/90-wiringPi.ini
sudo chown root:root `php-config --extension-dir`/wiringPi.so /etc/php5/conf.d/90-wiringPi.ini

echo "There is a wiringPi.php include file that loads the module and provides a wiringPi class."
echo "DONE!"

