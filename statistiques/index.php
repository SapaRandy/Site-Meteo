<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Statistiques du site</title>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="../img/favicon.png"/>
        <link rel='stylesheet' type='text/css' href='style.css'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato"> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script> 
        <script src="https://kit.fontawesome.com/931699da95.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <div class="m-logo">
                <a id="logo" href="../index.php">
                    <h1><i class="fas fa-meteor"></i> Météo²</h1>
                </a>
            </div>
            <div class="m-right">
                <p>by Stambouli Rayan & Sapa Randy</p>
            </div>
        </header>

        <div class="stats">
            <?php 
                // Lecture du fichier villes_consultees.txt pour le graphique
                $file = fopen('data/villes_consultees.txt', 'r'); 
    
                $stats= array(); 
                while ($line = fgets($file)) { 
                    array_push($stats, $line);  
                } 
            
                $a = array_count_values($stats);
                arsort($a);

                $i = 0;
                foreach ($a as $key => $value) 
                    if ($i < 5) {
                    $i++;
                }

                fclose($file);
            ?>
            <div class="graph">
                <p style="font-size: 35px; border-bottom: solid 2px white; padding-bottom: 2%;"><i class="fas fa-chart-pie"></i> Statistiques :</p>
                <?php 
                    $visites = file_get_contents('data/visiteurs.txt');
                    echo '<p style="font-size: 18px;"><i style="color: #F4511E;" class="fas fa-calculator"></i>&nbsp; Total de visiteurs : <strong>' . $visites . '</strong></p>';
                ?>
                <canvas id="myChart"></canvas> 
                <script>
                    aDatasets1 = [<?php foreach ($a as $key => $value) { echo $value . ',' ; } ?>];  
                    var ctx = document.getElementById("myChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [<?php 
                                $label = '';
                                $i = 0; $len = count($a); 
                                foreach ($a as $key => $value) { 
                                    if ($i == 5) {
                                        break ;
                                    }
                                    if ($i == $len - 1) { 
                                        $text = '"' . $key . '"';   
                                    } else {
                                        $text = '"' . $key . '",';
                                    }
                                    $label = $label . $text ;
                                    $i++;
                                } 
                                $label = str_replace(array("\r", "\n"), '', $label);
                                echo $label;
                            ?> ],
                            datasets: [
                            {
                                  label: 'Nb de visites ',
                                  fill:false,
                                data: aDatasets1,
                                backgroundColor: '#9e9e9e',
                                borderColor: [
                                    'black',
                                    'black',
                                    'black',
                                    'black',
                                    'black',
                                    'black',
                                ],
                                borderWidth: 3
                            },
                            ]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            },
                            title: {
                                display: true,
                                text: 'Villes consultées'
                            },
                            responsive: true,
                            
                           tooltips: {
                                callbacks: {
                                    labelColor: function(tooltipItem, chart) {
                                        return {
                                            borderColor: 'black',
                                            backgroundColor: '#9e9e9e'
                                        }
                                    }
                                }
                            },
                            legend: {
                                labels: {
                                    fontColor: 'white', 
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </body>
</html>