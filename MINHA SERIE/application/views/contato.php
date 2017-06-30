<center >   <p  style="margin-top:15px; font-size:40px; color:#B3B3B3; ">CONTATO</p>
    <div style="background-color:#B3B3B3; width:70%;; min-height:2px; "></div>


    <form action="<?php echo base_url()?>ContatoController/enviaremail" method="POST">

        <p style="color:#B3B3B3;margin-top:15px; ">NOME</p>
        <input type="text" name="nome" height="40" size="60"  style="background-color: transparent;  color: #B3B3B3; border-left:none;border-right: none; border-top:none; border-bottom-color:#B3B3B3;  " required />
        <p style="color:#B3B3B3; margin-top:15px;" >EMAIL</p>
        <input type="email" name="email_from" height="40" size="60"  style="background-color: transparent;  color: #B3B3B3; border-left:none;border-right: none; border-top:none; border-bottom-color:#B3B3B3;  " required/>
        <p style="color:#B3B3B3;margin-top:15px;">ASSUNTO:</p>
        <input  type="text" name="assunto" height="200" size="60"  style="background-color: transparent;  color: #B3B3B3; border-left:none;border-right: none; border-top:none; border-bottom-color:#B3B3B3;  " required />
        <div class="form-group">
            <p style="color:#B3B3B3;margin-top:15px;">MENSAGEM:</p>
            <div style="max-width:450px; min-width:450px;">
                <textarea class="form-control" rows="5" id="comment" name="mensagem" required></textarea></div>

            <input class="btn" type="submit" name="Submit" value="Enviar Mensagem" style="margin-top:15px; margin-bottom:40px;">

    </form></center>