

<?php



echo "<center><h3 > <font color='#949292'>TOP 10 </font></h3></center> ";

echo '<table class="table" style="margin-bottom: 50px;" cborder="01" bgcolor="#00FF00">
			<tr bgcolor="#FFFFFF">
			    <th  bgcolor="#F8F8F8"><center><font color="black">TOP</font></center></th>
				<th  bgcolor="#F8F8F8"><font color="black" style="padding-left: 20px;">SÉRIE</font></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">NOTA GERAL</font></center></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">TEMPORADAS</font></center></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">EPISÓDIOS</font></center></th>
				<th  bgcolor="#F8F8F8"><center><font color="black">DURAÇÃO EPISÓDIO</font></center></th>';
if ($nivel!=null)
{
    echo'<th  bgcolor="#F8F8F8"><center><font color="black">AÇÃO</font></center></th>';}
echo'
				
				
			</tr>
			';
$cor=0;
$pos=1;
foreach ($series as $value) {
    if (($cor%2)==0) {

        echo '<tr align="center" bgcolor="#FFFFFF">';
        echo '<td align="center" bgcolor="#FFFFFF">' . $pos . '</td>';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#FFFFFF">' . $value[0] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[1] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[2] . '</td>';     //passar para a view
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[3] . '</td>';
        echo '<td align="center" bgcolor="#FFFFFF">' . $value[4] . '</td>';
        if ($nivel!=null)
        {
            echo '<left><td bgcolor="#FFFFFF"> <left><a href="'.base_url().'Top10Controller/inserirdesejoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button">Desejo</a>  ';
            echo '<a href="'.base_url().'Top10Controller/inserirassistindoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button" >Assistir</a>';
            echo '</td></center></tr> ';}
    } else {

        echo '<tr align="center" bgcolor="#F8F8F8">';
        echo '<td align="center" bgcolor="#F8F8F8">' . $pos . '</td>';
        echo '<td align="left" style="padding-left: 20px;" bgcolor="#F8F8F8">' . $value[0] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[1] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[2] . '</td>';     //passar para a view
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[3] . '</td>';
        echo '<td align="center" bgcolor="#F8F8F8">' . $value[4] . '</td>';
        if ($nivel!=null)
        {
            echo '<left><td bgcolor="#F8F8F8"> <left><a href="'.base_url().'Top10Controller/inserirdesejoget/'.$value[5].'" id=$value[4] class="btn btn-default " role="button">Desejo</a>  ';
            echo '<a href="'.base_url().'Top10Controller/inserirassistindoget/'.$value[5].'" id=$value[4] class="btn btn-default" role="button" >Assistir</a>';
            echo '</td></center></tr> ';}

    }
    $cor++;
    $pos++;

}

?>





