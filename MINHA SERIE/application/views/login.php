<form class="navbar-form navbar-left"  method='POST' action='<?php echo base_url()?>LoginController/Logar''>
    <div class="form-group">
        <input type='email' class="form-control" placeholder="Email" name='login' required>

        <input type='password' class="form-control" placeholder="Senha" name='senha' required>
    </div>
    <button type="submit" class="btn btn-success" name='btnlogar'>Logar</button><br>
    <a href="<?php echo base_url()?>LoginController/Cadastro">Não tem uma conta? Cadastre-se</a>
</form>
