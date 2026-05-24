<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Evento - Gerenciador de Eventos</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Editar Evento</h1>
        <form action="/events/edit/<?php echo $event['id']; ?>" method="POST">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($event['title']); ?>" required>

            <label for="description">Descrição</label>
            <textarea name="description" id="description" rows="4"><?php echo htmlspecialchars($event['description']); ?></textarea>

            <label for="event_date">Data e Hora</label>
            <input type="datetime-local" name="event_date" id="event_date" value="<?php echo date('Y-m-d\TH:i', strtotime($event['event_date'])); ?>" required>

            <div class="form-actions">
                <a href="/dashboard" class="btn-secondary">Cancelar</a>
                <button type="submit" class="btn-primary">Atualizar Evento</button>
            </div>
        </form>
    </div>
</body>
</html>