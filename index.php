<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="py-3 text-center">
            <img src="./imagem/wing_mail.png" alt="" width="100" class="d-block mx-auto mb-2">
            <h2>Send Mail</h2>
            <p class="lead">Seu App de Envio de Email Particular</p>
        </div>
        <div class="row"></div>
        <div class="col-md-12"></div>
        <form action="processa_envio.php" method="POST">
            <div class="form-group">
                <label for="para">Para</label>
                <input type="text" name="para" class="form-control" id="para" placeholder="joao@dominio.com">
            </div>
            <div class="form-group">
                <label for="assunto">Assunto</label>
                <input type="text" class="form-control" id="assunto" name="assunto" placeholder="Assunto da Mensagem">
            </div>
            <div class="form-group">
                <label for="mensagem">Mensagem</label>
                <textarea name="mensagem" class="form-control" id="mensagem" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">Enviar</button>

        </form>

    </div>
</body>

</html>