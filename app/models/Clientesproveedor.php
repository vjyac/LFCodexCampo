<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Clientesproveedor extends Eloquent {

		protected $table = 'clientesproveedors';

		protected $fillable = ['clientesproveedor'];


	public static $errors;		

	public static function isValid($data, $rules)
		{
			
			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}

	// 	// relacion
	// public static function Provincia()
	// 	{
	// 		return belongsTo('Provincia');
	// 	}



}