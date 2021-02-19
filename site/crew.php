<!DOCTYPE html> 
<html>

<title>Crewmates</title>
<meta charset="UTF-8">

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">




  <?php
$host='localhost';
$user='root';
$password='12345';
$db_name='moon';
$link = mysqli_connect($host,$user ,$password ,$db_name );
?>



<style>
  body{
background-color: ;

}
</style>


<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
    position: absolute;
    left: 750px;
    top: 200px;
    overflow: hidden;
    border: 8px solid #ccc;
    background-color: #f1f1f1;
    width: 600px;
    text-align: center;
}

/* Style the buttons inside the tab */
.tab button {

    background-color: inherit;
    float: center;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    border-top: none;
    position: absolute;
    position: center;
    top: 300px;
    left: 350px;
    width: 1500px;
}


</style>

<style>

 .outall{
position: absolute;
  top: 250px;
  left:1450px;
 }

 .table1{


 }

 .table1 table,th,td{
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
  position: center;
 }
  .table1 th,td{
    padding: 15px;
  }

    .table2{

    }

   .table2 table,th,td{
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
 }
  .table2 th,td{
    padding: 15px;
  }


</style>

<style>
  .CrewB{
    position: absolute;
    top: 350px;
  }

  .EnergyB{
    position: absolute;
    top: 400px;
  }

  .OxygenB{
    position: absolute;
    top: 450px;
  }

  .WaterB{
    position: absolute;
    top:500px;
  }

  .ProteinB{
    position: absolute;
    top: 550px;
  }


  .pencil{
    position: absolute;
    top: -250px;
    width: 25px;
    height: 25px;
  }

  .edit{
    position: absolute;
    top: 500px;
    left: 1800px;
  }
</style>

<style>
  .diagram{
    position: absolute;
    width: 500px;
    height: 500px;
    top: 400px;
    left: -470px;

  }

  .diagram2{
    position: absolute;
    width: 500px;
    height: 500px;
    top: 700px;
    left: -470px;
  }

</style>

<head>

</head>	

<body>

   <div class="outall"> 
       <button onclick="(location.href='addcrew.php')">Добавить члена экипажа</button>
  </div>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'Tables')" id = "defaultOpen">Таблица</button>
  <button class="tablinks" onclick="openCity(event, 'Otch')">Отчеты</button>
</div>


<div id="Tables" class="tabcontent">
      <div class="table1">    
      <?php
    /*Если будете менять название страницы то тут тоже поменяйте */ //echo 
   // "<script>window.location.replace('crew.php')</script>";

        ?>
    <table align="center" class="table table-bordered table-dark">
     <?php
       $query = "select crewmate.Id as id, FirstName,Secondname, Age, Gender,
    country.name as Country, specialities.Spec_name as specialitie from crewmate
    join country on crewmate.country_id = country.id
    join specialities on crewmate.speciality_id = specialities.id
    order by crewmate.id;";
        echo "<tr>";
        echo "    <th scope=\"col\"><center>№</center></th>";
        echo "    <th scope=\"col\"><center>Имя</center></th>";
        echo "    <th scope=\"col\"><center>Фамилия</center></th>";
        echo "    <th scope=\"col\"><center>Дата рождения</center></th>";
        echo "    <th scope=\"col\"><center>Пол</center></th>";
        echo "    <th scope=\"col\"><center>Страны</center></th>";
        echo "    <th scope=\"col\"><center>Специальности</center></th>";
        echo "</tr>";
        $res = mysqli_query($link,$query) or die (mysqli_error($link));
        while($row = mysqli_fetch_array($res))
        {
            echo "<tr>";
            echo "<td><center>".$row['id']."</center></td>";
            echo "<td><center>".$row['FirstName']."</center></td>";
            echo "<td><center>".$row['Secondname']."</center></td>";
            echo "<td><center>".$row['Age']."</center></td>";
            echo "<td><center>".$row['Gender']."</center></td>";
            echo "<td><center>".$row['Country']."</center></td>";
            echo "<td><center>".$row['specialitie']."</center></td>";
            echo "</tr>";
        }
        ?>
    </table>
  </div>
</div>

<div id="Otch" class="tabcontent">
      <div class="table2">

                <table class="table table-striped table-dark">
                  <?php
                    $host='localhost';
                    $user='root';
                    $password='12345';
                    $db_name='moon';
                    $link = mysqli_connect($host,$user ,$password ,$db_name );
                    mysqli_query($link,"SET NAMES Utf8");

              $query = "select Water_storage_id, Crewmate_id, firstname, Value
                from water_crew_consumption, Crewmate, water_storage
                where crewmate.id = Crewmate_id and water_crew_consumption.Water_storage_id = Water_storage.id
                order by firstname;";

                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>Номер водной установки</center></th>";
                        echo "    <th scope=\"col\"><center>Id члена экипажа</center></th>";
                        echo "    <th scope=\"col\"><center>Имя</center></th>";
                        echo "    <th scope=\"col\"><center>Потребление</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Water_storage_id']."</center></td>";
                            echo "<td><center>".$row['Crewmate_id']."</center></td>";
                            echo "<td><center>".$row['firstname']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";

                            echo "</tr>";
                        }
                    ?>
                       
                     </table>

 </style>
                <table class="table table-striped table-dark">
                  <?php
                    $query = "SELECT protein_storage_id, crewmate_id, firstname, Value
                  from protein_crew_consumption, Crewmate, protein_storage
                    where Crewmate.id = Crewmate_id AND protein_crew_consumption.Protein_storage_id = protein_storage.id
                    order by firstname";

                        echo "<tr>";
                        echo "<th scope=\"col\"><center>Номер протеиновой установки</center></th>";
                        echo "<th scope=\"col\"><center>Id члена экипажа</center></th>";
                        echo "<th scope=\"col\"><center>Имя</center></th>";
                        echo "<th scope=\"col\"><center>Потребление</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['protein_storage_id']."</center></td>";
                            echo "<td><center>".$row['crewmate_id']."</center></td>";
                            echo "<td><center>".$row['firstname']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "</tr>";
                        } 
                    ?>
                  </table>
    </div>


  <div class = "diagram">
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

</script> </div>



<div class="diagram2">
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
                    }]},"options":{"scales":{"yAxes":[{"ticks":{"beginAtZero":true}}]}}});
              </script>
          </div>

      </div>

    </div>
  </div>
</div>

<div class ="edit">
  <a href="editcrew.html">
    <img src="pencil.png" class="pencil">
  </a>
</div>


<div class = "CrewB">
  <button style="width: 150px;">Экипаж</button>
</div>

<div class="EnergyB">
  <button  style="width: 150px;">Электроэнергия</button>
</div>

<div class="OxygenB">
  <button  style="width: 150px;">Кислород</button>
</div>

<div class="WaterB">
  <button  style="width: 150px;">Вода</button>
</div>

<div class="ProteinB">
  <button  style="width: 150px;">Протеин</button>
</div>

<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
    document.getElementById("defaultOpen").click();
</script>











</body>
</html>