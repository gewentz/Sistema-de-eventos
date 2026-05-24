<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Evento - Sistema de Eventos</title>
</head>
<body>
    <h2>Criar Novo Evento</h2>
    
    <form action="/events/create" method="POST">
        <div>
            <label for="title">Título:</label><br>
            <input type="text" id="title" name="title" required>
        </div>
        <br>
        <div>
            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" rows="4" cols="50"></textarea>
        </div>
        <br>
        <div>
            <label for="event_date">Data do Evento:</label><br>
            <input type="datetime-local" id="event_date" name="event_date" required>
        </div>
        <br>
        <button type="submit">Salvar Evento</button>
        <a href="/dashboard">Cancelar</a>
    </form>
</body>
</html>