<?php
//session_start();
//if (!isset($_SESSION['user_id'])) {
//echo '<script type="text/javascript">'
//,'window.location="http://riesgo-academico.test/index.php";'
//,'</script>';
//}
    include_once 'conexion.php';
    $escuela=1;
    $stmt = $conn->prepare("exec SP_Mumest :escuela");
    $stmt->bindParam(':escuela', $escuela); 
    $stmt->setFetchMode(PDO::FETCH_OBJ); 
    $stmt->execute();
    $location = array();
    while( $row = $stmt->fetch())
    {
    $location[$row->Vez]= $row->Numero;
    }
    $vez=1;
    $stmt1 = $conn->prepare("exec SP_EstxSem :vez,:escuela");
    $stmt1->bindParam(':escuela', $escuela); 
    $stmt1->bindParam(':vez', $vez); 
    $stmt1->setFetchMode(PDO::FETCH_OBJ); 
    $location1 = array();
    $sem = array();
    $i=1;
    while($i<=4)
    {
    $stmt1->execute();
    $vez++; 
    while($row1 = $stmt1->fetch()){
    $location1[$i][$row1->Semestre]= $row1->Numero;
    }
    $i++;
    }
    $sem=array_keys(end($location1));

                        
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php
    @include_once('links.php');
    ?>
</head>
<body class="body-fondo">

<?php
@include_once('navbar.php');
?>

<div class="container">
    <h1 class="my-4 font-weight-bold">Alerta Temprana de Alumnos en Riesgo Académico<span id="nombre_usuario"></span></h1>

    <div class="row text-center">
        
        <div class="col col-12 col-md-6 col-lg-3">
            <div class="alert bg-success text-white" role="alert">
                <h2 class="alert-heading font-weight-bold" id="alumnos-3">
                    <?php 
                       if(sizeof($location)<1){
                       echo 0; 
                       }else{echo $location[1];}               
                    ?></h2>
                <p class="small">Llevan un curso por 1° vez durante este ciclo</p>
            </div>
        </div>
        <div class="col col-12 col-md-6 col-lg-3">
            <div class="alert bg-warning text-white" role="alert">
                <h2 class="alert-heading font-weight-bold" id="alumnos-3">
                    <?php 
                        if(sizeof($location)<2){
                       echo 0; 
                       }else{echo $location[2];}
                    ?></h2>
                <p class="small">Llevan un curso por 2° vez durante este ciclo</p>
            </div>
        </div>
        <div class="col col-12 col-md-6 col-lg-3">
            <div class="alert bg-tercero text-white" role="alert">
                <h2 class="alert-heading font-weight-bold" id="alumnos-3">
                    <?php
                       if(sizeof($location)<3){
                       echo 0; 
                       }else{echo $location[3];}
                    ?></h2>
                    <h2 id="tercero"></h2>
                <p class="small" class="nav-item"><a href="estudiante.php#tercero" title="3°vez">Llevan un curso por 3° vez durante este ciclo</a></p> 
            </div>
        </div>
        <div class="col col-12 col-md-6 col-lg-3">
            <div class="alert alert-danger bg-danger text-white" role="alert">
                <h2 class="alert-heading font-weight-bold" id="alumnos-4">
                    <?php
                       if(sizeof($location)<4){
                       echo 0; 
                       }else{echo $location[4];}
                ?></h2>
                <h2 id="4°vez"></h2>
                <p class="small"><a href="estudiante.php#4°vez">Llevan un curso por 4°vez durante este ciclo</a></p>
                
            </div>
        </div>
    </div>

    <div class="my-3 border-primary" id="grafico" style="height: 400px; width: 100%;">
    </div>


</div>

<!--====== Scripts -->
<?php
@include_once('scripts.php');
?>

<script>

    window.onload = function () {

        var chart = new CanvasJS.Chart("grafico", {
            exportEnabled: true,
            animationEnabled: true,
            axisX: {
                title: "Semestres"
            },
            axisY: {
                title: "Cantidad de Alumnos",
                titleFontColor: "#131921",
                lineColor: "#131921",
                labelFontColor: "#131921",
                tickColor: "#131921",
                includeZero: true
            },
            axisY2: {
                title: "Cantidad de Alumnos",
                titleFontColor: "#131921",
                lineColor: "#131921",
                labelFontColor: "#131921",
                tickColor: "#131921",
                includeZero: true
            },
            toolTip: {
                shared: true
            },
            legend: {
                cursor: "pointer",
                itemclick: toggleDataSeries
            },
            data: [{
                type: "column",
                name: "4° vez",
                showInLegend: true,
                color: "#DC3545",
                yValueFormatString: "#,##0.# Units",
                dataPoints: [
                    {label: "<?php echo $sem[4];?>", y: parseInt("<?php echo $location1[4][$sem[4]];?>",10)},
                    {label: "<?php echo $sem[3];?>", y: parseInt("<?php echo $location1[4][$sem[3]];?>",10)},
                    {label: "<?php echo $sem[2];?>", y: parseInt("<?php echo $location1[4][$sem[2]];?>",10)},
                    {label: "<?php echo $sem[1];?>", y: parseInt("<?php echo $location1[4][$sem[1]];?>",10)},
                    {label: "<?php echo $sem[0];?>", y: parseInt("<?php echo $location1[4][$sem[0]];?>",10)}
                ]
            }, {
                type: "column",
                name: "3° vez",
                showInLegend: true,
                color: "#F4511E",
                yValueFormatString: "#,##0.# Units",
                dataPoints: [
                    {label: "<?php echo $sem[4];?>", y: parseInt("<?php echo $location1[3][$sem[4]];?>",10)},
                    {label: "<?php echo $sem[3];?>", y: parseInt("<?php echo $location1[3][$sem[3]];?>",10)},
                    {label: "<?php echo $sem[2];?>", y: parseInt("<?php echo $location1[3][$sem[2]];?>",10)},
                    {label: "<?php echo $sem[1];?>", y: parseInt("<?php echo $location1[3][$sem[1]];?>",10)},
                    {label: "<?php echo $sem[0];?>", y: parseInt("<?php echo $location1[3][$sem[0]];?>",10)}
                ]
            }, {
                type: "column",
                name: "2° vez",
                showInLegend: true,
                color: "#FFC107",
                yValueFormatString: "#,##0.# Units",
                dataPoints: [
                    {label: "<?php echo $sem[4];?>", y: parseInt("<?php echo $location1[2][$sem[4]];?>",10)},
                    {label: "<?php echo $sem[3];?>", y: parseInt("<?php echo $location1[2][$sem[3]];?>",10)},
                    {label: "<?php echo $sem[2];?>", y: parseInt("<?php echo $location1[2][$sem[2]];?>",10)},
                    {label: "<?php echo $sem[1];?>", y: parseInt("<?php echo $location1[2][$sem[1]];?>",10)},
                    {label: "<?php echo $sem[0];?>", y: parseInt("<?php echo $location1[2][$sem[0]];?>",10)}
                ]
            }, {
                type: "column",
                name: "1° vez",
                showInLegend: true,
                color: "#28A745",
                yValueFormatString: "#,##0.# Units",
                dataPoints: [
                    {label: "<?php echo $sem[4];?>", y: parseInt("<?php echo $location1[1][$sem[4]];?>",10)},
                    {label: "<?php echo $sem[3];?>", y: parseInt("<?php echo $location1[1][$sem[3]];?>",10)},
                    {label: "<?php echo $sem[2];?>", y: parseInt("<?php echo $location1[1][$sem[2]];?>",10)},
                    {label: "<?php echo $sem[1];?>", y: parseInt("<?php echo $location1[1][$sem[1]];?>",10)},
                    {label: "<?php echo $sem[0];?>", y: parseInt("<?php echo $location1[1][$sem[0]];?>",10)}
                ]
            }]
        });
        chart.render();

        function toggleDataSeries(e) {
            if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                e.dataSeries.visible = false;
            } else {
                e.dataSeries.visible = true;
            }
            e.chart.render();
        }

    }
</script>

</body>
</html>