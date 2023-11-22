<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

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

    // Configurações do servidor SMTP
    $smtp_host = "seu_smtp_host";
    $smtp_port = 587; 
    $smtp_usuario = "seu_usuario_smtp";
    $smtp_senha = "sua_senha_smtp";

    $destinatario = "localtestphpmail@gmail.com";  
    $assunto = "Nova mensagem do formulário de contato Construsite - Brasil";

    $corpo_mensagem = "Nome: $nome\n";
    $corpo_mensagem .= "Telefone: $telefone\n";
    $corpo_mensagem .= "E-mail: $email\n\n";
    $corpo_mensagem .= "Mensagem:\n$mensagem";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = $smtp_host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $smtp_usuario;
        $mail->Password   = $smtp_senha;
        $mail->SMTPSecure = 'tls';
        $mail->Port       = $smtp_port;

        $mail->setFrom($email, $nome);
        $mail->addAddress($destinatario);
        $mail->Subject = $assunto;
        $mail->Body    = $corpo_mensagem;

        $mail->send();
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem. Detalhes do erro: {$mail->ErrorInfo}";
    }
} else {
    echo "Acesso direto a este script não permitido.";
}
?>