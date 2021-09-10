<?php
require_once './cabecalho.php';
?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Contato</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Entre em contato.
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Seu nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Endereço de email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="exemplo@exemplo.com" required>
                            <small id="emailHelp" class="form-text text-muted">Nós nunca vamos compartilhar seu e-mail com mais ninguém.</small>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensagem</label>
                            <textarea class="form-control" id="message" rows="6" required></textarea>
                        </div>
                        <div class="mx-auto">
                            <button type="submit" class="btn btn-primary text-right"><i class="fa fa-envelope"></i> Enviar Mensagem</button></div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Endereço</div>
                <div class="card-body">
                    <p><strong>Endereço: </strong><?php echo $empresa->endereco; ?></p>
                    <p><strong>Bairro: </strong><?php echo $empresa->bairro; ?></p>
                    <p><strong>Cidade: </strong><?php echo $empresa->cidade; ?></p>
                    <p><strong>Email: </strong> <?php echo $empresa->email; ?></p>
                    <p><strong>Telefone: </strong> <?php echo $empresa->fone_1; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<?php
require_once './rodape.php';
?>