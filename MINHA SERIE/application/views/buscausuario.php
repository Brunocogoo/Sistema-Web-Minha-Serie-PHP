<link type="text/css" href="assets/css/paging.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url('assets/js/paging.js')?>""></script>

<?php


echo "<center><h3 > <font color='#949292'>BUSCAR USUÁRIOS </font></h3> </center> ";

echo"<center><div style='padding-bottom: 10px;'><input class=\"form-control glyphicon glyphicon-search\"  id=\"filtro-nome\" placeholder=\"&#xe003\" style=\"width: 300px;font-size: large; \"> </div></center>";
echo '<div id="centro"> ';
echo '<table id="tb1" class="table" style="margin-bottom: 20px;" cborder="01" bgcolor="#00FF00">
 <thead>
			<tr bgcolor="#FFFFFF">
			    <th  bgcolor="#F8F8F8"><font color="black" style="padding-left: 15px;"> EMAIL</font> </th> 
				<th  bgcolor="#F8F8F8"><font color="black" style="padding-left: 10px;"> NOME</font> </th> 
				<th  bgcolor="#F8F8F8" ><center><font color="black" "> AÇÃO</font></center> </th> 
				
				
			</tr>
			 </thead>
			';
$cor=0;
foreach ($usuarios as $value) {
    if (($cor%2)==0) {

        echo '<tr align="center" bgcolor="#FFFFFF">';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#FFFFFF">' . $value[2] . '</td>';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#FFFFFF">' . $value[0] . '</td>';
        echo '<td bgcolor="#FFFFFF" align="center"> <center><a href="'.base_url().'BuscaController/perfil/'.$value[1].'" id=$value[4] class="btn btn-primary" role="button">Ver Perfil <span class="glyphicon glyphicon-share-alt" ></span></a></center></td></tr>';

    } else {

        echo '<tr align="center" bgcolor="#F8F8F8">';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#F8F8F8">' . $value[2] . '</td>';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#F8F8F8">' . $value[0] . '</td>';
        echo '<left><td bgcolor="#F8F8F8" align="center"> <left><a href="'.base_url().'BuscaController/perfil/'.$value[1].'" id=$value[4] class="btn btn-primary" role="button">Ver Perfil <span class="glyphicon glyphicon-share-alt" ></span></a></td></center></tr>';


    }
    $cor++;

}
echo '</table> <center>
<div id="pageNav" style="margin-bottom: 10px; padding-top: 30px;"></div></center> </div>' ;




?>


<html>
<body>
<br>


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
