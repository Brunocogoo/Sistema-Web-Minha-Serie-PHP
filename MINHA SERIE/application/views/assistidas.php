<?php
echo  "<div='topo' ><font color='#AFAFA' style='margin-left:5px;' > Bem vindo <strong><font color=#33cc33  >$usuario</font></strong></font><br><br> ";

echo "<center><h3 > <font color='#949292'>ASSISTIDAS </font></h3></center> ";

echo '<table class="table" cborder="01" style="margin-bottom: 50px; bgcolor="#00FF00" >
			<tr bgcolor="#FFFFFF">
				<th bgcolor="#F8F8F8">SÉRIE</th>
				<th bgcolor="#F8F8F8">NOTA GERAL</th>
				<th bgcolor="#F8F8F8">TEMPORADAS</th>
				<th bgcolor="#F8F8F8">EPISÓDIOS</th>				
				<th bgcolor="#F8F8F8">NOTA</th>
			</tr>
			';
$cor=0;
foreach ($seriesassistidas as $value) {
    if (($cor%2)==0) {
    echo '<tr>';
    echo '<td bgcolor="#FFFFFF">'. $value[0].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[1].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[2].'</td>';
    echo '<td bgcolor="#FFFFFF">'. $value[3].'</td>';
    if($value[4]==0)
    {
        echo '<td bgcolor="#FFFFFF">

        <form class="navbar-form navbar-left"  method="POST" action="'.base_url().'MinhasController/inserirnota">
        
        <div class="input-group" style="margin-left: -30px; margin-top: -10px;" >
        
        <select name="nota" class="form-control" style="width: 80px; height: 33px;  ">
        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
</select>
    <input type="hidden" name="var" id="id" value="'.$value[5].'">
    

<button style="margin-left:-2px; height: 33px; " type="submit" class="btn btn-default" name="btnserie"><span class="glyphicon glyphicon-plus"></span></button>
 </div></form>

</td>';

    }else{ echo '<td bgcolor="#FFFFFF">'. $value[4].'</td>';}

    } else {
        echo '<tr>';
        echo '<td bgcolor="#F8F8F8">'. $value[0].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[1].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[2].'</td>';
        echo '<td bgcolor="#F8F8F8">'. $value[3].'</td>';
        if($value[4]==0)
        {
            echo '<td bgcolor="#F8F8F8">

        <form class="navbar-form navbar-left"  method="POST" action="'.base_url().'MinhasController/inserirnota">
        
        <div class="input-group" style="margin-left: -30px; margin-top: -10px;" >
        
        <select name="nota" class="form-control" style="width: 80px; height: 33px;  ">
        
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
</select>
    <input type="hidden" name="var" id="id" value="'.$value[5].'">
    

<button style="margin-left:-2px; height: 33px; " type="submit" class="btn btn-default" name="btnserie"><span class="glyphicon glyphicon-plus"></span></button>
 </div></form>

</td>';

        }else{ echo '<td bgcolor="#F8F8F8">'. $value[4].'</td>';}


    }
    $cor++;
}
?>


<html>
</body><center>




    <!-- <input style="margin-bottom:15px;" class="btn btn-danger" type="button" value=" GERAR PDF" onclick="window.location.href='<?php echo base_url()?>PdfController' ; " >-->
</center>

</html>
