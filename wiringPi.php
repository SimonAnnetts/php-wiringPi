<?php

/* ----------------------------------------------------------------------------
 * This file was automatically generated by SWIG (http://www.swig.org).
 * Version 2.0.7
 * 
 * This file is not intended to be easily readable and contains a number of 
 * coding conventions designed to improve portability and efficiency. Do not make
 * changes to this file unless you know what you are doing--modify the SWIG 
 * interface file instead. 
 * ----------------------------------------------------------------------------- */

// Try to load our extension if it's not already loaded.
if (!extension_loaded('wiringPi')) {
  if (strtolower(substr(PHP_OS, 0, 3)) === 'win') {
    if (!dl('php_wiringPi.dll')) return;
  } else {
    // PHP_SHLIB_SUFFIX gives 'dylib' on MacOS X but modules are 'so'.
    if (PHP_SHLIB_SUFFIX === 'dylib') {
      if (!dl('wiringPi.so')) return;
    } else {
      if (!dl('wiringPi.'.PHP_SHLIB_SUFFIX)) return;
    }
  }
}



abstract class wiringPi {
	static function drcSetupSerial($pinBase,$numPins,$device,$baud) {
		return drcSetupSerial($pinBase,$numPins,$device,$baud);
	}

	static function max31855Setup($pinBase,$spiChannel) {
		return max31855Setup($pinBase,$spiChannel);
	}

	static function max5322Setup($pinBase,$spiChannel) {
		return max5322Setup($pinBase,$spiChannel);
	}

	static function mcp23008Setup($pinBase,$i2cAddress) {
		return mcp23008Setup($pinBase,$i2cAddress);
	}

	static function mcp23016Setup($pinBase,$i2cAddress) {
		return mcp23016Setup($pinBase,$i2cAddress);
	}

	static function mcp23017Setup($pinBase,$i2cAddress) {
		return mcp23017Setup($pinBase,$i2cAddress);
	}

	static function mcp23s08Setup($pinBase,$spiPort,$devId) {
		return mcp23s08Setup($pinBase,$spiPort,$devId);
	}

	static function mcp23s17Setup($pinBase,$spiPort,$devId) {
		return mcp23s17Setup($pinBase,$spiPort,$devId);
	}

	static function mcp3002Setup($pinBase,$spiChannel) {
		return mcp3002Setup($pinBase,$spiChannel);
	}

	static function mcp3004Setup($pinBase,$spiChannel) {
		return mcp3004Setup($pinBase,$spiChannel);
	}

	const MCP3422_SR_3_75 = MCP3422_SR_3_75;

	const MCP3422_SR_15 = MCP3422_SR_15;

	const MCP3422_SR_60 = MCP3422_SR_60;

	const MCP3422_SR_240 = MCP3422_SR_240;

	const MCP3422_GAIN_1 = MCP3422_GAIN_1;

	const MCP3422_GAIN_2 = MCP3422_GAIN_2;

	const MCP3422_GAIN_4 = MCP3422_GAIN_4;

	const MCP3422_GAIN_8 = MCP3422_GAIN_8;

	static function mcp3422Setup($pinBase,$i2cAddress,$sampleRate,$gain) {
		return mcp3422Setup($pinBase,$i2cAddress,$sampleRate,$gain);
	}

	static function mcp4802Setup($pinBase,$spiChannel) {
		return mcp4802Setup($pinBase,$spiChannel);
	}

	static function pcf8574Setup($pinBase,$i2cAddress) {
		return pcf8574Setup($pinBase,$i2cAddress);
	}

	static function pcf8591Setup($pinBase,$i2cAddress) {
		return pcf8591Setup($pinBase,$i2cAddress);
	}

	static function sn3218Setup($pinBase) {
		return sn3218Setup($pinBase);
	}

	static function softPwmCreate($pin,$value,$range) {
		return softPwmCreate($pin,$value,$range);
	}

	static function softPwmWrite($pin,$value) {
		softPwmWrite($pin,$value);
	}

	static function softToneCreate($pin) {
		return softToneCreate($pin);
	}

	static function softToneWrite($pin,$freq) {
		softToneWrite($pin,$freq);
	}

	static function sr595Setup($pinBase,$numPins,$dataPin,$clockPin,$latchPin) {
		return sr595Setup($pinBase,$numPins,$dataPin,$clockPin,$latchPin);
	}

	static function wiringPiI2CRead($fd) {
		return wiringPiI2CRead($fd);
	}

	static function wiringPiI2CReadReg8($fd,$reg) {
		return wiringPiI2CReadReg8($fd,$reg);
	}

	static function wiringPiI2CReadReg16($fd,$reg) {
		return wiringPiI2CReadReg16($fd,$reg);
	}

	static function wiringPiI2CWrite($fd,$data) {
		return wiringPiI2CWrite($fd,$data);
	}

	static function wiringPiI2CWriteReg8($fd,$reg,$data) {
		return wiringPiI2CWriteReg8($fd,$reg,$data);
	}

	static function wiringPiI2CWriteReg16($fd,$reg,$data) {
		return wiringPiI2CWriteReg16($fd,$reg,$data);
	}

	static function wiringPiI2CSetupInterface($device,$devId) {
		return wiringPiI2CSetupInterface($device,$devId);
	}

	static function wiringPiI2CSetup($devId) {
		return wiringPiI2CSetup($devId);
	}

	const NUM_PINS = NUM_PINS;

	const WPI_MODE_PINS = WPI_MODE_PINS;

	const WPI_MODE_GPIO = WPI_MODE_GPIO;

	const WPI_MODE_GPIO_SYS = WPI_MODE_GPIO_SYS;

	const WPI_MODE_PHYS = WPI_MODE_PHYS;

	const WPI_MODE_PIFACE = WPI_MODE_PIFACE;

	const WPI_MODE_UNINITIALISED = WPI_MODE_UNINITIALISED;

	const INPUT = INPUT;

	const OUTPUT = OUTPUT;

	const PWM_OUTPUT = PWM_OUTPUT;

	const GPIO_CLOCK = GPIO_CLOCK;

	const LOW = LOW;

	const HIGH = HIGH;

	const PUD_OFF = PUD_OFF;

	const PUD_DOWN = PUD_DOWN;

	const PUD_UP = PUD_UP;

	const PWM_MODE_MS = PWM_MODE_MS;

	const PWM_MODE_BAL = PWM_MODE_BAL;

	const INT_EDGE_SETUP = INT_EDGE_SETUP;

	const INT_EDGE_FALLING = INT_EDGE_FALLING;

	const INT_EDGE_RISING = INT_EDGE_RISING;

	const INT_EDGE_BOTH = INT_EDGE_BOTH;

	const WPI_FATAL = WPI_FATAL;

	const WPI_ALMOST = WPI_ALMOST;

	static function wiringPiNodes_set($wiringPiNodes) {
		wiringPiNodes_set($wiringPiNodes);
	}

	static function wiringPiNodes_get() {
		$r=wiringPiNodes_get();
		if (is_resource($r)) {
			$c=substr(get_resource_type($r), (strpos(get_resource_type($r), '__') ? strpos(get_resource_type($r), '__') + 2 : 3));
			if (class_exists($c)) return new $c($r);
			return new wiringPiNodeStruct($r);
		}
		return $r;
	}

	static function wiringPiFailure($fatal,$message) {
		return wiringPiFailure($fatal,$message);
	}

	static function wiringPiFindNode($pin) {
		$r=wiringPiFindNode($pin);
		if (is_resource($r)) {
			$c=substr(get_resource_type($r), (strpos(get_resource_type($r), '__') ? strpos(get_resource_type($r), '__') + 2 : 3));
			if (class_exists($c)) return new $c($r);
			return new wiringPiNodeStruct($r);
		}
		return $r;
	}

	static function wiringPiNewNode($pinBase,$numPins) {
		$r=wiringPiNewNode($pinBase,$numPins);
		if (is_resource($r)) {
			$c=substr(get_resource_type($r), (strpos(get_resource_type($r), '__') ? strpos(get_resource_type($r), '__') + 2 : 3));
			if (class_exists($c)) return new $c($r);
			return new wiringPiNodeStruct($r);
		}
		return $r;
	}

	static function wiringPiSetup() {
		return wiringPiSetup();
	}

	static function wiringPiSetupSys() {
		return wiringPiSetupSys();
	}

	static function wiringPiSetupGpio() {
		return wiringPiSetupGpio();
	}

	static function wiringPiSetupPhys() {
		return wiringPiSetupPhys();
	}

	static function pinModeAlt($pin,$mode) {
		pinModeAlt($pin,$mode);
	}

	static function pinMode($pin,$mode) {
		pinMode($pin,$mode);
	}

	static function pullUpDnControl($pin,$pud) {
		pullUpDnControl($pin,$pud);
	}

	static function digitalRead($pin) {
		return digitalRead($pin);
	}

	static function digitalWrite($pin,$value) {
		digitalWrite($pin,$value);
	}

	static function pwmWrite($pin,$value) {
		pwmWrite($pin,$value);
	}

	static function analogRead($pin) {
		return analogRead($pin);
	}

	static function analogWrite($pin,$value) {
		analogWrite($pin,$value);
	}

	static function wiringPiSetupPiFace() {
		return wiringPiSetupPiFace();
	}

	static function wiringPiSetupPiFaceForGpioProg() {
		return wiringPiSetupPiFaceForGpioProg();
	}

	static function piBoardRev() {
		return piBoardRev();
	}

	static function wpiPinToGpio($wpiPin) {
		return wpiPinToGpio($wpiPin);
	}

	static function physPinToGpio($physPin) {
		return physPinToGpio($physPin);
	}

	static function setPadDrive($group,$value) {
		setPadDrive($group,$value);
	}

	static function getAlt($pin) {
		return getAlt($pin);
	}

	static function digitalWriteByte($value) {
		digitalWriteByte($value);
	}

	static function pwmSetMode($mode) {
		pwmSetMode($mode);
	}

	static function pwmSetRange($range) {
		pwmSetRange($range);
	}

	static function pwmSetClock($divisor) {
		pwmSetClock($divisor);
	}

	static function gpioClockSet($pin,$freq) {
		gpioClockSet($pin,$freq);
	}

	static function waitForInterrupt($pin,$mS) {
		return waitForInterrupt($pin,$mS);
	}

	static function wiringPiISR($pin,$mode,$function) {
		return wiringPiISR($pin,$mode,$function);
	}

	static function piThreadCreate($fn) {
		return piThreadCreate($fn);
	}

	static function piLock($key) {
		piLock($key);
	}

	static function piUnlock($key) {
		piUnlock($key);
	}

	static function piHiPri($pri) {
		return piHiPri($pri);
	}

	static function delay($howLong) {
		delay($howLong);
	}

	static function delayMicroseconds($howLong) {
		delayMicroseconds($howLong);
	}

	static function millis() {
		return millis();
	}

	static function micros() {
		return micros();
	}

	static function wiringPiSPIGetFd($channel) {
		return wiringPiSPIGetFd($channel);
	}

	static function wiringPiSPIDataRW($channel,$data,$len) {
		return wiringPiSPIDataRW($channel,$data,$len);
	}

	static function wiringPiSPISetup($channel,$speed) {
		return wiringPiSPISetup($channel,$speed);
	}

	static function serialOpen($device,$baud) {
		return serialOpen($device,$baud);
	}

	static function serialClose($fd) {
		serialClose($fd);
	}

	static function serialFlush($fd) {
		serialFlush($fd);
	}

	static function serialPutchar($fd,$c_) {
		serialPutchar($fd,$c_);
	}

	static function serialPuts($fd,$s) {
		serialPuts($fd,$s);
	}

	static function serialPrintf($fd,$message) {
		serialPrintf($fd,$message);
	}

	static function serialDataAvail($fd) {
		return serialDataAvail($fd);
	}

	static function serialGetchar($fd) {
		return serialGetchar($fd);
	}

	const LSBFIRST = LSBFIRST;

	const MSBFIRST = MSBFIRST;

	static function shiftIn($dPin,$cPin,$order) {
		return shiftIn($dPin,$cPin,$order);
	}

	static function shiftOut($dPin,$cPin,$order,$val) {
		shiftOut($dPin,$cPin,$order,$val);
	}
}

/* PHP Proxy Classes */
class wiringPiNodeStruct {
	public $_cPtr=null;
	protected $_pData=array();

	function __set($var,$value) {
		$func = 'wiringPiNodeStruct_'.$var.'_set';
		if (function_exists($func)) return call_user_func($func,$this->_cPtr,$value);
		if ($var === 'thisown') return swig_wiringPi_alter_newobject($this->_cPtr,$value);
		$this->_pData[$var] = $value;
	}

	function __isset($var) {
		if (function_exists('wiringPiNodeStruct_'.$var.'_set')) return true;
		if ($var === 'thisown') return true;
		return array_key_exists($var, $this->_pData);
	}

	function __get($var) {
		if ($var === 'next') return new wiringPiNodeStruct(wiringPiNodeStruct_next_get($this->_cPtr));
		$func = 'wiringPiNodeStruct_'.$var.'_get';
		if (function_exists($func)) return call_user_func($func,$this->_cPtr);
		if ($var === 'thisown') return swig_wiringPi_get_newobject($this->_cPtr);
		return $this->_pData[$var];
	}

	function __construct($res=null) {
		if (is_resource($res) && get_resource_type($res) === '_p_wiringPiNodeStruct') {
			$this->_cPtr=$res;
			return;
		}
		$this->_cPtr=new_wiringPiNodeStruct();
	}
}


?>
