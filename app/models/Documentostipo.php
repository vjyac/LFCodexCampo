<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Documentostipo extends Eloquent {

		protected $table = 'documentostipos';

		protected $fillable = ['documentostipo'];


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