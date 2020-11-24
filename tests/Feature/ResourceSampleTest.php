<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Route;

class ResourceSampleTest extends TestCase
{
    public function testCommand()
    {
        $this->artisan('make:controller', [
            "name" => "UserController",
            "-r" => true,
            "--force" => true
        ])->assertExitCode(0);

        Route::resource('users', UserController::class);

        $routes = [];
        $routesCollection = Route::getRoutes();
        foreach ($routesCollection as $route) {
            array_push($routes, $route->uri());
        }

        $diff = in_array("users/create/new", $routes) && in_array("users/details", $routes) ? true : false;
        $this->assertTrue($diff);
        unlink(base_path() . "/app/Http/Controllers/UserController.php");
    }
}

