<?php

namespace App\Modules\AuthApi\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerInterface;

use App\Models\User;

class AuthApiController extends Controller
{

	public $service;
	// private $anotherService;

	public function __construct(ContainerInterface $container)
	{
		$this->service = $container->get('AuthApiService');
		// $this->anotherService = $container->get('AnotherService');
	}

	public function createToken(User $user){
		$token = $user->createToken('token-x-suite-x-token')->plainTextToken;

		$response = [
			'user' => $user,
			'token' => $token
		];

		return $response;
	}

    public function register(Request $request){
		$fields = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email|max:255',
            'password' => 'required|string|confirmed|max:255',
			'password_confirmation' => 'required|string|same:password|max:255'
        ]);

		$user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

		$response = $this->createToken($user);
		
		return response($response, 201);
	}

	public function login(Request $request){
		$fields = $request->validate([
			'email' => 'required|string|max:255',
			'password' => 'required|string:max:255'
		]);

		$user = User::where('email', $fields['email'])->first();

		if(!$user || !Hash::check($fields['password'], $user->password)){
			return response([
				'message' => 'Invalid credentials'
			], 401);
		}

		$response = $this->createToken($user);

		return response($response, 200);
	}

	public function logout(Request $request){
		$request->user()->currentAccessToken()->delete();
		
		return [
			'message' => 'Logged out'
		];
	}
}
