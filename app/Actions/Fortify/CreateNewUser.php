<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Usuario;
use DragonCode\Contracts\Cashier\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Crea el usuario principal
        $usuario = Usuario::create([
            'nombre' => $input['nombre'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
        ]);

        // Crea el perfil asociado al usuario
        $user = User::create([ // Guarda en una variable el User creado
            'usuario_id' => $usuario->id, // Asegúrate de asignar el id del usuario
            'codigo' => $this->generateUniqueCodigo(),
            'password' => Hash::make($input['password']),
        ]);
          // Guarda el código en la sesión
         session(['codigo_usuario' => $user->codigo]);
        // Devuelve el objeto User para la autenticación
        return $user; // Devuelve el objeto User
    }
    protected function generateUniqueCodigo()
    {
        do {
            $codigo = Str::random(10);
        } while (User::where('codigo', $codigo)->exists());
        return $codigo;
    }


}
