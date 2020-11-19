<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Image;
use App\Professor;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Validator;

class PerfilProfessorController extends Controller
{
    public function showTrocaDeFoto(Professor $professor)
    {
        return view('professor.trocaFotoProfessor', array('professor' => Auth::guard('professor')->user()));
    }

    public function updateFoto(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
          ]);
        if ($validator->passes()) {
            
        $professor = Professor::find(Auth::guard('professor')->user()->id);

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
        
            // Delete current image before uploading new image
            if ($professor->avatar != 'default.jpg') {
                // $file = public_path('uploads/avatars/' . $professor->avatar);
                $file = 'uploads/avatars/' . $professor->avatar;
                //$destinationPath = 'uploads/' . $id . '/';
        
                if (File::exists($file)) {
                    unlink($file);
                }
        
            }
            // Image::make($avatar)>resize(300, 300)>save(public_path('uploads/avatars/' . $filename));
            Image::make($avatar)->resize(300, 300)->save('uploads/avatars/' . $filename);
        
            $professor = Auth::guard('professor')->user();
            $professor->avatar = $filename;
            $professor->save();
        
        }

        //return view('professor.trocaFotoProfessor', array('professor' => Auth::guard('professor')->user()));
        return redirect()->back()->with("success","Imagem trocada com sucesso!");
        }

        return redirect()->back()->with("error","Somente arquivos jpg, jpeg, png ou gif.");
    }

    public function showTrocaDeSenha(Professor $professor)
    {
        return view('professor.trocaSenhaProfessor', array('professor' => Auth::guard('professor')->user()));
    }

    public function updateSenha(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::guard('professor')->user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Sua senha atual não confere com a senha que você nos enviou. Por favor tente novamente.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","A nova senha não pode ser a mesma que a anterior. Por favor escolha uma senha diferente.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $professor = Auth::guard('professor')->user();
        $professor->password = bcrypt($request->get('new-password'));
        $professor->save();

        return redirect()->back()->with("success","A senha foi trocada com sucesso!");
    }

}  