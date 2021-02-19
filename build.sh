#!/bin/bash

php_version=7.3
swig_php_version=7

outfile="wiringPi.i"

if [ -d WiringPi ]; then
	echo "Checking for and downloading newest version of WiringPi...."
	cd WiringPi
	git pull
	echo "Building and Installing WiringPi libraries and utilities..."
	./build
	cd ..
else
	echo "Downloading newest version of WiringPi...."
	git clone https://github.com/WiringPi/WiringPi.git
	cd WiringPi
	echo "Building and Installing WiringPi libraries and utilities..."
	./build
	cd ..
fi

# cat wiringPi/wiringPi/wiringPi.h |grep -v "wiringPiSetupPiFace" >wiringPi.h
cat WiringPi/wiringPi/wiringPi.h  >wiringPi.h

echo "Writing an interface file for SWIG...."
echo "%module wiringPi" >${outfile}
echo "%{" >>${outfile}
echo "#include \"wiringPi.h\"" >>${outfile}
for i in WiringPi/wiringPi/*.o; do
	j=$(echo $i|rev|cut -c3-|rev)
	[ -f $j.h ] && [ "$j" != "WiringPi/wiringPi/wiringPi" ] && echo "#include \"$j.h\"" >>${outfile}
done
for i in WiringPi/devLib/*.o; do
	j=$(echo $i|rev|cut -c3-|rev)
	[ -f $j.h ] && echo "#include \"$j.h\"" >>${outfile}
done
echo "%}" >>${outfile}
echo >>${outfile}

echo "%include \"wiringPi.h\"" >>${outfile}
for i in WiringPi/wiringPi/*.o; do
	j=$(echo $i|rev|cut -c3-|rev)
	[ -f $j.h ]  && [ "$j" != "WiringPi/wiringPi/wiringPi" ] && echo "%include \"$j.h\"" >>${outfile}
done
for i in wiringPi/devLib/*.o; do
	j=$(echo $i|rev|cut -c3-|rev)
	[ -f $j.h ] && echo "%include \"$j.h\"" >>${outfile}
done

echo "Using SWIG to create PHP module source...."
swig -v -php${swig_php_version} ${outfile}

php_includes=$(php-config --includes)
php_extensions=$(php-config --extension-dir)

echo "Compiling PHP module source...."
gcc ${php_includes} -fpic -c wiringPi_wrap.c
gcc -shared wiringPi_wrap.o -lwiringPi -lwiringPiDev -o wiringPi.so

echo "Copying wiringPi.so to PHP extensions dir..."
echo "extension=${php_extensions}/wiringPi.so" >wiringPi.ini

sudo cp -f wiringPi.so ${php_extensions}/
sudo chown root:root ${php_extensions}/wiringPi.so
sudo chmod 644 ${php_extensions}/wiringPi.so

sudo cp -f wiringPi.ini /etc/php/${php_version}/mods-available/wiringPi.ini
sudo chown root:root /etc/php/${php_version}/mods-available/wiringPi.ini

for i in cli apache2; do
	if [ -d /etc/php/${php_version}/${i} ]; then
		sudo ln -s /etc/php/${php_version}/mods-available/wiringPi.ini /etc/php/${php_version}/${i}/conf.d/20-wiringPi.ini 2>/dev/null
	fi
done

echo "There is a wiringPi.php include file that loads the module and provides a wiringPi class."
echo "DONE!"

