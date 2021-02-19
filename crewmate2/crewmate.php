<!doctype html>
<style>
  .diagram{
    position: absolute;
    width: 1500px;
    height: 1500px;
    top: 1200px;
    margin-left: 300px;

  }

  .diagram2{
    position: absolute;
    width: 1500px;
    height: 1500px;
    top: 2200px;
    margin-left: 300px;
  }

  .namet1{
    text-align: center;
  }

.namet2{
    text-align: center;
  }

    .pen {
      width: 35px;
      height: 35px;
      opacity: 0.5;
      background: 0;
      border: 0px;

    }
</style>
<html>

    <head>
        <meta charset="utf-8">
        <title>Экипаж</title>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="style_ust.css"> 
        <link rel="stylesheet" type="text/css" href="style_menu_vklad.css"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
        <body>

            
           <!--ПОдключение-->   
        <?php
                    $host='localhost';
                    $user='root';
        $password='12345';
        $db_name='moon';
                    $link = mysqli_connect($host,$user ,$password ,$db_name );
                    mysqli_query($link,"SET NAMES Utf8");
        ?>
                
                    <!--Список вкладок-->
                    <div class="vkladka">
                    <button class="tablinks" onclick="openCity(event, 'page1')" id = "defaultOpen">Экипаж</button>
                    <button class="tablinks" onclick="openCity(event, 'page2')">Отчеты</button>
                    </div>
                    <!--Первая вкладка-->
                    <div id="page1" class="soderj_vkladki ">
<div class="poisk">
                        <input class="form-control" id="myInput" type="text" placeholder="Поиск...">
</div>
                        <script>
                            $(document).ready(function(){
                                $("#myInput").on("keyup", function() {
                                    var value = $(this).val().toLowerCase();
                                    $("#myTable tr").filter(function() {
                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                    });
                                });
                            });
                        </script>

                        <table class="table table-striped table-dark">


                      <?php
                      $query = "SELECT * FROM crewmate;";

                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Имя</center></th>";
                        echo "    <th scope=\"col\"><center>Фамилия</center></th>";
                        echo "    <th scope=\"col\"><center>Дата рождения</center></th>";
                        echo "    <th scope=\"col\"><center>Пол</center></th>";
                        echo "    <th scope=\"col\"><center>Id Страны</center></th>";
                        echo "    <th scope=\"col\"><center>Id Специальности</center></th>";
                      echo "    <th scope=\"col\"><center></center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                      for ($data = []; $row = mysqli_fetch_assoc($res); $data[] = $row);

                      // Вывод на экран:

                      $result = '';
                      foreach ($data as $elem) {
                          $result .= '<tr>';
                          $result .= '<td><center>' . $elem['Id'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Firstname'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Secondname'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Age'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Gender'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Country_id'] . '</center></td>';
                          $result .= '<td><center>' . $elem['Speciality_id'] . '</center></td>';
                          $result .= '<td><center><button href="?del=' . $elem['Id'] . '" 

                              <a href onclick="openFormUpd()">
                      <img class="pen" src="pencil3t.png">
                    </a>

                          </center></td>';
                            echo "</tr>";
                        }
                      echo"<tbody id='myTable'>";
                      echo $result;
                      echo"</tbody>";
                        ?>


                        </table>

<!--Кнопка добавить-->


                    <button class="open-button-add" onclick="openFormAdd()">Добавить</button>
                    <div class="form-popupAdd" id="myFormAdd">
                      <form class="form-containerAdd">
                          <h1>Добавление</h1>

                          <label><b>Имя</b></label>
                          <input type="text"  name="Firstnames" required >

                          <label><b>Фамилия</b></label>
                          <input type="text"  name="Surnames" required >

                          <label><b>Дата рождения</b></label>
                          <input type="date" placeholder="Введите Дату рождения" name="Date of Birth" required><br>

                          <label><b>Пол</b></label>
                          <select name='Gender' required>
                              <option value="">Введите Пол</option>
                              <option value="1">Female</option>
                              <option value="0">Male</option>
                          </select>
                          <?php


                          echo "<label><b>Страна</b></label>";
                          $query = "SELECT * FROM country;";
                          $result = mysqli_query($link, $query);


                          echo "<select name='Country'>";

                          echo " <option value=''>Введите Страну</option>";

                          while ($row = mysqli_fetch_assoc($result)) {

                              echo "<option value='" . $row['Id'] . "'>" . $row['Name'] . "</option>";

                          }
                          echo "</select>";



                          echo "<label><b>Специальность</b></label>";
                          $query = "SELECT * FROM specialities;";
                          $result = mysqli_query($link, $query);


                          echo "<select name='Spec'>";

                          echo " <option value=''>Введите Специальность</option>";

                          while ($row = mysqli_fetch_assoc($result)) {

                              echo "<option value='" . $row['Id'] . "'>" . $row['Spec_name'] . "</option>";

                          }
                          echo "</select>";

                          ?>

                        <input type="submit" name="button1" class="btn" value="добавить работника">
                          <?php

                          if(isset($_POST['btn'])){

                              $host='localhost';
                              $user='root';
                              $password='12345';
                              $db_name='moon';
                              $link = mysqli_connect($host,$user ,$password ,$db_name );
                              mysqli_query($link,"SET NAMES Utf8");
                              $name = $_POST['Firstnames'];
                              $secondName = $_POST['Surnames'];
                              $datta = $_POST['Date of Birth'];
                              $gender = $_POST['Gender'];
                              $country = $_POST['Country'];
                              $spec = $_POST['Spec'];


                              $query = "INSERT INTO crewmate SET Firstname='$name', Secondname='$secondName', Age='$datta',  Gender='$gender', Country_id='$country', Speciality_id='$spec'";
                              mysqli_query($link, $query);

                              /*Если будете менять название страницы то тут тоже поменяйте */ echo "<script>window.location.replace('crewmate.php')</script>";

                          }

                          ?>
                        <button type="button" class="btn cancel" onclick="closeFormAdd()">Отменить добавление</button>
                      </form>

                    </div>
                <script>
                  function openFormAdd() {
                    document.getElementById("myFormAdd").style.display = "block";
                    }
                  function closeFormAdd() {
                    document.getElementById("myFormAdd").style.display = "none";
                    }
                 </script>

<!---->

<!--Кнопка изменить-->
  <button class="open-button-upd" onclick="window.location.href='editcrew.html'">Изменить</button>


                    <div class="form-popup" id="myFormUpd">
                    <form class="form-containerUpd">
                    <h1>Изменение</h1>
                        <label><b>Имя</b></label>
                        <input type="text"  name="Firstname" required >

                        <label><b>Фамилия</b></label>
                        <input type="text"  name="Surname" required >

                        <label><b>Дата рождения</b></label>
                        <input type="date" placeholder="Введите Дату рождения" name="Date of Birth" required><br>

                        <label><b>Пол</b></label>
                        <select name='Gender' required>
                            <option value="">Введите Пол</option>
                            <option value="1">Female</option>
                            <option value="0">Male</option>
                        </select>
                        <?php


                        echo "<label><b>Страна</b></label>";
                        $query = "SELECT * FROM country;";
                        $result = mysqli_query($link, $query);


                        echo "<select name='Country'>";

                        echo " <option value=''>Введите Страну</option>";

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<option value='" . $row['Id'] . "'>" . $row['Name'] . "</option>";

                        }
                        echo "</select>";



                        echo "<label><b>Специальность</b></label>";
                        $query = "SELECT * FROM specialities;";
                        $result = mysqli_query($link, $query);


                        echo "<select name='Spec'>";

                        echo " <option value=''>Введите Специальность</option>";

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<option value='" . $row['Id'] . "'>" . $row['Spec_name'] . "</option>";

                        }
                        echo "</select>";
                        ?>
                    <button type="submit" class="btn">Изменить данные</button>
                    <button type="button" class="btn cancel" onclick="closeFormUpd()">Отменить изменение</button>
                </form>
                </div>
                <script>
                function openFormUpd() {
                document.getElementById("myFormUpd").style.display = "block";
                }
                function closeFormUpd() {
                document.getElementById("myFormUpd").style.display = "none";
                }
                </script>
<!---->

                    </div>


<!--Вторая вкладка-->
              <div id="page2" class="soderj_vkladki ">

                    <table class="table table-striped table-dark">
                                                <h1 class="namet1">Таблица потребления воды</h1>
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

                <table class="table table-striped table-dark">
                  <h1 class="namet2">Таблица потребления протениа</h1>
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

                    <script>
                    function openCity(evt, cityName) {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("soderj_vkladki ");
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
<!--Меню-->
<div class="vertikalnoe-menuu">
    <a href="crewmate.php" class="tablinks" ><center>Экипаж</center></a>
    <a href="ust.php" class="tablinks" ><center>Установки</center></a>
    <a href="storage.php" class="tablinks"><center>Хранилище</center></a>
    <a href="storage.php" class="tablinks" ><center>Отчеты</center></a>
</div>

        </body>
    </html>