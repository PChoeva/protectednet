<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Response;
use EloquentBuilder;


class UserController extends Controller
{
	private $token = '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3';
    public function index(Request $request)
    {
    	$request_token = $request->header('token');

    	if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
    	return User::all();
    }
 
    public function show(Request $request, $id)
    {
    	$request_token = $request->header('token');

    	if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
        return User::find($id);
    }

    public function store(Request $request)
    {
    	$request_token = $request->header('token');

    	if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
        return User::create($request->all());
    }

    public function update(Request $request, $id)
    {
    	$request_token = $request->header('token');

    	if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
        $user = User::findOrFail($id);
        $user->update($request->all());

        return $user;
    }

    public function delete(Request $request, $id)
    {
    	$request_token = $request->header('token');

    	if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
        $user = User::findOrFail($id);
        $user->delete();

        return 204;
    }

    public function search(Request $request)
    {
    	$request_token = $request->header('token');

		if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}
		$first_name = $request->get('first_name');
		$last_name = $request->get('last_name');
		$username = $request->get('username');
		$dark_mode = $request->get('dark_mode');


    	$q = User::query();

		if (isset($first_name))
		{
			$q->where('first_name','like',$first_name);
		}

		if (isset($last_name))
		{
			$q->where('last_name','like',$last_name);
		}

		if (isset($username))
		{
			$q->where('username', $username);
		}

		if (isset($dark_mode))
		{
			$q->where('dark_mode',$dark_mode);
		}

		$users = $q->get();

		return $users;
	}

	public function toggleDarkMode(Request $request, $id)
	{
    	$request_token = $request->header('token');

		if ($this->token != $request_token) {
        	return $this->invalidToken();		
		}

		$dark_mode = $request->get('dark_mode');

		$user = User::findOrFail($id);
		$user->dark_mode = $dark_mode ? 1 : 0;
        $user->update();

        return $user;
	}

	protected function invalidToken()
	{
		return response()->json(['error' => [401 => 'Invalid Token.']], 401);
	}
}