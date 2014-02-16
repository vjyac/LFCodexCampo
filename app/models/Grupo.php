<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Grupo extends Eloquent {

		protected $table = 'grupos';

		protected $fillable = ['grupo'];


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