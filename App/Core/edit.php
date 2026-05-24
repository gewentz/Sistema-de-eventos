<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Evento - Sistema de Eventos</title>
</head>
<body>
    <h2>Editar Evento</h2>
    
    <form action="/events/edit/<?= htmlspecialchars($event['id']) ?>" method="POST">
        <div>
            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($event['title']) ?>" required>
        </div>
        <br>
        <div>
            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"><?= htmlspecialchars($event['description']) ?></textarea>
        </div>
        <br>
        <div>
            <label for="event_date">Data do Evento:</label><br>
            <input type="datetime-local" id="event_date" name="event_date" value="<?= date('Y-m-d\TH:i', strtotime($event['event_date'])) ?>" required>
        </div>
        <br>
        <button type="submit">Atualizar Evento</button>
        <a href="/dashboard">Cancelar</a>
    </form>
</body>
</html>
