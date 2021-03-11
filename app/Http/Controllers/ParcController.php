<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parc;
use App\Modele;
use App\Site;
use App\Utilisateur;
use Codedge\Fpdf\Fpdf\Fpdf;

class ParcController extends Controller
{
    public function index($id = 0){
        if($id == 0){
            return view('index', [
                'parc' => Parc::all(),
                'modeles' => Modele::select()->where('actif',1)->get(),
                'modelesinactifs' => Modele::select()->where('actif',0)->get(),
                'sites' => Site::all(),
            ]);
        }else{
            return view('index', [
                'parc' => Parc::all(),
                'modeles' => Modele::select()->where('actif',1)->get(),
                'modelesinactifs' => Modele::select()->where('actif',0)->get(),
                'sites' => Site::all(),
                'modif' => Parc::select()->where('id',$id)->get(),
            ]);
        }
       
    }
    private $fpdf;
   
    public function enregistrer(Request $request){
        $parc = Parc::select()->where('numSerie', $request->numSerie)->get();
        if(isset($parc[0]['numSerie']) && $parc[0]['numSerie'] ==$request->numSerie){
            $utilisateur = Utilisateur::select()->where('login', strtolower($request->login))->get();
            if(!isset($utilisateur[0]['id'])){
                $utilisateur = new Utilisateur;
                $utilisateur->nom = strtolower($request->nom);
                $utilisateur->prenom = strtolower($request->prenom);
                $utilisateur->login = strtolower($request->login);
                $utilisateur->save();
                $utilisateur = Utilisateur::select()->where('login', strtolower($request->login))->get();
            }
            Parc::where('numSerie', $request->numSerie)->update(['dateAttrib'=>date("Y-m-d"),'idSite'=>$request->site,'idUtilisateur'=>$utilisateur[0]['id']]);

            if($request->fiche == True){
                $this->makePDF($request->nom, $request->prenom,$request->login,$request->mail,Modele::select('libModele')->where('id',$request->modele)->get());
            }else{
                return redirect()->route("parc"); 
            }
      
        }else{
            $utilisateur = Utilisateur::select()->where('login', strtolower($request->login))->get();
            if(!isset($utilisateur[0]['id'])){
                $utilisateur = new Utilisateur;
                $utilisateur->nom = strtolower($request->nom);
                $utilisateur->prenom = strtolower($request->prenom);
                $utilisateur->login = strtolower($request->login);
                $utilisateur->save();
                $utilisateur = Utilisateur::select()->where('login', strtolower($request->login))->get();
            }
            $enregistrement = new Parc;
            $enregistrement->dateAttrib = date("Y-m-d");
            $enregistrement->dateFinGarantie = $request->dateFinGarantie;
            $enregistrement->idSite = $request->site;
            $enregistrement->idModele = $request->modele;
            $enregistrement->idUtilisateur = $utilisateur[0]['id'];
            $enregistrement->numSerie = $request->numSerie;
            $enregistrement->save();
            if($request->fiche == True){
                $this->makePDF($request->nom, $request->prenom,$request->login,$request->mail,Modele::select()->where('id',$request->modele)->get());
            }else{
                return redirect()->route("parc"); 
            }
        }
    }
    public function fiche(Request $request){
        $this->makePDF($request->nom, $request->prenom,$request->login,$request->mail,Modele::select()->where('id',$request->modele)->get());
    }
    
    public function nouveaumodele(Request $request){
        $modele = Modele::select()->where('libModele',$request->nouveaumodele)->get();
        if(!isset($modele[0]['libModele'])){
            $modele = new Modele;
            $modele->libModele = $request->nouveaumodele;
            $modele->actif = 1;
            $modele->save();
        }
        return redirect()->route('parc');
    }

    public function desactivermodele(Request $request){
        Modele::select()->where('id',$request->modele)->update(['actif'=>0]);
        return redirect()->route('parc');
    }
    public function activermodele(Request $request){
        Modele::select()->where('id',$request->modele)->update(['actif'=>1]);
        return redirect()->route('parc');
    }
    public function supprimer(Request $request){
        $pc = Parc::select()->where('numSerie', $request->numSerie)->get();
        if($pc[0]['numSerie'] == $request->numSerie){
            Parc::where('numSerie', $request->numSerie)->delete();
        }
        return redirect()->route('parc');

    }
    public function makePDF($nom, $prenom, $nomutil,$mail,$modelepc){
        for($i = 0; $i<strlen($nom);$i++){
            $nom=str_replace(" ","",$nom);
        }
        
        for($i = 0; $i<strlen($nomutil)+1;$i++){
            $nomutil=str_replace("é","e",$nomutil);
            $nomutil=str_replace("à","a",$nomutil);
            $nomutil=str_replace("ë","e",$nomutil);
            $nomutil=str_replace("É","e",$nomutil);
        }
        $nomutil=strtolower($nomutil);
        $this->fpdf = new Fpdf;
        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/banner.PNG', -1,-1);
        $this->fpdf->SetFont('Arial', '', 17);
        $this->fpdf->Text(10, 70, utf8_decode("Bonjour $prenom $nom,"));
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->Image('./img/deuxpostes.PNG', 185,60);
        $this->fpdf->SetFont('Arial', 'B', 16);
        $this->fpdf->SetTextColor(0,66,255);
        $this->fpdf->Text(10, 85, utf8_decode("Bienvenue sur le réseau d'entreprise FM Logistic."));
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Arial', '', 15);
        $this->fpdf->Text(10, 95, utf8_decode("Voici la liste des équipements informatiques mis à votre disposition :"));
        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Text(10, 105, utf8_decode("- Un PC portable ".$modelepc[0]['libModele']));
        $this->fpdf->Text(10, 110, utf8_decode("- Une sacoche de transport ou sac à dos"));
        $this->fpdf->Text(10, 115, utf8_decode("- Une souris"));
        $this->fpdf->Text(10, 120, utf8_decode("- En option : clavier / écran(s) / divers"));
        $this->fpdf->SetFont('Arial', '', 15);
        $this->fpdf->Text(10, 130, utf8_decode("Votre ordinateur est d'ores et déjà configuré et prêt à l'emploi."));
        $this->fpdf->Text(10, 140, utf8_decode("Veuillez trouver ci-dessous les informations de connexion propre à votre compte :"));
        $this->fpdf->SetTextColor(0,66,255);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Text(10, 150, utf8_decode("Session Windows"));
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Text(10, 160, utf8_decode("nom d'utilisateur: $nomutil"));
        $this->fpdf->Text(10, 165, utf8_decode("Mot de passe : FMLogistic1$ (à modifier à votre première connexion*)"));
        $this->fpdf->SetFont('Arial', '', 15);
        $this->fpdf->SetTextColor(0,66,255);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Text(10, 175, utf8_decode("Adresse de messagerie Google"));
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Text(10, 185, utf8_decode("Nom d'utilisateur : $mail"));
        $this->fpdf->Text(10, 190, utf8_decode("Mot de passe : Fourni par le service RH."));
        $this->fpdf->SetFont('Arial', '', 15);
        $this->fpdf->SetTextColor(0,66,255);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Text(10, 200, utf8_decode("Compte VPN ( Accès au réseau interne à distance en option )"));
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Arial', '', 14);
        $this->fpdf->Text(10, 210, utf8_decode("Nom d'utilisateur : $nomutil"));
        $this->fpdf->Text(10, 215, utf8_decode("Mot de passe : Le mot de passe Windows."));
        $this->fpdf->SetFont('Arial', '', 15);
        $this->fpdf->SetTextColor(0,66,255);
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Text(10, 225, utf8_decode("Compte Intranet"));
        $this->fpdf->SetTextColor(0,0,0);
        $this->fpdf->SetFont('Arial', '', 14);
        for($i = 0; $i<strlen($prenom);$i++){
            $prenom=str_replace("é","e",strtolower($prenom));
            $prenom=str_replace("à","a",strtolower($prenom));
            $prenom=str_replace("ë","e",$prenom);
            $prenom=str_replace("-"," ",$prenom);
        }
        for($i = 0; $i<strlen($nom);$i++){
            $nom=str_replace("é","e",strtolower($nom));
            $nom=str_replace("à","a",strtolower($nom));
            $nom=str_replace("ë","e",$nom);
        }
        $this->fpdf->Text(10, 235, utf8_decode("Nom d'utilisateur : $prenom $nom"));
        $this->fpdf->Text(10, 245, utf8_decode("Mot de passe :  FMLogistic1$ (à modifier à votre première connexion*)"));
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Text(10, 265, utf8_decode(" Pour toutes demandes de support informatiques, nous sommes à votre disposition au :	"));
        $this->fpdf->Text(10, 270, utf8_decode(" 03 87 23 12 12, le 1199 en interne ou via Request Tracker."));
        $this->fpdf->Image('./img/footer.PNG', -1,280);

       /*
        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/100.jpg', 1,1, 100, 20);
        $this->fpdf->SetFont('Arial', 'B', 17);
        $this->fpdf->Text(65, 30, utf8_decode("Liste des applications utiles"));
        $this->fpdf->SetFont('Arial', '', 12);
        $this->fpdf->Text(55, 40, utf8_decode("Ces applications sont disponible via notre intranet"));
        $this->fpdf->Image('./img/hello.PNG', 75,40, 60, 30);
        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->SetTextColor(255,0,0);
        $this->fpdf->Text(55, 75, utf8_decode("UNIQUEMENT SUR LE RÉSEAU FM LOGISTIC"));
        $this->fpdf->Image('./img/tableau.png', 10,80, 190,200);*/
        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/apputiles.png', -10, 1, 230, 300);
        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/zscaler.png', -10, 1, 230, 300);

        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/meet.png', -20, 1, 250, 300);
       
        $this->fpdf->AddPage();
        $this->fpdf->Image('./img/FP.png', -10, 1, 240, 300);
        return $this->fpdf->Output();
    }
}
