<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registro - Gerenciador de Eventos</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Criar Conta</h1>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="/register" method="POST">
            <input type="text" name="name" placeholder="Nome Completo" required>
            <input type="email" name="email" placeholder="E-mail" required>
            <input type="password" name="password" placeholder="Senha" required>
            <button type="submit" class="btn-success">Registrar</button>
        </form>
        <div class="links">
            <a href="/login">Já tenho conta</a>
        </div>
    </div>
</body>
</html>