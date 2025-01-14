<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "conexãodb"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $altura = $_POST['altura'];
    $tamanho_calcado = $_POST['tamanho-calcado']; 
    $nome_mae = $_POST['nome-mae'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];

    
    $stmt = $conn->prepare("INSERT INTO inscricoes (nome, idade, altura, tamanho_calcado, nome_mae, rg, cpf) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    
    $stmt->bind_param("siissss", $nome, $idade, $altura, $tamanho_calcado, $nome_mae, $rg, $cpf);

    
    if ($stmt->execute()) {
        echo "<script>alert('Inscrição realizada com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao realizar a inscrição: " . $stmt->error . "');</script>";
    }

  
    $stmt->close();
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nandinha Vôlei Clube</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logoTitulo">
                <img src="assets/LOGO.jpg" alt="Logo Nandinha Vôlei Clube">
                <h1>Nandinha Vôlei Clube</h1>
            </div>

            <nav>
                <ul>
                    <li><a href="#sobre">Sobre</a></li>
                    <li><a href="#inscricao">Inscrição</a></li>
                    <li><a href="#equipe">Equipe</a></li>
                    <li><a href="#jogos">Jogos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section id="sobre">
            <div class="container">
                <h2>Bem-vindo ao Time Nandinha Vôlei Clube</h2>
                <p>O Time Nandinha Vôlei Clube é um dos principais times de vôlei do país, dedicado ao desenvolvimento de atletas e ao incentivo do esporte.</p>
            </div>
        </section>

        <section id="inscricao">
            <div class="container">
                <h2>Formulário de Inscrição</h2>
                <form method="POST" action="">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required placeholder="Digite seu nome">

                    <label for="idade">Idade:</label>
                    <input type="number" id="idade" name="idade" min="10" max="100" required placeholder="Digite sua idade">

                    <label for="altura">Altura (cm):</label>
                    <input type="number" id="altura" name="altura" min="100" max="250" required placeholder="Digite sua altura em cm">

                    <label for="tamanho-calcado">Tamanho do Calçado:</label>
                    <input type="number" id="tamanho-calcado" name="tamanho-calcado" min="30" max="50" required placeholder="Ex: 38">

                    <label for="tamanho-roupa">Tamanho de Roupas:</label>
                    <select id="tamanho-roupa " name="tamanho-roupa" required>
                        <option value="">Selecione</option>
                        <option value="PP">PP</option>
                        <option value="P">P</option>
                        <option value="M">M</option>
                        <option value="G">G</option>
                        <option value="GG">GG</option>
                    </select>

                    <label for="nome-mae">Nome da Mãe:</label>
                    <input type="text" id="nome-mae" name="nome-mae" required placeholder="Digite o nome da sua mãe">

                    <label for="rg">RG:</label>
                    <input type="text" id="rg" name="rg" required placeholder="Digite seu RG" pattern="\d{1,2}\.\d{3}\.\d{3}-\d{1}">

                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="cpf" required placeholder="Digite seu CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}">

                    <button type="submit">Inscrever-se</button>
                </form>
            </div>
        </section>

        <section id="equipe">
            <div class="container">
                <h2>Nossa Equipe</h2>
                <p>Conheça os melhores atletas do Nandinha Vôlei Clube.</p>
                <div class="membros">
                    <div class="membro">
                        <img src="assets/1.jpg" alt="Ellie">
                        <h3>Ellie</h3>
                        <p>Posição: Levantador</p>
                    </div>
                    <div class="membro">
                        <img src="assets/2.jpg" alt="Nandinha">
                        <h3>Nandinha</h3>
                        <p>Posição: Central</p>
                    </div>
                    <div class="membro">
                        <img src="assets/3.jpg" alt="Pato">
                        <h3>Pato</h3>
                        <p>Posição: Atacante</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="jogos">
            <div class="container">
                <h2>Calendário de Jogos</h2>
                <table>
                    <tr>
                        <th>Data</th>
                        <th>Oponente</th>
                        <th>Local</th>
                    </tr>
                    <tr>
                        <td>01/10/2024</td>
                        <td>Time A</td>
                        <td>Ginásio Municipal</td>
                    </tr>
                    <tr>
                        <td>15/10/2024</td>
                        <td>Time B</td>
                        <td>Centro Esportivo</td>
                    </tr>
                    <tr>
                        <td>29/10/2024</td>
                        <td>Time C</td>
                        <td>Estádio Nacional</td>
                    </tr>
                </table>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Time Nandinha Vôlei Clube. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>