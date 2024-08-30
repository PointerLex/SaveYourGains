<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('client.profile.show', compact('user'));
    }
    public function updateProfilePicture(Request $request)
    {

        $request->validate([
            'profile_picture' => 'required|image|mimes:jpg,jpeg,png|max:2048|dimensions:min_width=100,min_height=100,max_width=3000,max_height=3000',
        ]);


        $user = Auth::user();

        try {
            if (!getimagesize($request->file('profile_picture')->getRealPath())) {
                return redirect()->back()->withErrors(['profile_picture' => 'La imagen está dañada o no es válida.']);
            }

            // Si el usuario ya tiene una imagen de perfil, opcionalmente puedes eliminarla de Cloudinary
            if ($user->profile_picture) {
                $publicId = basename($user->profile_picture, '.' . pathinfo($user->profile_picture, PATHINFO_EXTENSION));
                Cloudinary::destroy($publicId);
            }

            // Subir la imagen a Cloudinary
            $uploadedFileUrl = Cloudinary::upload($request->file('profile_picture')->getRealPath(), [
                'folder' => 'profiles',
                'transformation' => [
                    'width' => 500,
                    'height' => 500,
                    'crop' => 'fit',
                    'quality' => 'auto',
                    'fetch_format' => 'auto',
                ]
            ])->getSecurePath();

            if ($uploadedFileUrl) {
                $user->profile_picture = $uploadedFileUrl;
                $user->save();
                return redirect()->route('profile.show')->with('success', 'Foto de perfil actualizada correctamente.');
            } else {
                return redirect()->route('profile.show')->with('error', 'Error al cargar la imagen. Inténtalo de nuevo.');
            }


            return redirect()->route('profile.show')->with('success', 'Foto de perfil actualizada correctamente.');

        } catch (\Exception $e) {
           return redirect()->route('profile.show')->with('error', 'Ocurrió un error al subir la imagen: ' . $e->getMessage());
        }


    }
}
