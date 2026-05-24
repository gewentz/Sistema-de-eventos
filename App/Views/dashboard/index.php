<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Gerenciador de Eventos</title>
    <link rel="stylesheet" href="/public/css/style.css">
</head>
<body>
    <div class="container dashboard-container">
        <header>
            <h1>Gerenciador de Eventos</h1>
            <div class="header-actions">
                <a href="/events/create" class="btn-small btn-success">Novo Evento</a>
                <a href="/logout" class="btn-small btn-danger">Sair</a>
            </div>
        </header>

        <h2 class="section-title">Meus Eventos</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($myEvents)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Você ainda não criou eventos.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($myEvents as $event): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($event['title']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($event['event_date'])); ?></td>
                            <td class="header-actions">
                                <a href="/events/edit/<?php echo $event['id']; ?>" class="btn-small btn-primary">Editar</a>
                                <a href="/events/delete/<?php echo $event['id']; ?>" class="btn-small btn-danger" onclick="return confirm('Deseja excluir este evento?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>

        <h2 class="section-title">Todos os Eventos</h2>
        <table>
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Organizador</th>
                    <th>Data</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($allEvents)): ?>
                    <tr>
                        <td colspan="3" style="text-align: center;">Nenhum evento registrado no sistema.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($allEvents as $event): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($event['title']); ?></td>
                            <td><?php echo htmlspecialchars($event['owner_name']); ?></td>
                            <td><?php echo date('d/m/Y H:i', strtotime($event['event_date'])); ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>