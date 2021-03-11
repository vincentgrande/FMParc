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
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script>
        function choice(id, titre) {
            document.getElementById('modif').style.display = "none";
            document.getElementById('nouvelutilisateur').style.display = "none";
            document.getElementById('supprimer').style.display = "none";
            document.getElementById(id).style.display = "block";
            document.getElementById('titreaction').innerHTML = titre;
        }

        function setLogin() {
            var firstname = $("#prenom").val();
            var lastname = $("#nom").val();
            if (firstname != "" && lastname != "") {
                var login = firstname[0] + lastname;
                $("#login").val(login);
            }
            var firstname2 = $("#prenom2").val();
            var lastname2 = $("#nom2").val();
            if (firstname2 != "" && lastname2 != "") {
                var login2 = firstname2[0] + lastname2;
                $("#login2").val(login2);
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
                    <a href="/"><img class="navbar-brand" src="/img/100.jpg" style="width:25%" alt="logo"> </a>
                    <h1 class="h3 mb-0 text-danger">FM Parc <i class="fas fa-laptop"></i></h1>
                </nav>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestion des utilisateurs</h1>
                        <a href="{{route('parc')}}" class="btn btn-danger btn-icon-split">Gestion du parc</a>
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
                                        <button class="btn btn-danger dropdown-toggle" type="button"
                                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Choix de l'action</button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item"
                                                onclick="choice('modif', 'Modifier un utilisateur')">Modifier un
                                                utilisateur</a>
                                            <a class="dropdown-item"
                                                onclick="choice('nouvelutilisateur', 'Créer un utilisateur')">Créer un
                                                utilisateur</a>
                                            <a class="dropdown-item"
                                                onclick="choice('supprimer', 'Supprimer un utilisateur')">Supprimer un
                                                utilisateur</a>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 id="titreaction" class="m-1 font-weight-bold text-primary text-right">
                                            Modifier un utilisateur</h6>
                                    </div>
                                    <div id="modif">
                                        <table class="table text-dark">
                                            <form action="{{ route('modifuser')}}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">ID :</td>
                                                    <td>
                                                    <?php
                                                    if(isset($modifs)){
                                                        foreach($modifs as $modif){
                                                            echo "<input type='text' id='id' name='id' class='form-control' placeholder='Identifiant' value='".$modif->id."'>";
                                                        }
                                                    }else{
                                                        echo "<input type='text' id='id' name='id' class='form-control' placeholder='Identifiant'>";
                                                    }
                                                    ?>   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">Nom :</td>
                                                    <td>
                                                    <?php
                                                    if(isset($modifs)){
                                                        foreach($modifs as $modif){
                                                            echo " <input type='text' id='nom' name='nom' class='form-control' placeholder='Nom' onchange='setLogin();' value='".$modif->nom."'>";
                                                        }
                                                    }else{
                                                        echo " <input type='text' id='nom' name='nom' class='form-control' placeholder='Nom' onchange='setLogin();'>";
                                                    }
                                                    ?> 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">Prénom :</td>
                                                    <td>
                                                    <?php
                                                    if(isset($modifs)){
                                                        foreach($modifs as $modif){
                                                            echo " <input type='text' id='prenom' name='prenom' class='form-control' placeholder='prenom' onchange='setLogin();' value='".$modif->prenom."'>";
                                                        }
                                                    }else{
                                                        echo " <input type='text' id='prenom' name='prenom' class='form-control' placeholder='Prenom' onchange='setLogin();'>";
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">Nom d'utilisateur : </td>
                                                    <td>
                                                    <?php
                                                    if(isset($modifs)){
                                                        foreach($modifs as $modif){
                                                            echo " <input type='text' id='login' name='login' class='form-control' placeholder='login' value='".$modif->login."'>";
                                                        }
                                                    }else{
                                                        echo " <input type='text' id='login' name='login' class='form-control' placeholder='Login'>";
                                                    }
                                                    ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-danger btn-icon-split"
                                                            value="Modifier">

                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>
                                    <div id="nouvelutilisateur" style="display:none;">
                                        <table class="table text-dark">

                                            <form action="{{ route('createuser')}}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">Nom :</td>
                                                    <td>
                                                        <input type="text" id="nom2" name="nom" class="form-control"
                                                            placeholder="Nom" onchange="setLogin();">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">Prénom :</td>
                                                    <td>
                                                        <input type="text" id="prenom2" name="prenom"
                                                            class="form-control" placeholder="Prénom"
                                                            onchange="setLogin();">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark">Nom d'utilisateur : </td>
                                                    <td>
                                                        <input type="text" id="login2" name="login" class="form-control"
                                                            placeholder="Login">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-danger btn-icon-split"
                                                            value="Créer">

                                                    </td>
                                                </tr>
                                            </form>
                                        </table>
                                    </div>

                                    <div id="supprimer" style="display:none;">
                                        <table class="table text-dark">
                                            <form action="{{ route('deleteuser')}}" method="POST">
                                                @csrf
                                                <tr>
                                                    <td class="text-dark">ID :</td>
                                                    <td>
                                                        <input type="text" id="id" name="id" class="form-control"
                                                            placeholder="Identifiant">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-dark"></td>
                                                    <td>
                                                        <input type="submit" class="btn btn-danger btn-icon-split"
                                                            value="Supprimer">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nom</th>
                                                    <th>Prénom</th>
                                                    <th>Login</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($utilisateurs as $utilisateur)
                                                <tr>
                                                    <td>{{ $utilisateur->id}}</td>
                                                    <td>{{ $utilisateur->nom}}</td>
                                                    <td>{{ $utilisateur->prenom}}</td>
                                                    <td>{{ $utilisateur->login}}</td>

                                                    <td><a type="button" class="btn btn-success"  href="{{route('util',$utilisateur->id)}}">Modifier</a>
                                                    </td>
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
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>

</body>

</html>