<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ReunionController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\PagoController;

Route::view('/', 'welcome')->name('wilkomen');
Route::view('login', 'login')->name('login');
Route::view('list', 'list')->middleware('auth');

Route::post('login',function(){
    $credentials=request()->only('email','password');
   
   if (Auth::attempt($credentials)) {
    request()->session()->regenerate();
    return redirect('/');
   }
   return redirect('login');
});
Route::post('logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('login');
})->name('logout');

Route::middleware('auth')->group(function () {

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('reunions', ReunionController::class);
    Route::resource('mensajes', MensajeController::class);
    Route::resource('servicios', ServicioController::class);
    Route::resource('pagos', PagoController::class);

    Route::get('deudores/index', function(){

        $deudores=DB::select('select usuario.id, usuario.nombre, sum(monto) as total_monto from usuario join pago on usuario.id=pago.id_usuario where usuario.tipo <>\'administrador\' and pago.estado =\'no realizado\' group by usuario.id, usuario.nombre order by total_monto desc ');
        return view('deudores.index',['deudores' => $deudores]);
    })->name('deudores.index');

});
