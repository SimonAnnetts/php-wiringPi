#!/usr/bin/php
<?php
define("gpio_pin_23",4); //pin 16 on the header
define("gpio_pin_24",5); //pin 18 on the header


wiringPiSetup();

pinMode(gpio_pin_23, OUTPUT);
digitalWrite(gpio_pin_23,LOW);
pinMode(gpio_pin_24, OUTPUT);
digitalWrite(gpio_pin_24,LOW);


while(1) {
	digitalWrite(gpio_pin_23,HIGH);
	digitalWrite(gpio_pin_24,LOW);
	sleep(1);
	digitalWrite(gpio_pin_23,LOW);
	digitalWrite(gpio_pin_24,HIGH);
	sleep(1);
}
