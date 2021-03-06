<?php namespace App\Contracts;

interface Inverter {
	
	/*
	|--------------------------------------------------------------------------
	| Inverter Contract
	|--------------------------------------------------------------------------
	|
	| This contract specifies which methods an inverter adapter must implement.
	| If no data is available, let the methods return null.
	|
	*/

	/**
	 * Get the AC power from the inverter.
	 *
	 * @return number
	 */
	public function ac_power();
	
	/**
	 * Get the AC voltage from the inverter.
	 *
	 * @return number
	 */
	public function ac_voltage();
	
	/**
	 * Get the AC current from the inverter.
	 *
	 * @return number
	 */
	public function ac_current();
	
	/**
	 * Get the AC frequency from the inverter.
	 *
	 * @return number
	 */
	public function ac_frequency();
	
	/**
	 * Get the DC power from the inverter.
	 *
	 * @return number
	 */
	public function dc_power();
	
	/**
	 * Get the DC voltage from the inverter.
	 *
	 * @return number
	 */
	public function dc_voltage();
	
	/**
	 * Get the DC current from the inverter.
	 *
	 * @return number
	 */
	public function dc_current();
	
	/**
	 * Get the AC/DC conversion efficiency from the inverter.
	 *
	 * @return number
	 */
	public function efficiency();
	
	/**
	 * Get today's yield from the inverter.
	 *
	 * @return number
	 */
	public function generation();

	/**
	 * Get all values above as an associative array. Your implementation
	 * must return the full array even if the inverter is offline.
	 *
	 * @return array
	 */
	public function measurements();

	/**
	 * Get the minimum interval in seconds before refreshing the measurements.
	 *
	 * @return int
	 */
	public function update_interval();

}

?>
