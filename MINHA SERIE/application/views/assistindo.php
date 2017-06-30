<?php
echo  "<div='topo' ><font color='#AFAFA' style='margin-left:5px;' > Bem vindo <strong><font color=#33cc33  >$usuario</font></strong></font><br><br> ";


echo "<center><h3 > <font color='#949292'>ASSISTINDO </font></h3></center> ";

echo '<table class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
			<tr bgcolor="#FFFFFF">
				<th bgcolor="#F8F8F8">SÉRIE</th>
				<th bgcolor="#F8F8F8">NOTA GERAL</th>
				<th bgcolor="#F8F8F8">TEMPORADA</th>
				<th bgcolor="#F8F8F8">EPISÓDIO</th>				
				<th bgcolor="#F8F8F8">AÇÃO</th>
			</tr>
			';
$cor=0;
foreach ($seriesassistindo as $value) {
if (($cor%2)==0) {
    echo '<tr>';
    echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[2].'/'. $value[3].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[4].'/'. $value[5].'</td>';

    echo '<left><td bgcolor="#FFFFFF"> <left><a href="'.base_url().'MinhasController/aumentarepisodio/'.$value[6].'" id=$value[6] class="btn btn-info " role="button"><span class="glyphicon glyphicon-plus" ></span></a> ';
    echo '<a href="'.base_url().'MinhasController/removerserie/'.$value[6].'" id=$value[6] class="btn btn-danger " role="button" ><span class="glyphicon glyphicon-trash" ></span></a></td></center></tr> ';
} else {

    echo '<tr>';
    echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[2].'/'. $value[3].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[4].'/'. $value[5].'</td>';

    echo '<left><td bgcolor="#F8F8F8"> <left><a href="'.base_url().'MinhasController/aumentarepisodio/'.$value[6].'" id=$value[6] class="btn btn-info " role="button"><span class="glyphicon glyphicon-plus" ></span></a> ';
    echo '<a href="'.base_url().'MinhasController/removerserie/'.$value[6].'" id=$value[6] class="btn btn-danger " role="button" ><span class="glyphicon glyphicon-trash" ></span></a></td></center></tr> ';

}
    $cor++;
}

echo "<h4 style='margin-left:5px;'> <font color='#949292'>Nova Série: </font></h4>";

echo '<form class="navbar-form navbar-left"  method="POST" action="'.base_url().'MinhasController/inserirassistindo">';
echo ' <div class="input-group">';
echo '   <select name="id" style="margin-left:5px; width: 200px; height: 35px; " class="form-control" id="listF"  >';

foreach ($series as $value) { echo'<option value="'.$value[5].'">'.$value[0].'</option>';}

echo '</select>';





echo ' <button style="margin-left:-2px; height: 35px; " type="submit" class="btn btn-default" name="btnserie"><span class="glyphicon glyphicon-plus"></span></button><br>';

echo "</div>";
echo '</form>';

?>




<html>
</body><center>



   <input style="margin-bottom:15px;" class="btn btn-danger" type="button" value=" GERAR PDF" onclick="window.location.href='<?php echo base_url()?>PdfController' ; " >
</center>



</html>

