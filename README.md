php-wiringPi
============

PHP bindings to the Raspberry PI wiringPi libraries.


WARNING: This is an in-development library, it will not be bug free and fully featured.
    Please email simon at ateb dot co dot uk if you have any problems, suggestions,
    questions or words of support.

WiringPi: An implementation of most of the Arduino Wiring functions for the Raspberry Pi
WiringPi2: WiringPi version 2 implements new functions for managing IO expanders.

Testing:
    Build with gcc (Raspbian 8.3.0-6+rpi1) 8.3.0
    Built against PHP 7.3 (can be changed by setting the PHP version in the top of the build.sh script)

Prerequisites:
    You must have git, git-core, swig, php-dev, php-cli and php-common installed
    as well as the usual build tools gcc etc.
    

Get/setup repo:

		git clone https://github.com/SimonAnnetts/php-wiringPi
		cd php-wiringPi

Build & install with:
    
		./build.sh
		
Check that the module loads:

		php -m
		
Look for the wiringPi module in the list and that there are no errors.
    
The build script does the following things:
    
	1) Downloads or updates the wiringPi library and utilities from https://github.com/WiringPi/WiringPi.git
	2) Builds and Installs the wiringPi library
	3) Creates an interface file for SWIG using the wiringPi header files
	4) Uses SWIG to create the PHP module source code and include files
	5) Builds the PHP module source and then installs the shared module library (using sudo) for php-cli and apache2 module
