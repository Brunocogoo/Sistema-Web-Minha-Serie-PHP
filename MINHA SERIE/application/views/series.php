<link type="text/css" href="assets/css/paging.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url('assets/js/paging.js')?>""></script>

<?php


echo "<center><h3 > <font color='#949292'>SÉRIES </font></h3> </center> ";

if ($nivel==1) {
    echo "


<form  method='POST' class=\"navbar-form navbar-left\" action='" . base_url() . "SeriesController/salvarseries' style='margin-left:10px'>
 <div class='input-group' style='margin-left: 10px;margin-bottom: 15px;'>
 
 <h4 style='margin-left:5px;margin-left: 10px' > <font color='#949292'>Inserir Série: </font></h4>
 
        <input type='text'  class='form-control' name='titulo' placeholder ='Titulo' style='width: 250px; margin-left: 10px; margin-top: 2px;' required>
        

        <input type='number' class=\"form-control\" name='temporadas' placeholder='Temporadas'  style='width: 250px; margin-left: 10px;  margin-top: 2px;' required>
         
        <input type='text'  class=\"form-control\" name='duracao' placeholder='Duração (HH:MM)' data-mask=\"__:__\"/ style='width: 250px; margin-left: 10px; margin-top: 2px; ' required>
               
        <label for=\"mySubmit\" class=\"btn btn-primary\"style='margin-left: 10px;  margin-top: 2px;'>Próximo <span class='glyphicon glyphicon-share-alt'></span></label>
        
        <input id=\"mySubmit\" type=\"submit\" value=\"Go\" class=\"hidden\"  />
        
         <!--<input class=\"btn btn-success\" type='submit' value='Próximo →' name='btnEnviar' style='margin-left: 10px;  margin-top: 2px;'> -->
        
        </div>
        

</form>






";
}

echo '<table id="tb1" class="table" style="margin-bottom: 20px;" cborder="01" bgcolor="#00FF00">
 <thead>
			<tr bgcolor="#FFFFFF">
				<th  bgcolor="#F8F8F8"><font color="black" style="padding-left: 20px;"> SÉRIE</font> <div><input class="form-control glyphicon glyphicon-search"  id="filtro-nome" placeholder="&#xe003" style="width: 300px;font-size: large"> </div></th> 
				<th  bgcolor="#F8F8F8"><center><font color="black">NOTA GERAL</font></center></th> 
				<th  bgcolor="#F8F8F8"><center><font color="black">TEMPORADAS</font></center></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">EPISÓDIOS</font></center></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">DURAÇÃO EPISÓDIO</font></center></th>';
if ($nivel!=null)
{
				echo'<th  bgcolor="#F8F8F8"><center><font color="black">AÇÃO</font></center></th>';}
echo'
			</tr>
			 </thead>
			';
$cor=0;
foreach ($series as $value) {
    if (($cor%2)==0) {

        echo '<tr align="center" bgcolor="#FFFFFF">';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#FFFFFF">' . $value[0] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[1] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[2] . '</td>';     //passar para a view
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[3] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[4] . '</td>';
        if ($nivel!=null)
        {
        echo '<left><td bgcolor="#FFFFFF"> <left><a href="'.base_url().'MinhasController/inserirdesejoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button">Desejo</a>  ';
        echo '<a href="'.base_url().'MinhasController/inserirassistindoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button" >Assistir</a>';
        echo '</td></center></tr> ';}
    } else {

        echo '<tr align="center" bgcolor="#F8F8F8">';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#F8F8F8">' . $value[0] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[1] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[2] . '</td>';     //passar para a view
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[3] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[4] . '</td>';
        if ($nivel!=null)
        {
        echo '<left><td bgcolor="#F8F8F8"> <left><a href="'.base_url().'MinhasController/inserirdesejoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button">Desejo</a>  ';
        echo '<a href="'.base_url().'MinhasController/inserirassistindoget/'.$value[5].'" id=$value[4] class="btn btn-default" role="button" >Assistir</a>';
        echo '</td></center></tr> ';}

    }
    $cor++;

}
echo '</table>' ;




?>


<html>
<body>
<br>

    <center>
<div id="pageNav" style="margin-bottom: 70px;"></div></center>
    <script>
var pager = new Pager('tb1', 15);
pager.init();
pager.showPageNav('pager', 'pageNav');
pager.showPage(1);
</script>
</body>


</html>

<script>



    $('#filtro-nome').keyup(function() {
        var nomeFiltro = $(this).val().toLowerCase();


        console.log(nomeFiltro);
        $('table tbody').find('tr').each(function() {
            var conteudoCelula = $(this).find('td:first').text();
            console.log(conteudoCelula);
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            $(this).css('display', corresponde ? '' : 'none');


        });
    });</script>


<script>
    Array.prototype.forEach.call(document.body.querySelectorAll("*[data-mask]"), applyDataMask);

    function applyDataMask(field) {
        var mask = field.dataset.mask.split('');

        // For now, this just strips everything that's not a number
        function stripMask(maskedData) {
            function isDigit(char) {
                return /\d/.test(char);
            }
            return maskedData.split('').filter(isDigit);
        }

        // Replace `_` characters with characters from `data`
        function applyMask(data) {
            return mask.map(function(char) {
                if (char != '_') return char;
                if (data.length == 0) return char;
                return data.shift();
            }).join('')
        }

        function reapplyMask(data) {
            return applyMask(stripMask(data));
        }

        function changed() {
            var oldStart = field.selectionStart;
            var oldEnd = field.selectionEnd;

            field.value = reapplyMask(field.value);

            field.selectionStart = oldStart;
            field.selectionEnd = oldEnd;
        }

        field.addEventListener('click', changed)
        field.addEventListener('keyup', changed)
    }

</script>
