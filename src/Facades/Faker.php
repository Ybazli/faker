<?php 

namespace Ybazli\Faker\Facades;

use Illuminate\Support\Facades\Facade;


class Faker extends Facade
{
	
	protected static function getFacadeAccessor(){

		return 'Faker';
	}
}