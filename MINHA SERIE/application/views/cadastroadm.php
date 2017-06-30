<font color="B3B3B3"><h3> CADASTRO DE ADMNISTRADORES</h3></font>
<form  method='POST' class="navbar-form navbar-left" action='<?php echo base_url()?>LoginController/salvarcadastroadm' style="margin-left:10px">
    <div class="form-group">

        <input type='text'  class="form-control" name='nome' placeholder ="Nome" required>
        <br>

        <input type='email' class="form-control" name='email' placeholder='Email' required>
        <br>

        <input type='password'  class="form-control" name='senha' placeholder='Senha' required>
        <br>

        <input type='password'  class="form-control" name='csenha' placeholder='Repita sua senha' required>
        <br>








        <br>
        <input class="btn btn-success" type='submit' value='enviar' name='btnEnviar'>


    </div>

</form>