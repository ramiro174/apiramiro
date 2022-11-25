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
		$array =  Persona::all();
		$respuesta["data"] = $array;
		return Response::json($respuesta);
	});
	Route::post("/enviarnumero", function (Request $request) {
		$persona = $request->input("persona");
		Persona::create($persona);
		return Response::json($persona);
	});
	Route::post("/limpiar", function (Request $request) {
		persona::truncate();
		return Response::json(["status" => true,"data"=>"jajajajaaj"]);
	});
