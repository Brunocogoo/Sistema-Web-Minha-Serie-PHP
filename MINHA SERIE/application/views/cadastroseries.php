<font  color="B3B3B3"><h3 style='margin-left: 30px '> CADASTRO DE SÉRIES</h3></font>



<form  method='POST' class="navbar-form navbar-left" action='<?php echo base_url()?>SeriesController/cadastrarseries' style="margin-left:10px">

    <div class="form-group">


        <input type='text'  class="form-control" name='xx'  value=" <?php echo $titulo ?>" style='width: 250px; margin-left: 10px; margin-top: 2px;'disabled required>


        <input type='text' class="form-control" name='xx' value=" <?php echo $temporadas ?>" style='width: 250px; margin-left: 10px; margin-top: 2px;' disabled required>


        <input type='text'  class="form-control" name='xx' value=" <?php echo $duracao ?>" style='width: 250px; margin-left: 10px; margin-top: 2px;' disabled  required>

        <input type="hidden" name="titulo" id="var" value="<?php echo $titulo ?>" />
        <input type="hidden" name="temporadas" id="var" value="<?php echo $temporadas ?>" />
        <input type="hidden" name="duracao" id="var" value="<?php echo $duracao ?>" />


   </div>

    <br>
    <div style="margin-left: 10px; margin-top: 15px;"><i style="color: indianred">Adcione abaixo a quantidade de episódios de cada temporada.</i></div>

        <div style="display: table;margin-top: 10px;">
            <center>
        <?php
        for ($i=1;$i<=$temporadas;$i++)
        {
            echo "<div style='float: left;margin-left: 10px;'>";
           echo "<h4> <font color='#949292'>Episódios temporada ".$i." </font></h4>";
            echo "<input type='number' class='form-control' name='temp".$i."'' required>";

            echo "</div>";



        }
        ?>
                </center>
        </div>








    








    <input class="btn btn-primary" type='submit' value='Cadastrar Série' name='btnEnviar' style="margin-left: 15px; margin-top: 15px; margin-bottom: 50px; ">

</form>