<?php
	
	use App\Models\Persona;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Route;
	
	/*
	|--------------------------------------------------------------------------
	| API Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register API routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| is assigned the "api" middleware group. Enjoy building your API!
	|
	*/
	Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
		return $request->user();
	});
	Route::get('/numero', function (Request $request) {
		$r = rand(1, 10);
		$array = ["Numero" => $r];
		return Response::json($array);
	});
	Route::get('/ganadores', function (Request $request) {
		$respuesta = ["status" => true];
		$array = [
			["Nombre" => "Ramiro", "Cantidad" => "21", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Juan", "Cantidad" => "18", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Pedro", "Cantidad" => "15", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Maria", "Cantidad" => "12", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Jose", "Cantidad" => "9", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Luis", "Cantidad" => "6", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Ana", "Cantidad" => "3", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Lucia", "Cantidad" => "0", "urlImg" => "https://fer-uig.glitch.me"],
			["Nombre" => "Karla", "Cantidad" => "0", "urlImg" => "https://fer-uig.glitch.me"],
		];
		$respuesta["data"] = $array;
		return Response::json($respuesta);
	});
	Route::post("/enviarnumero", function (Request $request) {
		$persona = $request->input("persona");
		Persona::create($persona);
		return Response::json($persona);
	});
