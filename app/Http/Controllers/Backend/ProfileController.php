<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use File;

class ProfileController extends Controller
{
    //Visualizar Perfil Admin
    public function index()
    {
        return view('admin/profile/index');
    }
    //Atulaizar Perfil Admin
    public function update(Request $request)
    {
        //add($request->all());
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048'],
        ]);

        $user = Auth::user();
        if($request->hasFile('image')){

            //Verifica Se a Imagem Existe e Apaga
            if(File::exists(public_path($user->image))){
               File::delete(public_path($user->image));
            }

            $image = $request->image;
            $imageName = rand() . '-loja-virtual-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            //Caminho da Pasta de Imagens
            $path = "/uploads/" . $imageName;

            $user->image = $path;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }
}
