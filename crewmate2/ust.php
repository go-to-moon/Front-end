<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Электричество</title>
        <link rel="stylesheet" type="text/css" href="style_ust.css">
        <link rel="stylesheet" type="text/css" href="style_menu_vklad.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="/path/to/script.js"></script>
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
                    <button class="tablinks" onclick="openCity(event, 'page1')" id = "defaultOpen">Установки электричество</button>
                    <button class="tablinks" onclick="openCity(event, 'page2')">Установки кислород</button>
                    <button class="tablinks" onclick="openCity(event, 'page3')">Установки вода</button>
                    <button class="tablinks" onclick="openCity(event, 'page4')">Установки протеин</button>
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
                      $query = "SELECT * FROM electro_engine;";

                      echo "<tr>";
                      echo "    <th scope=\"col\"><center>№</center></th>";
                      echo "    <th scope=\"col\"><center>Активность</center></th>";
                      echo "    <th scope=\"col\"><center>Значение</center></th>";
                      echo "</tr>";
                      $res = mysqli_query($link,$query) or die (mysqli_error($link));
                      echo"<tbody id='myTable'>";
                      while($row = mysqli_fetch_array($res))
                      {
                          echo "<tr>";
                          echo "<td><center>".$row['Id']."</center></td>";
                          echo "<td><center>".$row['Active']."</center></td>";
                          echo "<td><center>".$row['Value']."</center></td>";
                          echo "</tr>";
                      }
                      echo"</tbody>";
                      ?>


                        </table>

                        <div class="filtr">
                          <div id = "list1">
                              <form action="formdata" method="post" name="form1">
                              <p><select name="list1">
                              <option>Выберите активность</option>
                              <option>Активные</option>
                              <option>Неактивные</option>
                              </select></p>
                              </form>
                          </div>
                      </div>
                      </div>

<!--Кнопка добавить-->



                    <button class="open-button-add" onclick="openFormAdd()">Добавить установку</button>
                    <div class="form-popupAdd" id="myFormAdd">
                      <form action="/action_page.php" class="form-containerAdd">
                        <h1>Добавление</h1>
                    
                        <label for="act"><b>Активность</b></label>
                        <input type="text" placeholder="1 или 0" name="act" required>
                    
                        <label for="val"><b>Значение</b></label>
                        <input type="text"  name="val" required>
                    
                        <button type="button" class="btn" onclick="login.html">Добавить установку</button>
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

<!--Кнопка изменить-->
<button class="open-button-upd" onclick="openFormUpd()">Изменить установку</button>
<div class="form-popup" id="myFormUpd">
  <form action="/action_page.php" class="form-containerUpd">
    <h1>Изменение</h1>
    <label for="id"><b>Номер установки</b></label>
    <input type="text"  name="id" required>

    <label for="act"><b>Активность</b></label>
    <input type="text" placeholder="1 или 0" name="act" required>

    <label for="val"><b>Значение</b></label>
    <input type="text"  name="val" required>

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


                    </div>


<!--Вторая вкладка-->
                    <div id="page2" class="soderj_vkladki ">
                    <table class="table table-striped table-dark">
                        

                        <?php
                        $query = "SELECT * FROM oxygen_engine;";

                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Активность</center></th>";
                        echo "    <th scope=\"col\"><center>Значение</center></th>";
                        echo "    <th scope=\"col\"><center>Потребление электроэнерии</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Id']."</center></td>";
                            echo "<td><center>".$row['Active']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "<td><center>".$row['Power_consumption']."</center></td>";

                            echo "</tr>";
                        }
  
                        ?>
  
  
                          </table>

                        <div class="filtr">
                          <div id = "list1">
                              <form action="formdata" method="post" name="form1">
                              <p><select name="list1">
                              <option>Выберите активность</option>
                              <option>Активные</option>
                              <option>Неактивные</option>
                              </select></p>
                              </form>
                          </div>
                      </div>

<!--Кнопка добавить-->
                    <button class="open-button-add" onclick="openFormAdd()">Добавить установку</button>
                    <div class="form-popupAdd" id="myFormAdd">
                      <form action="/action_page.php" class="form-containerAdd">
                        <h1>Добавление</h1>
                    
                        <label for="act"><b>Активность</b></label>
                        <input type="text" placeholder="1 или 0" name="act" required>
                    
                        <label for="val"><b>Значение</b></label>
                        <input type="text"  name="val" required>
                    
                        <button type="submit" class="btn">Добавить установку</button>
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

<!--Кнопка изменить-->
<button class="open-button-upd" onclick="openFormUpd()">Изменить установку</button>
<div class="form-popup" id="myFormUpd">
  <form action="/action_page.php" class="form-containerUpd">
    <h1>Изменение</h1>
    <label for="id"><b>Номер установки</b></label>
    <input type="text"  name="id" required>

    <label for="act"><b>Активность</b></label>
    <input type="text" placeholder="1 или 0" name="act" required>

    <label for="val"><b>Значение</b></label>
    <input type="text"  name="val" required>

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

                    </div>
<!--Третья вкладка-->
                    <div id="page3" class="soderj_vkladki ">


                    <table class="table table-striped table-dark">
                        

                        <?php
                       $query = "SELECT * FROM water_engine;";

                       echo "<tr>";
                       echo "    <th scope=\"col\"><center>№</center></th>";
                       echo "    <th scope=\"col\"><center>Активность</center></th>";
                       echo "    <th scope=\"col\"><center>Производимость</center></th>";
                       echo "    <th scope=\"col\"><center>Потребление электроэнерии</center></th>";
                       echo "    <th scope=\"col\"><center>Потребление кислорода</center></th>";
                       echo "</tr>";
                       $res = mysqli_query($link,$query) or die (mysqli_error($link));
                       while($row = mysqli_fetch_array($res))
                       {
                           echo "<tr>";
                           echo "<td><center>".$row['Id']."</center></td>";
                           echo "<td><center>".$row['Active']."</center></td>";
                           echo "<td><center>".$row['Value']."</center></td>";
                           echo "<td><center>".$row['Power_consumption']."</center></td>";
                           echo "<td><center>".$row['Oxygen_consumption']."</center></td>";

                           echo "</tr>";
                       }
  
                        ?>
  
  
                          </table>


                        <div class="filtr">
                          <div id = "list1">
                              <form action="formdata" method="post" name="form1">
                              <p><select name="list1">
                              <option>Выберите активность</option>
                              <option>Активные</option>
                              <option>Неактивные</option>
                              </select></p>
                              </form>
                          </div>
                      </div>

<!--Кнопка добавить-->
                    <button class="open-button-add" onclick="openFormAdd()">Добавить установку</button>
                    <div class="form-popupAdd" id="myFormAdd">
                      <form action="/action_page.php" class="form-containerAdd">
                        <h1>Добавление</h1>
                    
                        <label for="act"><b>Активность</b></label>
                        <input type="text" placeholder="1 или 0" name="act" required>
                    
                        <label for="val"><b>Значение</b></label>
                        <input type="text"  name="val" required>
                    
                        <button type="submit" class="btn">Добавить установку</button>
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

<!--Кнопка изменить-->
<button class="open-button-upd" onclick="openFormUpd()">Изменить установку</button>
<div class="form-popup" id="myFormUpd">
  <form action="/action_page.php" class="form-containerUpd">
    <h1>Изменение</h1>
    <label for="id"><b>Номер установки</b></label>
    <input type="text"  name="id" required>

    <label for="act"><b>Активность</b></label>
    <input type="text" placeholder="1 или 0" name="act" required>

    <label for="val"><b>Значение</b></label>
    <input type="text"  name="val" required>

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


                    </div>
<!--Четвертая вкладка-->
                    <div id="page4" class="soderj_vkladki ">

                    <table class="table table-striped table-dark">
                        

                        <?php
                       $query = "SELECT * FROM protein_engine;";

                       echo "<tr>";
                       echo "    <th scope=\"col\"><center>№</center></th>";
                       echo "    <th scope=\"col\"><center>Активность</center></th>";
                       echo "    <th scope=\"col\"><center>Производимость</center></th>";
                       echo "    <th scope=\"col\"><center>Потребление электроэнерии</center></th>";
                       echo "    <th scope=\"col\"><center>Потребление воды</center></th>";
                       echo "</tr>";
                       $res = mysqli_query($link,$query) or die (mysqli_error($link));
                       while($row = mysqli_fetch_array($res))
                       {
                           echo "<tr>";
                           echo "<td><center>".$row['Id']."</center></td>";
                           echo "<td><center>".$row['Active']."</center></td>";
                           echo "<td><center>".$row['Value']."</center></td>";
                           echo "<td><center>".$row['Power_consumption']."</center></td>";
                           echo "<td><center>".$row['Water_consumption']."</center></td>";

                           echo "</tr>";
                       }
  
                        ?>
  
  
                          </table>

                        <div class="filtr">
                          <div id = "list1">
                              <form action="formdata" method="post" name="form1">
                              <p><select name="list1">
                              <option>Выберите активность</option>
                              <option>Активные</option>
                              <option>Неактивные</option>
                              </select></p>
                              </form>
                          </div>
                      </div>

<!--Кнопка добавить-->
                    <button class="open-button-add" onclick="openFormAdd()">Добавить установку</button>
                    <div class="form-popupAdd" id="myFormAdd">
                      <form action="/action_page.php" class="form-containerAdd">
                        <h1>Добавление</h1>
                    
                        <label for="act"><b>Активность</b></label>
                        <input type="text" placeholder="1 или 0" name="act" required>
                    
                        <label for="val"><b>Значение</b></label>
                        <input type="text"  name="val" required>
                    
                        <button type="submit" class="btn">Добавить установку</button>
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

<!--Кнопка изменить-->
<button class="open-button-upd" onclick="openFormUpd()">Изменить установку</button>
<div class="form-popup" id="myFormUpd">
  <form action="/action_page.php" class="form-containerUpd">
    <h1>Изменение</h1>
    <label for="id"><b>Номер установки</b></label>
    <input type="text"  name="id" required>

    <label for="act"><b>Активность</b></label>
    <input type="text" placeholder="1 или 0" name="act" required>

    <label for="val"><b>Значение</b></label>
    <input type="text"  name="val" required>

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