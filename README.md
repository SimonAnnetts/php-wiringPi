php-wiringPi
============

PHP bindings to the Raspberry PI wiringPi libraries.


WARNING: This is an in-development library, it will not be bug free and fully featured.
    Please email simon at ateb dot co dot uk if you have any problems, suggestions,
    questions or words of support.

WiringPi: An implementation of most of the Arduino Wiring
        functions for the Raspberry Pi

WiringPi2: WiringPi version 2 implements new functions for managing IO expanders.

Testing:
    Build with gcc version 4.6.3 (Debian 4.6.3-14+rpi1)
    Built against PHP 5.4.4

Prerequisites:
    You must have git, git-core, swig2.0, php5-dev, php5-cli and php5-common installed
    as well as the usual build tools gcc etc.
    

Get/setup repo:
    git clone https://github.com/JakDaniels/php-wiringPi
    
    cd php-wiringPi

Build & install with:
    sudo ./build.sh
    
    The build script does the following things:
    1) Downloads or updates the wiringPi library and utilities from https://git.drogon.net/wiringPi
		2) Builds and Installs the wiringPi library
		3) Creates an interface file for SWIG using the wiringPi header files
		4) Uses SWIG to create the PHP module source code and include files
		5) Builds the PHP module source and installs the shared module library
