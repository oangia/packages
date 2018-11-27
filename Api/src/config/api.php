<?php

return [

	/*
	 *
	 * User model for authenticate
	 *
	*/
	'model' => \App\Models\User::class,

	/*
	 *
	 * Exceptions for method accept application/json
	 *
	*/
	'except' => [
		'getToken'
	],

];