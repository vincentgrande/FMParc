<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parc;
use App\Modele;
use App\Site;
use App\Utilisateur;

class UserController extends Controller
{
    public function index($userid = 0){
        if($userid == 0){
            return view('gestion', [
                'utilisateurs' => Utilisateur::all(),
            ]);
        }else{
           return view('gestion', [
                'utilisateurs' => Utilisateur::all(),
                'modifs' => Utilisateur::select()->where('id',$userid)->get(),
            ]); 
        }
        print_r(Utilisateur::select()->where('id',$userid)->get());
    }
    public function modif(Request $request){
        $utilisateur = Utilisateur::select()->where('id',$request->id)->get();
        if($utilisateur[0]['id'] == $request->id){
            Utilisateur::where('id', $request->id)->update(['nom'=>strtolower($request->nom), 'prenom'=>strtolower($request->prenom),'login'=>strtolower($request->login)]);
        }
        return redirect()->route('gestion');
    }
    public function creation(Request $request){
        $utilisateur = new Utilisateur;
        $utilisateur->nom = strtolower($request->nom);
        $utilisateur->prenom = strtolower($request->prenom);
        $utilisateur->login = strtolower($request->login);
        $utilisateur->save();
        return redirect()->route('gestion');
    }
    public function supprimer(Request $request){
        $utilisateur = Utilisateur::select()->where('id', $request->id)->get();
        if($utilisateur[0]['id'] == $request->id){
            Utilisateur::where('id', $request->id)->delete();
        }
        return redirect()->route('gestion');
    }
}
