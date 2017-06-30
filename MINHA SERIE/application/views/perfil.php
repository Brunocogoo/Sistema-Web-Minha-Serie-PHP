<link type="text/css" href="<?php echo base_url('assets/css/paging.css')?>" rel="stylesheet" />
<script type="text/javascript" src="<?php echo base_url('assets/js/paging.js')?>""></script>
<?php

echo "<center><h3 > <font color='#949292'>PERFIL DE  ".$usuario." </font></h3></center> ";

// ASSISTIDAS --------------------- ASSISTIDAS ------------------ ASSISTIDAS
echo '<div id="bordas" style="height: auto;">';
echo "<center><h3 > <font color='#949292'>ASSISTIDAS </font></h3></center> ";

if ($assistidas==null){echo '<center><i >Nenhuma série cadastrada</i></center>';}
else {

echo '<table id="tbassistidas" class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
<tr bgcolor="#FFFFFF">
    <th bgcolor="#F8F8F8">SÉRIE</th>
    <th bgcolor="#F8F8F8">NOTA GERAL</th>
    <th bgcolor="#F8F8F8">TEMPORADAS</th>
    <th bgcolor="#F8F8F8">EPISÓDIOS</th>
    <th bgcolor="#F8F8F8">NOTA</th>
</tr>
';
$cor=0;


foreach ($assistidas as $value) {
if (($cor%2)==0) {
echo '<tr>';
    echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[2].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[3].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[4].'</td> </tr>'; }

else {
        echo '<tr>';
        echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[2].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[3].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[4].'</td> </tr>';
    }
    $cor++;
}
echo '</table> <center><div id="pageNav1" style="margin-bottom: 10px; padding-top: 10px;"></div></center> </div>';}
echo ' </div>';


// ASSISTINDO --------------------- ASSISTINDO ------------------ ASSISTINDO
echo '<div id="bordas" style="height: auto;">';
echo "<center><h3 > <font color='#949292'>ASSISTINDO </font></h3></center> ";

if ($assistindo==null){echo '<center><i >Nenhuma série cadastrada</i></center>';}
else {

echo '<table id="tbassistindo" class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
			<tr bgcolor="#FFFFFF">
				<th bgcolor="#F8F8F8">SÉRIE</th>
				<th bgcolor="#F8F8F8">NOTA GERAL</th>
				<th bgcolor="#F8F8F8">TEMPORADA</th>
				<th bgcolor="#F8F8F8">EPISÓDIO</th>				
				
			</tr>
			';
$cor=0;
foreach ($assistindo as $value) {
    if (($cor%2)==0) {
        echo '<tr>';
        echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[2].'/'. $value[3].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[4].'/'. $value[5].'</td> </tr>';}
    else {

        echo '<tr>';
        echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[2].'/'. $value[3].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[4].'/'. $value[5].'</td> </tr>';}
    $cor++;
}
echo'</table>  <center><div id="pageNav2" style="margin-bottom: 10px; padding-top: 10px;"></div></center> </div>';
}
echo '</div>';

// DESEJO --------------------- DESEJO ------------------ DESEJO
echo '<div id="bordas" style="height: auto;">';
echo "<center><h3 > <font color='#949292'>DESEJO</font></h3></center> ";

if ($desejo==null){echo '<center><i >Nenhuma série cadastrada</i></center>';}
else {

echo '<table id="tbdesejo" class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
			<tr bgcolor="#FFFFFF">
				<th bgcolor="#F8F8F8">SÉRIE</th>
				<th bgcolor="#F8F8F8">NOTA GERAL</th>
				<th bgcolor="#F8F8F8">TEMPORADAS</th>
				<th bgcolor="#F8F8F8">EPISÓDIOS</th>				
				
			</tr>
			';
$cor=0;
foreach ($desejo as $value) {
    if (($cor%2)==0) {
        echo '<tr>';
        echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[2].'</td>';
        echo '<td bgcolor="#FFFFFF">'. $value[3].'</td> </tr>';}
    else {
        echo '<tr>';
        echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[2].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[3].'</td> </tr>';}
    $cor++;
}
echo'</table> <center> <div id="pageNav3" style="margin-bottom: 10px; padding-top: 10px;"></div></center> </div>';}
echo ' </div>';

if ($visitante!==null)
{echo '<div id="bordasfooter" style="height: auto;">
<center><h3 > <font color=\'#949292\'>SUGERIR SÉRIE</font></h3></center>
';
    echo '<form   method="POST" action="'.base_url().'MinhasController/inserirsugeridas" style="margin-bottom:-10px;">';

    echo '  <center> <select name="id" style="margin-left:5px; width: 200px; height: 35px; " class="form-control" id="listF"  >';

    foreach ($series as $value) { echo'<option value="'.$value[5].'">'.$value[0].'</option>';}

    echo '</select>';

    echo ' <input type="hidden" name="usuario" id="var" value="'.$usuarioid.'" />';





    echo ' <button style="margin-left:-2px; margin-top: 5px; margin-bottom: 5px; height: 35px; " type="submit" class="btn btn-default" name="btnserie">Enviar</button></center>';


    echo '</form>';




}


?>
<html>
<body>
<br>


<script>
    var pager = new Pager('tbdesejo', 5);
    pager.init();
    pager.showPageNav('pager', 'pageNav3');
    pager.showPage(1);
</script>

<script>
    var pager = new Pager('tbassistindo', 5);
    pager.init();
    pager.showPageNav('pager', 'pageNav2');
    pager.showPage(1);
</script>

<script>
    var pager = new Pager('tbassistidas', 5);
    pager.init();
    pager.showPageNav('pager', 'pageNav1');
    pager.showPage(1);
</script>


</body>


</html>



