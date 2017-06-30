<?php
echo  "<div='topo' ><font color='#AFAFA' style='margin-left:5px;' > Bem vindo <strong><font color=#33cc33  >$usuario</font></strong></font><br><br> ";


echo "<center><h3 > <font color='#949292'>SUGERIDAS</font></h3></center> ";

echo '<table class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
			<tr bgcolor="#FFFFFF">
				<th bgcolor="#F8F8F8">SÉRIE</th>
				<th bgcolor="#F8F8F8">NOTA GERAL</th>
				<th bgcolor="#F8F8F8">TEMPORADAS</th>
				<th bgcolor="#F8F8F8">EPISÓDIOS</th>		
				<th bgcolor="#F8F8F8">SUGERIDA POR</th>			
				<th bgcolor="#F8F8F8">AÇÃO</th>
			</tr>
			';
$cor=0;
foreach ($seriessugeridas as $value) {
if (($cor%2)==0) {
    echo '<tr>';
    echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[2].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[3].'</td>';
    echo '<td bgcolor="#FFFFFF"><a href="'.base_url().'BuscaController/perfil/'.$value[6].'">'. $value[5].'</a> </td>';

    echo '<left><td bgcolor="#FFFFFF"> <left><a href="'.base_url().'MinhasController/removersugerida/'.$value[4].'" id=$value[4] class="btn btn-danger " role="button" style="height: 32px;"><span class="glyphicon glyphicon-trash" ></span></a> ';
    echo '<a href="'.base_url().'MinhasController/inserirassistindoget/'.$value[4].'" id=$value[4] class="btn btn-info " role="button" >Assistir</a>';
    echo '</td></center></tr> ';
} else {
    echo '<tr>';
    echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[2].'</td>';
    echo '<td bgcolor="#F8F8F8">'. $value[3].'</td>';
    echo '<td bgcolor="#F8F8F8"><a href="'.base_url().'BuscaController/perfil/'.$value[6].'">'. $value[5].'</a></td>';


    echo '<left><td bgcolor="#F8F8F8"> <left><a href="'.base_url().'MinhasController/removersugerida/'.$value[4].'" id=$value[4] class="btn btn-danger " role="button" style="height: 32px;"><span class="glyphicon glyphicon-trash" ></span></a>  ';
   echo '<a href="'.base_url().'MinhasController/inserirassistindoget/'.$value[4].'" id=$value[4] class="btn btn-info " role="button" >Assistir</a>';
    echo '</td></center></tr> ';
}
    $cor++;
}



?>

<html>
</body><center>

   <!-- <input style="margin-bottom:15px;" class="btn btn-danger" type="button" value=" GERAR PDF" onclick="window.location.href='<?php echo base_url()?>PdfController' ; " > -->
</center>

</html>
