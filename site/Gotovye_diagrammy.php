
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Pie Chart</title>
</head>

<body>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
	<script src="21.js"></script>
    <link rel="stylesheet" href="kval.css">
</body>

<center>9 Запрос макса<br>9. Сколько нужно ресурсов на все специальности</center>
	<canvas id="myChart"></canvas>

<?php
$host='localhost';
$user='root';
$password='12345';
$db_name='moon';
$link = mysqli_connect($host,$user ,$password ,$db_name );
mysqli_query($link,"SET NAMES Utf8");

$query="SELECT sum(Protein_norma) as Protein,sum(Oxygen_norma) as Oxygen,sum(Water_norma) as Water FROM specialities";
$res = mysqli_query($link,$query) or die (mysqli_error($link));
$row = mysqli_fetch_array($res);
?>
<script type="text/javascript">
    var a= '<?php echo $row['Protein'];?>';
    var b= '<?php echo $row['Oxygen'];?>';
    var c= '<?php echo $row['Water'];?>';
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        "type":"doughnut","data":{"labels":["Протеин","Кислород","Вода"],
            "datasets":[{"label":"My First Dataset",
                "data":[a,b,c],
                "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)"]}]}});
</script>
<br>
<br>




<center>1 Запрос Светы<br> 1) Вывести количество женщин и мужчин среди экипажа;</center>
<canvas id="myChart1"></canvas>
<script type="text/javascript">
    var result=[];
</script>
<?php
$query="select gender, count(gender) as kolvo from crewmate group by gender;";
$res = mysqli_query($link,$query) or die (mysqli_error($link));

while($row = mysqli_fetch_array($res))

{
?>
    <script type="text/javascript">
    result.push('<?php echo $row['kolvo'];?>');
</script>
    <?php
}
?>

<script type="text/javascript">
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        "type":"pie","data":{"labels":["Женщины","Мужчины"],
            "datasets":[{"label":"Кол-во членов экипажа",
                "data":[result[0],result[1]],
                "backgroundColor":["rgb(139, 0, 139)","rgb(0, 0, 255)"]}]}});

</script>
/*///////////////////////////////////////////////////////////////////////////*/
<br>
<br>
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
    <?php
}
?>
<center>2 Запрос Светы<br> 2) Выводит количество людей в каждой специальности;</center>
<canvas id="myChart2"></canvas>
<script>new Chart(document.getElementById("myChart2"),
        {"type":"bar","data":{"labels":[""],
                "datasets":[
                    {"label":"Командир",
                        "backgroundColor":"rgb(255, 99, 132)",
                     data:[mass[0]]
                      },
                    {"label":"Пилот",
                        "backgroundColor":["rgb(255, 159, 64)"],
                        data:[mass[1]]
                    },
                    {"label":"Специалист миссии","backgroundColor":["rgb(255, 205, 86)"],
                        data:[mass[2]]
                    },
                    {"label":"Бортинженер","backgroundColor":["rgb(75, 192, 192)"],
                        data:[mass[3]]
                    },
                    {"label":"Инженер","backgroundColor":["rgb(54, 162, 235)"],
                        data:[mass[4]]
                    },
                    {"label":"Кислородовод","backgroundColor":["rgb(153, 102, 255)"],
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
<br>




<?php
$query="SELECT(select Sum(Value) FROM electro_storage  WHERE Value>0) Total_amount_of_electro,
(SELECT Sum(Value) FROM oxygen_storage  WHERE Value>0) Total_amount_of_oxygen,
(SELECT Sum(Value) FROM water_storage  WHERE Value>0) Total_amount_of_water,
(SELECT Sum(Value) FROM protein_storage  WHERE Value>0) Total_amount_of_protein;";
$res = mysqli_query($link,$query) or die (mysqli_error($link));
$row = mysqli_fetch_array($res);
?>
<center>1 Запрос Глеба<br> Сумма произведеных ресурсов зза всё время;</center>
<canvas id="myChart3"></canvas>
<script>
    var a= '<?php echo $row['Total_amount_of_electro'];?>';
    var b= '<?php echo $row['Total_amount_of_oxygen'];?>';
    var c= '<?php echo $row['Total_amount_of_water'];?>';
    var d= '<?php echo $row['Total_amount_of_protein'];?>';
    new Chart(document.getElementById("myChart3"),
        {"type":"bar","data":{"labels":[""],
                "datasets":[{"label":"Электроэнергия",
                    "data":[a],
                    "backgroundColor":["rgb(255, 99, 132)"]},
                    {"label":"Кислород",
                        "data":[b],
                        "backgroundColor":["rgb(255, 159, 64)"]},
                    {"label":"Вода",
                        "data":[c],
                        "backgroundColor":["rgb(255, 205, 86)"]},
                    {"label":"Протеины",
                        "data":[d],
                        "backgroundColor":["rgb(75, 192, 192)"]},
                ]},"options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});</script>

<br>
<br>
<?php
$query="select(select Sum(Value) from electro_storage) remaining_electricity,
(select Sum(Value) from oxygen_storage) remaining_oxygen,
(select Sum(Value) from water_storage) remaining_water,
(select Sum(Value) from Protein_storage) remaining_protein;";
$res = mysqli_query($link,$query) or die (mysqli_error($link));
$row = mysqli_fetch_array($res);
?>
<center>9 Запрос Глеба<br> Кол-во оставшихся ресурсов на складе;</center>
<canvas id="myChart4"></canvas>
<script>
    var a= '<?php echo $row['remaining_electricity'];?>';
    var b= '<?php echo $row['remaining_oxygen'];?>';
    var c= '<?php echo $row['remaining_water'];?>';
    var d= '<?php echo $row['remaining_protein'];?>';
    new Chart(document.getElementById("myChart4"),
        {"type":"bar","data":{"labels":[""],
                "datasets":[{"label":"Электроэнергия",
                    "data":[a],
                    "backgroundColor":["rgb(255, 99, 132)"]},
                    {"label":"Кислород",
                        "data":[b],
                        "backgroundColor":["rgb(255, 159, 64)"]},
                    {"label":"Вода",
                        "data":[c],
                        "backgroundColor":["rgb(255, 205, 86)"]},
                    {"label":"Протеины",
                        "data":[d],
                        "backgroundColor":["rgb(75, 192, 192)"]},
                ]},"options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});</script>

<br>
<br>
<?php
$query="WITH cte AS (
select Sum(Value) value
from electro_storage join Protein_energy_consumption on Electro_storage.Id=Protein_energy_consumption.Electro_storage_id
union all
select Sum(Value)
from electro_storage join Water_energy_consumption on Electro_storage.Id=Water_energy_consumption.Electro_storage_id
union all
select Sum(Value)
from electro_storage join Oxygen_energy_consumption on Electro_storage.Id=Oxygen_energy_consumption.Electro_storage_id
),
cte2 as(select Sum(Value) value from water_storage join Water_consumption on water_storage.Id=Water_consumption.Water_storage_id
union all
select Sum(Value) from water_storage join Water_crew_consumption on water_storage.Id=Water_crew_consumption.Water_storage_id)

select (select sum(value)*-1 from cte) Total_amount_of_electro,
(select Sum(Value)*-1 from oxygen_storage join Oxygen_consumption on oxygen_storage.Id=Oxygen_consumption.Oxygen_storage_id) Total_amount_of_oxygen,
(select Sum(Value)*-1 from protein_storage join Protein_crew_consumption on protein_storage.Id=Protein_crew_consumption.Protein_storage_id) Total_amount_of_protein,
(select sum(value)*-1 from cte2) Total_amount_of_water;";
$res = mysqli_query($link,$query) or die (mysqli_error($link));
$row = mysqli_fetch_array($res);
?>
<center>9 Запрос Глеба<br> Кол-во оставшихся ресурсов на складе;</center>
<canvas id="myChart5"></canvas>
<script>
    var a= '<?php echo $row['Total_amount_of_electro'];?>';
    var b= '<?php echo $row['Total_amount_of_oxygen'];?>';
    var c= '<?php echo $row['Total_amount_of_protein'];?>';
    var d= '<?php echo $row['Total_amount_of_water'];?>';
    new Chart(document.getElementById("myChart5"),
        {"type":"pie","data":{"labels":["Электроэнергия","Кислород","Протеины","Вода"],
                "datasets":[{"label":"Кол-во оставшихся ресурсов на складе",
                    "data":[a,b,c,d],
                    "backgroundColor":["rgb(255, 99, 132)","rgb(255, 159, 64)","rgb(255, 205, 86)","rgb(75, 192, 192)"]}]}});</script>

<br>
<center>Запрос Сани<br> Запрос на вывод кол-ва активных установок;</center>

<canvas id="myChart7"></canvas>
<?php

$query="SELECT (select count(electro_engine.value) from electro_engine where active=1 ) as kolvo_electro,
(select count(oxygen_engine.value) from oxygen_engine where active=1) as kolvo_oxygen,
(select count(protein_engine.value) from protein_engine where active=1 ) as kolvo_protein,
count(water_engine.value) as kolvo_water from electro_engine
inner join oxygen_engine on electro_engine.id = oxygen_engine.id
inner join water_engine on electro_engine.id = water_engine.id
inner join protein_engine on electro_engine.id = protein_engine.id
";
$res = mysqli_query($link,$query) or die (mysqli_error($link));
$row = mysqli_fetch_array($res);
?>
<script type="text/javascript">
    var a= '<?php echo $row['kolvo_electro'];?>';
    var b= '<?php echo $row['kolvo_oxygen'];?>';
    var c= '<?php echo $row['kolvo_protein'];?>';
    var d= '<?php echo $row['kolvo_water'];?>';
    var ctx = document.getElementById('myChart7').getContext('2d');
    var chart = new Chart(ctx, {
        "type":"doughnut","data":{"labels":["Эллектро установка","Кислородная установка","Протеиновая установка","Водная установка"],
            "datasets":[{"label":"My First Dataset",
                "data":[a,b,c,d],
                "backgroundColor":["rgb(255, 99, 132)","rgb(54, 162, 235)","rgb(255, 205, 86)","rgb(75, 192, 192)"]}]}});
</script>
<br>
<br>
</html>
