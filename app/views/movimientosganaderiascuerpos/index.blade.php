<div class="row">

	<legend>Movimiento Ganaderia Cuerpo</legend>

	
	<?php

		$movimientosganaderia = Movimientosganaderia::find($id);
		$movimientosganaderiascuerpos = DB::table('movimientosganaderiascuerpos')->where('movimientosganaderias_id', "=",$id)->get();
		

		if (count($movimientosganaderiascuerpos)>0 )  {

			echo "
	<table class='table table-striped m-b-none text-sm'>
		";
			echo "
		<thead>
			<tr>
				<th><div class='text-left'>Producto</div></th>
				<th><div class='text-left'>Caravana</div></th>
				<th><div class='text-right'>Kilos</div></th>
				<th><div class='text-left'>Observaciones</div></th>
				<th>Accion</th>
			</tr>
		</thead>

		<tbody>
			";

			$kilos_total = 0;

			foreach ($movimientosganaderiascuerpos as $movimientosganaderiascuerpo)
			{
				echo "<tr>";
					
			        echo "<td><div class='text-left'>";
						$producto = Producto::find($movimientosganaderiascuerpo->productos_id);
						echo $producto->producto;
			        echo "</td>";

					echo "<td><div class='text-left'>";
			        	echo $movimientosganaderiascuerpo->caravana;
			        echo "</div></td>";


					echo "<td><div class='text-right'>";
			        	echo $movimientosganaderiascuerpo->kilos;
			        echo "</div></td>";


			        $kilos_total += $movimientosganaderiascuerpo->kilos;

					echo "<td><div class='text-left'>";
			        	echo $movimientosganaderiascuerpo->observaciones;
			        echo "</div></td>";			        


			        echo "<td>";
			        if ($movimientosganaderia->estado == 'abierto') {
			        	echo "<a href='/movimientosganaderiascuerpos/" . $movimientosganaderiascuerpo->id . "/borrar' class='btn btn-xs btn-success'>Borrar</a> ";	
			        } else {
			        	echo "ya procesado";
			        }
					
			        echo "</td>";

			    echo "</tr>";
			}




				echo "
				<tr>
					<td></td>
					<td></td>
					<td><div class='text-right'>";
						echo number_format($kilos_total,2);
						echo "</div>
					</td>
					<td></td>
					<td></td>";

			    echo "</tr>";


			echo "</tbody>";
			echo "</table>";



		}


	?>
</div>
