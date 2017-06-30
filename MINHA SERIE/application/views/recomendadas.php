<div class="container" style="margin-bottom:50px">
    <div class="row">
        <center> <h1><font color="#B3B3B3" > RECOMENDADAS POR NÓS</font></h1></center>
        <br><br>

<?php




foreach ($dadosimagem as $dados)
{
    echo "<div class='col-lg-3 col-sm-4 col-xs-6' style='margin-bottom:18px' ><a title='Série TOP " . $dados[1] . "' href='#'><img class=' img-responsive' src=assets/img/fotos/imagem" . $dados[0] . "></a><font color='#B3B3B3'>TOP " . $dados[1] . "</font> </div> ";
}


        ?>
    </div>


    <div tabindex="-1" class="modal fade" id="myModal" role="dialog" >
        <center> <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header"style="background-color:white">
                    <button class="close" type="button" data-dismiss="modal">×</button>
                    <h3 class="modal-title">Heading</h3>
                </div>
                <div class="modal-body"  style="background-color:white; ">

                    <center></center>
                </div>
                <div class="modal-footer"style="background-color:white">


                    <button class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div></center>


        </div >
    </div>

<?php

if ($nivel==1) {

    echo "

<div style=' border-size:2px;  border-style:solid; border-color:grey; border-radius: 10px; width:500px; float:left; margin-bottom:50px; background-color:rgba(255,255,255,0.08); margin-left: 15px ' >
<div style='margin-left:7px'>
<form action='" . base_url() . "RecomendadasController/realizarupload'method='post' enctype='multipart/form-data' >


    <h3 align='left'><font color='#A09C9C'> UPLOAD DE IMAGEM</font></h3>
    
    <p align='left'><font color='#A09C9C'> SELECIONE A IMAGEM:</font></p>
	
    <p align='left'>
    <input type='file' class='btn btn-default' name='fileToUpload' id='fileToUpload' required><p align='left'> <span class='glyphicon glyphicon-exclamation-sign ' aria-hidden='true' style='color:#800000; font-size:15px;' ></span> <font color=' #800000'> Atenção: Utilize imagens com as medidas 400X300, nos formatos 'PNG' ou 'JPG'. Caso as imagens excedam as medidas, elas serão cortadas.</font></p>
    <p align='left'><font color='#A09C9C'> SELECIONE QUAL IMAGEM DESEJA ADICIONAR (MIN 1 - MAX 12):</font></p>
    <input align='left' type='number' value='1' name='id' min='1' max='12' required ><br> 
    <br><input align='left' class='btn btn-success' type='submit' value='UPLOAD' name='submit'></p>
    
</form>
</div>
</div>

<div  style=' border-size:2px; border-style:solid; border-color:grey; border-radius: 10px;float:left; width:455px; background-color:rgba(255,255,255,0.08); margin-left:15px; '>
<form action='" . base_url() . "RecomendadasController/removerimagem' method='POST' enctype='multipart/form-data' style='padding-bottom:20px'>
<div style='margin-left:7px'>
   <h3 align='left'><font color='#A09C9C'> REMOVER IMAGEM</font></h3>
    <p align='left'><font color='#A09C9C'> SELECIONE QUAL IMAGEM DESEJA REMOVER (MIN 1 - MAX 12):</font></p>
    <input align='left' type='number' value='1' name='id' min='1' max='12' required ><br> 
   <br> <input align='left' class='btn btn-danger' type='submit' value='REMOVER '  name='btnEnviar'  > </p> 
    
</form>
    </div>
    </div>
	";


}
?>








            <script>
                $(document).ready(function() {
                    $('.img-responsive').click(function(){
                        $('.modal-body').empty();
                        var title = $(this).parent('a').attr("title");
                        $('.modal-title').html(title);
                        //$($(this).parents('div').html()).appendTo('.modal-body');
                        var image = $(this).attr("src");
                        var html ='<img src="'+image+' "  width="100%" />';
                        $('.modal-body').html(html);
                        //var html='<img src="Img/minilogo3.png"/>';
                        //$('.modal-body').html(html);
                        $('#myModal').modal({show:true});
                    });
                });
            </script>
