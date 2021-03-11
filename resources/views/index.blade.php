<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Gestion du parc</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script>
        function choice(id, titre) {
            document.getElementById('enregistrement').style.display = "none";
            document.getElementById('nouvelutilisateur').style.display = "none";
            document.getElementById('modelepc').style.display = "none";
            document.getElementById(id).style.display = "block";
            document.getElementById('titreaction').innerHTML = titre;
        }
        function enregistrement() {
        var checkBox = document.getElementById("myCheck");
        if (checkBox.checked == true){
            $('.fiche').show();
        } else {
            $('.fiche').css('display','none');
        }
        }
        function setLogin(){
            var firstname = $( "#prenom" ).val();
            var lastname = $( "#nom" ).val();
            if(firstname!="" && lastname!=""){
                var login = firstname[0] + lastname;
                $( "#login" ).val(login);
            }
        }
    </script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-light bg-white mb-4 justify-content-between shadow">
                <a href="/"><img class="navbar-brand" src="img/100.jpg" style="width:25%" alt="logo"> </a>
                <h1 class="h3 mb-0 text-danger">FM Parc <i class="fas fa-laptop"></i></h1>
                </nav>
               
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestion du parc informatique</h1>
                        <a href="{{route('gestion')}}" class="btn btn-danger btn-icon-split">Gestion utilisateur</a>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="dropdown">
                                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choix de l'action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" onclick="choice('enregistrement', 'Enregistrer un PC')">Enregistrer un PC</a>
                                            <a class="dropdown-item" onclick="choice('nouvelutilisateur', 'Générer une fiche')">Générer une fiche</a>
                                            <a class="dropdown-item" onclick="choice('modelepc', 'Gérer les modèles')">Gérer les modèles</a>
                                            <a class="dropdown-item" onclick="choice('supprimer', 'Supprimer un PC')">Supprimer un PC</a>
                                        </div>
                                    </div>
                                    <div> <h6 id="titreaction" class="m-1 font-weight-bold text-primary text-right">Enregistrer un PC</h6></div>
                                    <div id="enregistrement">
                                        <table class="table text-dark">
                                        <form action="{{ route('enregistrer') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td class="text-dark">Nom :</td>
                                            <td>
                                               <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<input type='text' id='nom' name='nom' class='form-control' placeholder='Nom' value='".$nom->utilisateur->nom."' onchange='setLogin();'>";
                                                }
                                               }else{
                                                echo "<input type='text' id='nom' name='nom' class='form-control' placeholder='Nom' onchange='setLogin();'>";
                                            
                                               }
                                               ?>
                                            </td>
                                        </tr>
                                            <tr >
                                                <td class="text-dark">Prénom :</td>
                                                <td>
                                                <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<input type='text' id='prenom' name='prenom' class='form-control' placeholder='Prénom' value='".$nom->utilisateur->prenom."' onchange='setLogin();'>";
                                                }
                                               }else{
                                                echo "<input type='text' id='prenom' name='prenom' class='form-control' placeholder='Prénom' onchange='setLogin();'>";

                                               }
                                               ?>
                                                
                                                </td>
                                                </tr>
                                            <tr>
                                                <td class="text-dark">Nom d'utilisateur : </td>
                                                <td>
                                                <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo " <input type='text' id='login' name='login' class='form-control' placeholder='Login' value='".$nom->utilisateur->login."'>";
                                                }
                                               }else{
                                                echo " <input type='text' id='login' name='login' class='form-control' placeholder='Login'>"; 
                                               }
                                               ?>
                                               
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Numéro de série :</td>
                                                <td>
                                                <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<input type='text' name='numSerie' class='form-control' placeholder='Numéro de série' value='".$nom->numSerie."'>";
                                                }
                                               }else{
                                                echo "<input type='text' name='numSerie' class='form-control' placeholder='Numéro de série'>";
  
                                            }
                                               ?>
                
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Modèle PC : </td>
                                                <td>
                                                    <select  class="form-control" name="modele">
                                                    <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<option value='".$nom->modele->id."'>".$nom->modele->libModele."</option>";
                                                    
                                                }
                                               }else{
                                                echo "<option>Choisir le modèle</option>";
                                               foreach($modeles as $modele){
                                                echo " <option value='$modele->id'>$modele->libModele</option>";
                                            }
  
                                            }
                                               ?>
                                                    
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Site : </td>
                                                <td>
                                                    <select  class="form-control" name="site">
                                                    <?php
                                               if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<option value='".$nom->site->id."'>".$nom->site->libSite."</option>";
                                                    foreach($sites as $site){
                                                        if($site->id!=$nom->site->id){
                                                            echo "<option value='$site->id'>$site->libSite</option>";
                                                        }
                                                    }
                                                }
                                               }else{
                                               foreach($sites as $site){
                                                echo "<option value='$site->id'>$site->libSite</option>";
                                            }
  
                                            }
                                               ?>
                                                       
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Date de fin de garantie : </td>
                                                <td>
                                               <?php
                                                if(isset($modif)){
                                                foreach($modif as $nom){
                                                    echo "<input class='form-control' type='date' name='dateFinGarantie' value='".$nom->dateAttrib."'>";
                                                }
                                               }else{
                                                echo "<input class='form-control' type='date' name='dateFinGarantie'>";
  
                                            }?>
                                                

                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark">Générer une fiche : </td>
                                                <td>
                                                <input type="checkbox" id="myCheck" class="form-check-input" name="fiche" onclick="enregistrement()">
                                                </td>
                                            </tr>
                                            
                                                <tr class="fiche" style="display: none;">
                                                    <td class="text-dark">Mail :</td>
                                                    <td>
                                                    <input type="email" name="mail" class="form-control" placeholder="Mail">
                                                    </td>
                                                </tr>
                                            
                                            <tr>
                                                <td class="text-dark"></td>
                                                <td>
                                                <input type="submit" class="btn btn-info btn-icon-split" value="Enregistrer">
                                                    
                                                </td>
                                            </tr>
                                        </form>
                                        </table>
                                    </div>
                                    <div id="nouvelutilisateur" style="display:none;">
                                        <table class="table text-dark">
                                        <form action="{{ route('fiche') }}" method="POST">
                                        @csrf
                                        <tr>
                                            <td class="text-dark">Nom :</td>
                                            <td>
                                                <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" onchange="setLogin();">
                                            </td>
                                        </tr>
                                            <tr >
                                                <td class="text-dark">Prénom :</td>
                                                <td>
                                                <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" onchange="setLogin();">
                                                </td>
                                                </tr>
                                            <tr>
                                                <td class="text-dark">Nom d'utilisateur : </td>
                                                <td>
                                                <input type="text" id="login" name="login" class="form-control" placeholder="Login">
                                                </td>
                                            </tr>
                                            <tr>
                                                    <td class="text-dark">Mail :</td>
                                                    <td>
                                                    <input type="email" name="mail" class="form-control" placeholder="Mail">
                                                    </td>
                                                </tr>
                                            <tr>
                                                <td class="text-dark">Modèle PC : </td>
                                                <td>
                                                    <select  class="form-control" name="modele">
                                                        <option>Choisir le modèle</option>
                                                    @foreach($modeles as $modele)
                                                        <option value="{{ $modele->id}}">{{ $modele->libModele}}</option>
                                                    @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-dark"></td>
                                                <td>
                                                <input type="submit" class="btn btn-info btn-icon-split" value="Générer">
                                                    
                                                </td>
                                            </tr>
                                        </form>
                                        </table>
                                    </div>
                                    <div id="modelepc" style="display:none;">
                                        <table class="table text-dark">
                                            <form action="{{ route('nouveaumodele') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">Ajouter:</td>
                                                    <td>
                                                        <input type="text" name="nouveaumodele" class="form-control" placeholder="Nom du modèle">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-info btn-icon-split" value="Ajouter"> 
                                                    </td>
                                                </tr>
                                            </form>
                                            <form action="{{ route('desactivermodele') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">Désactiver: </td>
                                                    <td>
                                                        <select  class="form-control" name="modele">
                                                            <option>Choisir le modèle</option>
                                                        @foreach($modeles as $modele)
                                                            <option value="{{ $modele->id}}">{{ $modele->libModele}}</option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-info btn-icon-split" value="Désactiver"> 
                                                    </td>
                                                </tr>
                                            </form>
                                            <form action="{{ route('activermodele') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">Activer: </td>
                                                    <td>
                                                        <select  class="form-control" name="modele">
                                                            <option>Choisir le modèle</option>
                                                        @foreach($modelesinactifs as $modele)
                                                            <option value="{{ $modele->id}}">{{ $modele->libModele}}</option>
                                                        @endforeach
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-info btn-icon-split" value="Activer"> 
                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>   
                                    <div id="supprimer" style="display:none;">    
                                    <table class="table text-dark"> 
                                        <form action="{{ route('supprimer') }}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">Supprimer:</td>
                                                    <td>
                                                        <input type="text" name="numSerie" class="form-control" placeholder="Numéro de série">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-danger btn-icon-split" value="Supprimer"> 
                                                    </td>
                                                </tr>
                                        </form>
                                    </table>
                                    </div>                          
                                </div>
                            </div>
                        </div>

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">

                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Parc informatique</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="bg-light">Utilisateur</th>
                                                    <th class="bg-light">Modèle</th>
                                                    <th class="bg-light">Numéro de série</th>
                                                    <th class="bg-light">Site</th>
                                                    <th class="bg-light">Attribution</th>
                                                    <th class="bg-light">Fin de garantie</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($parc as $enregistrement)
                                                <tr>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{  strtoupper($enregistrement->utilisateur->login)}}</a></td>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{ $enregistrement->modele->libModele}}</a></td>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{ $enregistrement->numSerie }}</a></td>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{ $enregistrement->site->libSite}}</a></td>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{ $enregistrement->dateAttrib}}</a></td>
                                                    <td><a class="text-secondary" href="{{route('modif',$enregistrement->id)}}">{{ $enregistrement->dateFinGarantie}}</a></td>
                                                </tr>
                                            @endforeach    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; FM> Parc 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>