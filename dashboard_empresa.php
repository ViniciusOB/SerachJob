<?php
session_start();


if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}


$email_usuario = $_SESSION['email'];


include 'conexao.php';

$sql = "SELECT profile_pic FROM empresas WHERE email_de_trabalho = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute(['email' => $email_usuario]);
$empresa = $stmt->fetch(PDO::FETCH_ASSOC);


$profile_pic = $empresa['profile_pic'] ? 'profile_pics/' . $empresa['profile_pic'] : 'default-profile.png';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>

        body {
            background-color: #f0f0f0;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 56px); 
        }
        .folder {
            width: 180px;
            height: 140px;
            background-color: #007bff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            position: relative;
        }
        .folder:before {
            content: '';
            position: absolute;
            bottom: -25px;
            left: 0;
            width: 0;
            height: 0;
            border-left: 90px solid transparent;
            border-right: 90px solid transparent;
            border-top: 25px solid #007bff;
        }
        .folder:hover {
            transform: translateY(-5px);
        }
        .folder-icon {
            font-size: 2.5em;
            color: #fff;
        }
        .folder-label {
            font-weight: bold;
            margin-top: 5px;
            color: #fff;
        }
        .dropdown-menu {
            right: 0;
            left: auto;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 4px;
            margin-top: 10px;
        }
        .dropdown-menu a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-menu a:hover {
            background-color: #f1f1f1;
        }
        .nav-item.dropdown img {
            cursor: pointer;
            width: 50px; 
            height: 50px; 
            border-radius: 50%; 
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <form class="form-inline my-2 my-lg-0 mr-auto">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        <span class="material-symbols-outlined">home</span>
                        <br> 
                        <span class="nav-text">Ínicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="projeto_empresa.php">
                        <span class="material-symbols-outlined">cases</span>
                        <br> 
                        <span class="nav-text">Projetos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="vagas_empresa.php">
                        <span class="material-symbols-outlined">work</span>
                        <br> 
                        <span class="nav-text">Vagas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="notificacoes_empresa.php">
                        <span class="material-symbols-outlined">notifications</span>
                        <br> 
                        <span class="nav-text">Notificações</span>
                    </a>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php echo htmlspecialchars($profile_pic); ?>" alt="Foto" width="50" height="50" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ver perfil</a>
                        <a class="dropdown-item" href="#">Assinatura</a>
                        <a class="dropdown-item" href="#">Ajuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php">Sair</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="card-container">
       
        <div class="folder">
            <i class="fas fa-folder-open folder-icon"></i>
            <div class="folder-label">Social</div>
        </div>
        <div class="folder">
            <i class="fas fa-folder-open folder-icon"></i>
            <div class="folder-label">Chat</div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        
        document.getElementById('profileDropdown').addEventListener('click', function() {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.classList.toggle('show');
        });

        
        document.addEventListener('click', function(event) {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            if (!event.target.closest('#profileDropdown')) {
                dropdownMenu.classList.remove('show');
            }
        });
    </script>
</body>
</html>