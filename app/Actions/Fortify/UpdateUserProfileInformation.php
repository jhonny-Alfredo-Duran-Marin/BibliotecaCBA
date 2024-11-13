<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */

    public function update(User $user, array $input): void
    {

        //dd($input);
        // Validación de datos en ambas tablas `users` y `usuarios`
        Validator::make($input, [
            'nombre' => ['required', 'string', 'max:255'],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', Rule::unique('usuarios')->ignore($user->usuario->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        // Actualizar la foto de perfil si está presente
        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        // Actualizar los campos en la tabla `usuarios`
        $user->usuario->update([
            'nombre' => $input['nombre'],
            'telefono' => $input['telefono'],
            'email' => $input['email'],
        ]);

        // Si el email ha cambiado y el usuario requiere verificación, actualizarlo adecuadamente
        if ($input['email'] !== $user->usuario->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            // Actualizar los campos en la tabla `users`
            $user->usuario->forceFill([
                'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->usuario->forceFill([
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        // Actualiza el email en la tabla `usuarios`
        $user->usuario->update(['email' => $input['email']]);

        $user->usuario->sendEmailVerificationNotification();
    }
}
