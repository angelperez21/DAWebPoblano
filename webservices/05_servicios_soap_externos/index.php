<link rel="stylesheet" href="css/master.css">
<?php
    require_once "lib/nusoap.php";
    $client = new nusoap_client("http://wsf.cdyne.com/WeatherWS/Weather.asmx?wsdl","wsdl");
    $result = client -> call('GetCityForecastByZIP',array("ZIP"=>"90210"));
    print_r($result);
    $city=$result['GetCityForecastByZIPResult']['City'];
    $state=$result['GetCityForecastByZIPResult']['State'];
    echo "<h1> Pronóstico del tiempo ($ciudad,$state) </h1>";

    $pronosticos = $result['GetCityForecastByZIPResult']['ForecastResult']['Forecast'];

    foreach ($pronosticos as $diaPronostico) {
        $fecha = $diaPronostico['Date'];
        $descripcion = $diaPronostico['Description'];
        $minima = $diaPronostico ['Temperatures']['MorningLow'];
        $maxima = $diaPronostico ['Temperatures']['DaytimeHigh'];
        $fechaAjuste = strtotime($fecha);
        echo '<div class="caja">';
            echo '<div class="fecha"> '.date('d/m/Y',$fechaAjuste).'</div>';
            echo '<div class="descripcion">'.$descripcion.'</div>';
            echo '<div class="maxima"> Maxima: '.$maxima.' °F </div>';
            if(!empty($minima)){
                echo '<div class="minima"> Minima: '.$minima.' °F </div>';
            }
        echo '</div>';
    }
?>
