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
		$array = Persona::all();
		$respuesta["data"] = $array;
		return Response::json($respuesta);
	});
	Route::post("/enviarnumero", function (Request $request) {
//		["nombre" => $nombre, "numero" => $numero] ;
		$persona = $request->input("persona");
		if ($persona["numero"] >= 31) {
			$respuesta = ["status" => false, "mensaje" => "El numero debe ser menor a 22"];
			return Response::json($respuesta);
		}
		Persona::create($persona);
		return Response::json($persona);
	});
	Route::post("/limpiar", function (Request $request) {
		persona::truncate();
		return Response::json(["status" => true, "data" => "jajajajaaj"]);
	});
	Route::get('/contactos', function (Request $request) {
		$respuesta["data"] =[
			["nombre" => "Juan", "numero" => "871-176-50-65","url"=>"https://www.google.com"],
			["nombre" => "Pedro", "numero" => "871-176-50-64","url"=>"https://www.youtube.com"],
			["nombre" => "Maria", "numero" => "871-176-50-62","url"=>"https://www.amazon.com"],
			["nombre" => "Ramiro", "numero" => "871-176-50-62","url"=>"https://bitcoin.org/es/"],
			["nombre" => "Carlos", "numero" => "871-176-50-62","url"=>"https://bitso.com/"],
		
		];
		return Response::json($respuesta);
	});
