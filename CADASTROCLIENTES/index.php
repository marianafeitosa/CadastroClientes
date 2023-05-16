<?php
define('MYSQL_HOST', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DB_NAME', 'clientes');

try {
    $PDO = new PDO('mysql:host=' . MYSQL_HOST . ';dbname=' . MYSQL_DB_NAME, MYSQL_USER, MYSQL_PASSWORD);
    $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
    exit();
}
?>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Acesso ao Banco de Dados</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Sistema de Acesso ao Banco de Dados</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Endereço</th>
                    <th>Bairro</th>
                    <th>Cep</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM clientes";
                $result = $PDO->query($sql);

                if ($result) {
                    $rows = $result->fetchAll();

                    foreach ($rows as $row) {
                        ?>
                        <tr>
                            <td><?php echo $row['Nome']; ?></td>
                            <td><?php echo $row['Endereco']; ?></td>
                            <td><?php echo $row['Bairro']; ?></td>
                            <td><?php echo $row['CEP']; ?></td>
                            <td><?php echo $row['Cidade']; ?></td>
                            <td><?php echo $row['Estado']; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo 'Erro na consulta ao banco de dados.';
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
