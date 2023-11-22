<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
	<title>Formulário de Contato - Construsite</title>
</head>

<body>
	<header>
		<img src="images\logo.png" alt="Construsite Brasil Logo" id="logo">
	</header>
	<form id="validate-form" method="post" action="send_mail.php">
		<h2>Mensagem</h2>
		<label for="nome">Nome*</label>
		<input type="text" id="nome" name="nome" required>

		<label for="telefone">Telefone*</label>
		<input type="tel" id="telefone" name="telefone" required>

		<label for="email">E-mail*</label>
		<input type="email" id="email" name="email" required>

		<label for="mensagem">Mensagem*</label>
		<textarea id="mensagem" name="mensagem" rows="4" required></textarea>

		<input type="submit" value="Enviar Mensagem">
	</form>

	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="validation.js"></script>
</body>
</html>
