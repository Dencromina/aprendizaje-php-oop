<style>

      *{
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      header{
        background-color: #F9F8FC;
      }

     nav{
       height: 60px;
       background-color:#b92d2d;
       text-align: center;
     }

     nav ul{
        list-style: none;
        display: inline-block;
        padding:18px;
     }

     nav ul li{
         float: left;
         margin-top: 20px;
     }

     nav ul li a {
         color: white;
         font-weight: bold;
         text-decoration: none;
         font-size: 20px;
         padding: 18px;
     }

     nav ul li a:hover{
       background-color:chocolate;
     }

   </style>

<nav>
	<ul>
		<li><a href="index.php">Venta</a></li>
		<li><a href="#">Agregar Producto</a></li>
		<li><a href="#">Caja</a></li>
	</ul>
	</nav>
	<br><hr style="color: #b92d2d"><br>

<!-- (A) HEADER 
<table id="company"><tr>
	<td><img src="<?=$this->company[0]?>"></td>
	<td class="right"><?php
		for ($i=2; $i<count($this->company); $i++) { echo "<div>{$this->company[$i]}</div>"; }
	?></td>
</tr></table> -->

<?php

$idventa = $_SESSION["idventa"];

?>
<!--
<table id="company"><tr>
	<td><?=$idventa?></td>
	<td class="right"><?php
		for ($i=2; $i<count($this->company); $i++) { echo "<div>{$this->company[$i]}</div>"; }
	?></td>
</tr></table>
-->

<!-- (B) BILL TO, SHIP TO, INVOICE INFO -->
<div id="bigi">Ventas</div>
<table id="billship"><tr>
	<td>
		<?php foreach ($this->head as $i) {
		echo "<strong>{$i[0]}:</strong> {$i[1]}<br>";} 
		?>
	</td>
	<td>
		<?php foreach ($this->billto as $b) { echo "$b<br>"; } ?>
	</td>
	<!--<td>
		<strong>SHIP TO</strong><br>
		<?php foreach ($this->shipto as $s) { echo "$s<br>"; } ?>
	</td>-->
	
</tr></table>

<!-- (C) ITEMS & TOTALS -->
<table id="items">
	<tr><th>Item</th><th>Cantidad</th><th>Precio</th></tr>
	<?php
	foreach ($this->items as $i) {
		echo "<tr><td><div>{$i[0]}</div>";
		if ($i[1]!="") { echo "<small class='idesc'>$i[1]</small>"; }
		echo "</td><td>{$i[2]}</td><td>{$i[3]}</td><td>{$i[4]}</td></tr>";
	}
	if (count($this->totals)>0) { foreach ($this->totals as $t) {
		echo "<tr class='ttl'><td class='right' colspan='3'>{$t[0]}</td><td>{$t[1]}</td></tr>";
	}}
	?>	
</table>

<!-- (D) NOTES -->
<?php if (count($this->notes)>0) { ?>
<div id="notes"><?php
	foreach ($this->notes as $n) { echo "$n<br>"; }
?></div>
<?php } ?>