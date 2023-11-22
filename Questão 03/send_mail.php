<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validar_dados($dados) {
        $dados = trim($dados);
        $dados = stripslashes($dados);
        $dados = htmlspecialchars($dados);
        return $dados;
    }

    $nome = validar_dados($_POST["nome"]);
    $telefone = validar_dados($_POST["telefone"]);
    $email = validar_dados($_POST["email"]);
    $mensagem = validar_dados($_POST["mensagem"]);

    if (empty($nome) || strlen($nome) < 10 || strlen($nome) > 100) {
        echo "Erro: Por favor, insira um nome válido (entre 10 e 100 caracteres).";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Erro: Por favor, insira um endereço de e-mail válido.";
        exit;
    }

    if (!ctype_digit($telefone) || strlen($telefone) < 8) {
        echo "Erro: Por favor, insira um número de telefone válido (apenas dígitos, pelo menos 8 caracteres).";
        exit;
    }

    // Configurações do servidor SMTP do MailHog
    $smtp_host = "localhost";
    $smtp_port = 1025;

    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];

    $destinatario = "localtestphpmail@gmail.com";  // Substitua pelo seu endereço de e-mail
    $assunto = "Nova mensagem do formulário de contato Construsite - Brasil";

    $corpo_mensagem = "Nome: $nome\n";
    $corpo_mensagem .= "Telefone: $telefone\n";
    $corpo_mensagem .= "E-mail: $email\n\n";
    $corpo_mensagem .= "Mensagem:\n$mensagem";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    ini_set("SMTP", $smtp_host);
    ini_set("smtp_port", $smtp_port);
    ini_set("sendmail_from", $email);

    if (mail($destinatario, $assunto, $corpo_mensagem, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Por favor, tente novamente.";
    }
} else {
    echo "Acesso direto a este script não permitido.";
}
?>
