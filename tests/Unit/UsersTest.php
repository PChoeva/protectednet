<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class UsersTest extends TestCase
{
	private $url = "http://127.0.0.1:8000";
	private $created_id = "";

    public function testWrongToken()
    {
        $response = $this->get($this->url . '/api/users');
		$response->assertStatus(401);
    }

    public function testListUsers()
    {
        $response = $this->withHeaders([
            'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        ])->json('GET', '/api/users');


		$response->assertStatus(200);
    }

    public function testToggleDarkModeOn()
    {
        $response = $this->withHeaders([
            'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        ])->put('/api/users/toggleDarkMode/1', [
	        'dark_mode' => true,
	    ]);

		$response->assertJson([ "dark_mode" => 1]);
		$response->assertStatus(200);
    }

    public function testCreateUser()
    {
        $response = $this->withHeaders([
            'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        ])->post('/api/users/', [
	        'first_name' => 'Test1',
	        'last_name' => 'Unit',
	        'username' => 'unitTest1',
	        'dark_mode' => false,
	    ]);

		$response->assertJson([
			"first_name" =>  'Test1',
			"last_name" => 'Unit',
			"username" => 'unitTest1',
			"dark_mode" => false,
		]);
		$this->created_id = $response['id'];
		$response->assertStatus(201);
    }

    public function testDeleteUser()
    {
		$user = User::factory('App\Models\User')->create();

        $this->withHeaders([
            	'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        	])
        	->delete('/api/users/'.$user->id)
            ->assertStatus(200);
    }

    public function testUpdateName()
    {
    	$name = 'unit'.rand(1, 55);
        $response = $this->withHeaders([
            'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        ])->put('/api/users/2', [
	        'first_name' => $name,
	    ]);

		$response->assertJson([ "first_name" => $name]);
		$response->assertStatus(200);
    }

	public function testSearchByName() {
        $data = ["first_name"=>"Barry","last_name"=>"Allen"];

 		$response = $this->withHeaders([
            'token' => '9PQOk69KQUnjL50vXeH1DOw9lSKDh7x3',
        ])->post('/api/users/search', $data);
       
 		$filtered_users[] = [
	        "id"=> 1,
	        "first_name"=> "Barry",
	        "last_name"=> "Allen",
	        "username"=> "theflash",
	        "dark_mode"=> 1,
        	"created_at"=> "2020-12-07T21:07:04.000000Z",
        	"updated_at"=> "2020-12-07T22:22:48.000000Z"
    	];

       	$response->assertStatus(200)
            ->assertJson($filtered_users);
    }
}
