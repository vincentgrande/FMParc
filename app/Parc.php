<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parc extends Model
{
   
    public function modele() {
        return $this->hasOne('App\Modele', 'id', 'idModele');
    }
    public function utilisateur() {
        return $this->hasOne('App\Utilisateur', 'id', 'idUtilisateur');
    }
    public function site() {
        return $this->hasOne('App\Site', 'id', 'idSite');
    }
}
