<?php
    require_once "php/conexion.php";
    $conexion = conexion();
    $sql = "SELECT nombre,cantidad from detalle_pedido";
    $result = mysqli_query($conexion,$sql);

    $valoresY = array();
    $valoresX = array();

    while ($ver = mysqli_fetch_row($result)) {
        $valoresY[] = $ver[1]; //nombre
        $valoresX[] = $ver[0]; //cantidad
    }

    $datosX = json_encode($valoresX);
    $datosY = json_encode($valoresY);
    
?>

<div id="graficaLineal"></div>

    <script type="text/javascript">

        function crearCadenaLineal(json){
            var parsed = JSON.parse(json);
            var arr = [];
            for (var x in parsed) {
                arr.push(parsed[x]);
            }

            return arr;
        }

    </script>



<script type="text/javascript">

datosX = crearCadenaLineal('<?php echo $datosX; ?>');
datosY = crearCadenaLineal('<?php echo $datosY; ?>');

var trace1 = {
    x: datosX,
    y: datosY,
    type: 'scatter',
    line: {
        color: '#CC6645',
        width: 2
    },
    marker: {
        color: '#CC6645',
        size: 12
    }
}

var layout = {
    title: 'Cantidad de Bebidas/Alimentos Vendidos',
    xaxis: {
        title: 'Nombre Bebida/Alimento Vendidos'
    },
    yaxis: {
        title: 'Cantidad Vendida'
    }
};

var data = [trace1];

Plotly.newPlot('graficaLineal', data, layout);
</script>




</script>