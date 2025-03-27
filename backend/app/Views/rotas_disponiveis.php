<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rotas Disponíveis</title>
    
    <!-- Incluindo CSS Responsivo -->
    <link rel="stylesheet" href="/assets/css/erro.css">
</head>
<body>
    <h1>Rotas Disponíveis (Privadas)</h1>
    <p> É necessário um token JWT para ter acesso, utilize as Rotas Públicas para ter um token e ativa-lo</p>
    <table border="1">
        <thead>
            <tr>
                <th>GET</th>
                <th>GET ID</th>
                <th>GET FILTRO</th>
                <th>POST</th>
                <th>PUT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $rotas = max(count($rotasGet), count($rotasGetId), count($rotasGetFiltro), count($post));
            for($i = 0; $i < $rotas; $i++): ?>
            <tr>
                <td data-label="GET"><?= isset($rotasGet[$i]) ? htmlspecialchars($rotasGet[$i]) : '-' ?></td>
                <td data-label="GET ID"><?= isset($rotasGetId[$i]) ? htmlspecialchars($rotasGetId[$i]) : '-' ?></td>
                <td data-label="GET FILTRO"><?= isset($rotasGetFiltro[$i]) ? htmlspecialchars($rotasGetFiltro[$i]) : '-' ?></td>
                <td data-label="POST"><?= isset($post[$i]) ? htmlspecialchars($post[$i]) : '-' ?></td>
                <td data-label="PUT"><?= isset($put[$i]) ? htmlspecialchars($put[$i]) : '-' ?></td>
                <td data-label="DELETE"><?= isset($delete[$i]) ? htmlspecialchars($delete[$i]) : '-' ?></td>
            </tr>
            <?php endfor; ?>
        </tbody>
    </table>
    <h2>Rotas Disponiveis (Publicas)</h2>
    <table border=1>
        <thead>
            <tr>
                <th>Utilidade</th>
                <th>GET</th>
                <th>Utilidade</th>
                <th>POST</th>
            </tr>
        </thead>
        <tbody>
    <?php 
    // Definir mensagens específicas para GET e POST
    $utilidadeGet = ["Se logado, mostra dados de sua conta", "Se não estiver logado, não acessará as funções"];
    $utilidadePost = ["Criar seu cadastro", "Criar um novo token"]; 

    $rotas = max(count($getPublico), count($postPublico), count($utilidadePost));

    for ($i = 0; $i < $rotas; $i++): ?>
        <tr>
            <td data-label="Utilidade">
                <?= isset($utilidadeGet[$i]) ? htmlspecialchars($utilidadeGet[$i]) : '-' ?>
            </td>
            <td data-label="GET">
                <?= isset($getPublico[$i]) ? htmlspecialchars($getPublico[$i]) : '-' ?>
            </td>
            <td data-label="Utilidade">
                <?= isset($utilidadePost[$i]) ? htmlspecialchars($utilidadePost[$i]) : '-' ?>
            </td>
            <td data-label="POST">
                <?= isset($postPublico[$i]) ? htmlspecialchars($postPublico[$i]) : '-' ?>
            </td>
        </tr>
    <?php endfor; ?>
</tbody>

    </table>
    <p>Para gerar seu token de acesso, siga os passos abaixo:</p>

<ol>
    <li>Acesse <strong>(/registrar)</strong> e crie sua conta.</li>
    <li>Faça login em <strong>(/login)</strong> para ativar seu token.</li>
    <li>Abra um cliente de API, como o <strong>Insomnia</strong> ou <strong>Postman</strong>.</li>
</ol>

<img src="<?= base_url('assets/images/auth.png');?>" alt="Autenticação JWT">

<p>Dentro do cliente de API:</p>

<ul>
    <li>Vá até a aba <strong>Headers</strong>.</li>
    <li>Adicione um novo cabeçalho com:
        <ul>
            <li><strong>Header:</strong> Authorization</li>
            <li><strong>Valor:</strong> Bearer seu_token_gerado</li>
        </ul>
    </li>
    <li>Para confirmar que está autenticado, acesse <strong>(/user)</strong> e verifique a resposta.</li>
</ul>


</body>
</html>
