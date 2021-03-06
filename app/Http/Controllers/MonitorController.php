<?php namespace App\Http\Controllers;

use App;
use App\Http\Controllers\Controller;

class MonitorController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Monitor Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders Semmy's "dashboard".
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inverter = $this->inverter;

		// Load configuration
		$pv_name  = env('PV_NAME', 'My Solar Power Plant');
		$pv_power = env('PV_POWER', 6700);

		$max_ac_power = env('MAX_AC_POWER', 5500);
		$max_dc_power = env('MAX_DC_POWER', 5620);

		$min_dc_voltage = env('MIN_DC_VOLTAGE', 125);
		$max_dc_voltage = env('MAX_DC_VOLTAGE', 800);

		$min_mpp_voltage = env('MIN_MPP_VOLTAGE', 160);
		$nom_mpp_voltage = env('NOM_MPP_VOLTAGE', 400);
		$max_mpp_voltage = env('MAX_MPP_VOLTAGE', 800);

		$min_ac_voltage = env('MIN_AC_VOLTAGE', 185);
		$nom_ac_voltage = env('NOM_AC_VOLTAGE', 230);
		$max_ac_voltage = env('MAX_AC_VOLTAGE', 276);

		$min_ac_frequency = env('MIN_AC_FREQUENCY', 45);
		$nom_ac_frequency = env('NOM_AC_FREQUENCY', 50);
		$max_ac_frequency = env('MAX_AC_FREQUENCY', 65);

		$max_dc_current = env('MAX_DC_CURRENT', 11);
		$max_ac_current = env('MAX_AC_CURRENT', 18.5);

		$min_temperature = env('MIN_TEMPERATURE', -20);
		$max_temperature = env('MAX_TEMPERATURE', 40);

		// Calculate stops for the graph color gradients
		$dc_voltage_min_stop	 = $min_dc_voltage / $max_dc_voltage;
		$dc_voltage_min_mpp_stop = $min_mpp_voltage / $max_dc_voltage;
		$dc_voltage_nom_mpp_stop = $nom_mpp_voltage / $max_dc_voltage;
		$dc_voltage_max_mpp_stop = $max_mpp_voltage / $max_dc_voltage;

		$ac_voltage_nom_stop   = ($nom_ac_voltage - $min_ac_voltage) / ($max_ac_voltage - $min_ac_voltage);
		$ac_frequency_nom_stop = ($nom_ac_frequency - $min_ac_frequency) / ($max_ac_frequency - $min_ac_frequency);

		// Get the inverter measurements
		$measurements = $inverter->measurements();
		$inverter_interval = $inverter->update_interval();

		// Get the latest weather
		$weather_station = App::make('App\Contracts\WeatherStation');
		$temperature = $weather_station->temperature();
		$weather_interval = $weather_station->update_interval();
		$weather_driver = env('WEATHER_DRIVER');

		return response()->view('monitor', compact(
			'pv_name',
			'pv_power',
			'measurements',
			'max_dc_power',
			'max_dc_voltage',
			'dc_voltage_min_stop',
			'dc_voltage_min_mpp_stop',
			'dc_voltage_nom_mpp_stop',
			'dc_voltage_max_mpp_stop',
			'max_dc_current',
			'max_ac_power',
			'min_ac_voltage',
			'max_ac_voltage',
			'ac_voltage_nom_stop',
			'max_ac_current',
			'min_ac_frequency',
			'ac_frequency_nom_stop',
			'max_ac_frequency',
			'min_temperature',
			'max_temperature',
			'temperature',
			'inverter_interval',
			'weather_interval',
			'weather_driver'
		))->setTtl($inverter_interval);
	}

}
