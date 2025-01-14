<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="Img/SearchJob.png">
    <link rel="stylesheet" href="CSS/recuperar_senha.css">
</head>
<body>
<div class="main-container">
        <nav class="navbar">
            <div class="nav-container">
                <div class="brand">
                    <a href="index.php" style="background-image: url('Img/searchIcon.png');">JOB</a>
                </div>
                <ul class="nav-menu">
             
                    <li><a href="index.php" class="nav-link">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle">Cadastrar-se</a>
                        <ul class="dropdown-menu">
                            <li><a href="cadastro_empresa.php" class="dropdown-item">Corporativo</a></li>
                            <li><a href="registro.php" class="dropdown-item">Pessoal</a></li>
                        </ul>
                    </li>
                    <li><a href="home.php" class="nav-link">Login</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Recuperar Senha
                    </div>
                    <div class="card-body">
                        <form action="recuperar_senha_processar.php" method="POST">
                            <div class="form-group">
                                <label for="email">Email do Usuário:</label>
                                <input type="text" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="pergunta">Pergunta de Segurança:</label>
                                <select name="pergunta" id="pergunta" class="form-control" required>
                                    <option value="">Selecione uma pergunta</option>
                                    <option value="1">Qual é o nome do seu animal de estimação?</option>
                                    <option value="2">Qual é a sua cidade natal?</option>
                                    <option value="3">Qual é o nome do seu melhor amigo?</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="resposta">Resposta:</label>
                                <input type="text" name="resposta" id="resposta" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Recuperar Senha</button>
                            <!-- Adicionar uma área para a mensagem de erro -->
<div id="erro" class="text-danger text-center mt-2 d-none">
    <!-- Esta mensagem será substituída pelo PHP se houver erro -->
</div>

                            <a class="btn btn-danger" href="home.php">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    // Verificar se existe um parâmetro de erro na URL e exibir a mensagem de erro correspondente
    const urlParams = new URLSearchParams(window.location.search);
    const erroElement = document.getElementById('erro');

    if (urlParams.has('erro')) {
        erroElement.classList.remove('d-none');
        erroElement.innerText = "Resposta de segurança incorreta. Verifique e tente novamente.";
    }
</script>

<script>
        // Script para alternar a exibição do dropdown ao clicar
        document.querySelector('.dropdown-toggle').addEventListener('click', function(event) {
            event.preventDefault();
            this.parentElement.classList.toggle('show');
        });

        // Fechar o dropdown se clicar fora dele
        document.addEventListener('click', function(event) {
            var dropdown = document.querySelector('.dropdown');
            if (!dropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });

    
    </script>
</html>