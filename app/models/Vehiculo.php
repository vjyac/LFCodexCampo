<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vehiculo extends Eloquent {

		protected $table = 'vehiculos';

		protected $fillable = ['patente'];


	public static $errors;		

	public static function isValid($data, $rules)
		{
			
			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}

/*
		// relacion
	public static function Empresa()
		{
			return belongsTo('Provincia');
		}

*/

}