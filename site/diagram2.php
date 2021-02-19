
<script type="text/javascript">
    var mass=[];
</script>

<?php
$query="SELECT Spec_name, count(C.id) as kolvo FROM moon.crewmate C
JOIN specialities S on S.id = C.Speciality_id
group by S.id;";
$res = mysqli_query($link,$query) or die (mysqli_error($link));

while($row = mysqli_fetch_array($res))
{
?>
    <script type="text/javascript">
        mass.push('<?php echo $row['kolvo'];?>');
    </script>
    <?php }?>

<canvas id="myChart2"></canvas>
<script>new Chart(document.getElementById("myChart2"),
        {"type":"bar","data":{"labels":[""],
                "datasets":[
                    {"label":"Командир",
                        "backgroundColor":"rgb(255, 99, 132)",
                     data:[mass[0]]
                      },+
                    {"label":"Пилот",
                        "backgroundColor":["rgb(255, 159, 64)"],
                        data:[mass[1]]
                    },
                    {"label":"Специалист миссий","backgroundColor":["rgb(255, 205, 86)"],
                        data:[mass[2]]
                    },
                    {"label":"Бортинженер","backgroundColor":["rgb(75, 192, 192)"],
                        data:[mass[3]]
                    },
                    {"label":"Инженер","backgroundColor":["rgb(54, 162, 235)"],
                        data:[mass[4]]
                    },
                    {"label":"Мастер кислородовод","backgroundColor":["rgb(153, 102, 255)"],
                        data:[mass[5]]
                    },
                    {"label":"Протеинолог","backgroundColor":["rgb(201, 203, 207)"],
                        data:[mass[6]]
                    },
                    {"label":"Электрик","backgroundColor":["rgb(139, 0, 0)"],
                        data:[mass[7]]
                    },
                    {"label":"Гидролог","backgroundColor":["rgb(0, 100, 0)"],
                        data:[mass[8]]
                    }]},"options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});</script>
<br>
