<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

// Grupo de rutas protegidas por el middleware de autenticación Sanctum
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/usuario', function (Request $request) {
        return $request->user();
    });

    Route::post('/test-csrf', fn() => [1, 2, 3]);

    Route::post('/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->noContent();
    });
});

// Ruta para devolver el estado
Route::get('status/{status}', fn($status) => response('', $status));

// Ruta para el login
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
        'device_name' => ['required']
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages(['email' => ['Las credenciales son incorrectas :(']]);
    }

    return response()->json([
        'token' => $user->createToken($request->device_name)->plainTextToken
    ]);
});

// Ruta para el registro de nuevos usuarios
Route::post('/register', function (Request $request) {
    // Validación de los campos del formulario de registro
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Password::defaults()],
        'telefono' => ['required', 'string', 'max:15'],
        'foto_de_perfil' => ['nullable', 'string', 'max:255'],
        'device_name' => ['required']
    ]);

    // Creación del nuevo usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'telefono' => $request->telefono,
        'foto_de_perfil' => $request->foto_de_perfil,
    ]);

    // Disparo del evento Registered para enviar el email de verificación
    event(new Registered($user));

    // Respuesta con el token de acceso generado
    return response()->json([
        'token' => $user->createToken($request->device_name)->plainTextToken
    ]);
});

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store']);