<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\SumaController;
use App\Http\Controllers\PokeController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;



// EJEMPLOS INICIALES SENCILLOS

// Si Requiere un controlador
/*Route::get('/home', function () {
    return view('home');
});*/

// No requiere un controlador
//Route::view('/home','home')->name('home');

// Si Requiere un controlador
/*Route::get('/welcome', function () {
    return view('welcome')->name("welcome");
});*/

// No requiere un controlador
//Route::view('/welcome','welcome')->name('welcome');


// Rutas en NAVBAR
Route::get('/',[MainController::class,'index'])->name('main');

Route::view('/welcome','welcome')->name('welcome');
Route::view('/home','home')->name('home');
Route::view("sobre_nosotros", "about")->name("about");
Route::view("noticias", "noticias")->name("noticias");
//Route::view("alumnos", "alumnos")->name("alumnos");
Route::view("alumno", "alumno")->name("alumno");
//Route::view("profesores", "profesores")->name("profesores");
Route::view("profesor", "profesor")->name("profesor");
Route::view("contacto", "contacto")->name("contacto");
Route::view("panel_usuario", "dashboard")->name("dashboard");
Route::view("sumar", "sumar")->name("sumar");
Route::view("restar", "restar")->name("restar");
Route::view("multiplicar", "multiplicar")->name("multiplicar");
Route::view("dividir", "dividir")->name("dividir");
Route::view("potenciar", "potenciar")->name("potenciar");
Route::view("raizcuadrada", "raizcuadrada")->name("raizcuadrada");

//Rutas opcionales, solo usar sin Controller para Products y Projects
/*Route::view("products",'products')->name('products');
Route::view("projects", "projects")->name("projects");*/


//CONTACTO
Route::get('contacto', function () {
    return view('contacto');
})->name('contacto');
Route::post('contacto', function (Request $request) {
    //Validar
$data = $request->validate([
    'name' => 'required',
    'email' => 'required|email',
    'subject' => 'required',
]);
//Aquí iria la lógica para enviar el correo (Mail::to('admin@ejemplo.com')->send(new ContactMailable($data)))
    return back()->with('success', '¡Mensaje enviado con éxito!');
})->name('contacto.enviar');

/*Route::get('/sumar', function () {
    return view('sumar');
});*/

//SUMA RESTA MULTIPLICA DIVIDE POTENCIA:
// SUMAR ruta + vista con Controller:
Route::get('/sumar', [SumaController::class, 'index'])->name('sumar');
Route::post('/sumar', [SumaController::class, 'sumar'])->name('sumar');


// SUMAR - ruta + vista sin Controller:
/*Route::post('/sumar', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $resultado = $num1 + $num2;
    echo ("Resultado de la suma:  $resultado");
    return view('sumar', ['resultado' => $resultado]);
});*/
// RESTAR - ruta + vista sin Controller:
// La lógica en la ruta. No es buena práctica.
Route::post('/restar', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $resultado = $num1 - $num2;
    //echo("Resultado de la resta: $resultado");
    return view('restar', ['resultado' => $resultado]);
});
// MULTIPLICAR - ruta + vista sin Controller:
Route::post('/multiplicar', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $resultado = $num1 * $num2;
    //echo ("Resultado de la multiplicación: $resultado");
    return view('multiplicar', ['resultado' => $resultado]);
});
// DIVIDIR - ruta + vista sin Controller:
Route::post('/dividir', function (Request $request) {
    $num1 = $request->input('num1');
    $num2 = $request->input('num2');
    $resultado = $num1 / $num2;
    //echo ("Resultado de la división: $resultado");
    return view('dividir', ['resultado' => $resultado]);
});
// POTENCIA - ruta + vista sin Controller:
Route::post('/potenciar', function (Request $request) {
    $base = $request->input('num1');
    $exponente = $request->input('num2');
    $resultado = $base ** $exponente; // 2 * 2 * 2
    echo ("Resultado de la potencia: $resultado");
    return view('potenciar', ['resultado' => $resultado]);

    // Métod 2: sintaxis con función pow()
    /*$resultado = pow(5, 2); // 5 elevado a la 2
    echo $resultado; // Resultado: 25*/
});
// RAIZ CUADRADA - ruta + vista sin Controller
Route::post('/raizcuadrada', function (Request $request) {
// Métod 1: Utilizando el operador de potencia **
$numero = $request->input('num1');
$raiz2 = $numero ** 0.5;
$rtdo = number_format($raiz2, 2, ',', '');
//echo ("La raíz cuadrada de $numero es: $rtdo");
return view('raizcuadrada', ['rtdo' => $rtdo]);

// Métod 2: Utilizando la función sqrt()
/*$numero = 81;
$raiz = sqrt($numero);
echo "La raíz cuadrada de $numero es: $raiz";*/ // Resultado: 9/ Resultado: 5
});

// RUTAS PARA EL CRUD:
// PRODUCTOS ruta con Controller
Route::get('/products', [ProductController::class, 'index'])->name('products');
// PROYECTOS ruta con Controller
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::resource('teachers', TeacherController::class);
//Route::get('/teachers', TeacherController::class);
Route::resource('students', StudentController::class);
//Route::get('/students', StudentController::class);


// RUTAS PARAMETRIZADAS pruebas - Probando rutas con métod GET:
//Ruta parametrizada --> alumno {$variable?} opcional
/*Route::get("/alumno/{nombre}/{numero?}/{seccion?}",
    fn($nombre = "Pepe",
       $numero = 10,
       $seccion="matematicas" )
    => view("alumno", ["nombre"=> $nombre, "numero" => $numero, "seccion" => $seccion]));*/
Route::get("/alumno/{nombre}/{numero?}/{seccion?}",
    fn($nombre,
       $numero = 10,
       $seccion="matematicas" )
    => view("alumno", compact("nombre", "numero", "seccion")));

//Ruta parametrizada --> profesor {$variable?} opcional
/*Route::get("/profesor/{nombre}/{numero?}/{seccion?}",
    fn($nombre = "Pepe",
       $numero = 10,
       $seccion="matematicas" )
    => view("alumno", ["nombre"=> $nombre, "numero" => $numero, "seccion" => $seccion]));*/
Route::get("/profesor/{nombre}/{numero?}/{seccion?}",
    fn($nombre,
       $numero = 10,
       $seccion="matematicas" )
    => view("alumno", compact("nombre", "numero", "seccion")));


// DASHBOARD
// VISTAS en --> resources/views/profile/
// RUTAS DE AUTENTICACION BREEZE - Relacinado con ProfileController
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// MIDDLEWARE -> EDIT UPDATE DESTROY
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
Route::fallback(function () {
    $url = request()->path();
    return ("<h1>Esta página $url no existe</h1>");
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas Auth personalizadas
//Route::resource("projects", ProjectController::class)->middleware('auth');
//Route::resource("teachers", TeacherController::class)->middleware('auth');
//Route::resource("students", StudentController::class)->middleware('auth');


// LANG: TRADUCCIONES
//Route::post("set_lang", [LangController::class, "__invoke"]);
Route::post("set_lang",LangController::class)->name("set_lang");


// POKEMON API externa
// ruta métod index()
Route::get('/pokemon', [PokeController::class, 'index'])->name('pokemon.index');
// ruta metod show()
Route::get('/pokemon/{name}', [PokeController::class, 'show'])->name('pokemon.show');
