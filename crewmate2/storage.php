<!doctype html>
<html>

    <head>
        <meta charset="utf-8">
        <title>Электричество</title>
        <link rel="stylesheet" type="text/css" href="style_ust.css">
        <link rel="stylesheet" type="text/css" href="style_menu_vklad.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" /></head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <body>

    </head>
        <body>      



                    <div class="vkladka">
                    <button class="tablinks" onclick="openCity(event, 'page1')" id = "defaultOpen">Хранилище электричества</button>
                    <button class="tablinks" onclick="openCity(event, 'page2')">Хранилище кислорода</button>
                    <button class="tablinks" onclick="openCity(event, 'page3')">Хранилище вода</button>
                    <button class="tablinks" onclick="openCity(event, 'page4')">Хранилище протеина</button>
                    </div>
                    
                    <div id="page1" class="soderj_vkladki "><!--ТАБЛИЦА ХРАНИЛИЩЕ ЭЛЕКТ-->
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
                            $host='localhost';
                            $user='root';
                            $password='12345';
                            $db_name='moon';
                            $link = mysqli_connect($host,$user ,$password ,$db_name );
                            mysqli_query($link,"SET NAMES Utf8");   
                            $query = "SELECT * FROM electro_storage;";

                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Значение</center></th>";
                        echo "    <th scope=\"col\"><center>Дата добавления</center></th>";
                        echo "    <th scope=\"col\"><center>Номер установки</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        echo"<tbody id='myTable'>";
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Id']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "<td><center>".$row['Created_at']."</center></td>";
                            echo "<td><center>".$row['Elect_engine_id']."</center></td>";
                            echo "</tr>";
                        }
                        echo"</tbody>";
                        ?>
                          </table>
                         
                        <div class="filtr"><!--ФИЛЬТРЫ-->


                          <div id = "list1">
                            <form action="formdata" method="post" name="form1">
                                <p><select name="list1">
                               
                                <option>Выберите потрибителя</option>
                                <option>Установки кислорода</option>
                                <option>Установки воды</option>
                                <option>Установки протеина</option>
                                </select></p>
                                <p><select name="list1">
                               
                               <option>Выберите номер установки</option>
                               <option>1</option>
                               <option>2</option>
                               <option>3</option>
                               </select></p>
                                <p><input type="submit" value="Применить"></p>

                            </form>
                            
        
                            
                                <form action="formdata" method="post" name="form2">
                                    <p><select name="list2">
                                    <option>Выберите тип работы</option>
                                    <option>Производство</option>
                                    <option>Потребление</option>
                                    </select></p>
                                    <p><input type="submit" value="Применить"></p>
                                </form>
                           
        
        
                               
                                    <form action="formdata" method="post" name="form3">
                                        <p><select name="list3">
                                        <option>Выберите активность</option>
                                        <option>Активные</option>
                                        <option>Неактивные</option>
                                        </select></p>
                                        <p><input type="submit" value="Применить"></p>
                                    </form>
                                
        
                                   
                                    <label for="start" class="tekst">Выберите дату:</label>
    
                                            <div class="data">
                                            <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="1980-01-01" max="2021-12-31"> 
                                                -
                                                <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="2018-01-01" max="2021-12-31">
                                            </div>
                                            <br><p><input type="submit" value="Применить"></p></br>
                                </div>
                            </div>
                    
                    </div>




                    
                    <div id="page2" class="soderj_vkladki "><!--ТАБЛИЦА ХРАНИЛИЩЕ кислорода-->
                    <table class="table table-striped table-dark">
                        <?php
                            $query = "SELECT * FROM oxygen_storage;";
                            echo "<tr>";                           
                            echo "    <th scope=\"col\"><center>№</center></th>";
                            echo "    <th scope=\"col\"><center>Значение</center></th>";
                            echo "    <th scope=\"col\"><center>Дата добавления</center></th>";
                            echo "    <th scope=\"col\"><center>Номер установки</center></th>";
                            echo "</tr>";
                            $res = mysqli_query($link,$query) or die (mysqli_error($link));
                            while($row = mysqli_fetch_array($res))
                            {
                                echo "<tr>";
                                echo "<td><center>".$row['Id']."</center></td>";
                                echo "<td><center>".$row['Value']."</center></td>";
                                echo "<td><center>".$row['Created_at']."</center></td>";
                                echo "<td><center>".$row['Oxygen_Engine_id']."</center></td>";
    
                                echo "</tr>";
                            }?>
                          </table>
                        
                        <div class="filtr"><!--ФИЛЬТРЫ-->


                          <div id = "list1">
                            <form action="formdata" method="post" name="form2">
                                <p><select name="list1">
                               
                                <option>Выберите потрибителя</option>
                                <option>Установки воды</option>
                                </select></p>
                                <p><select name="list1">
                               <option>Выберите номер установки</option>
                               <option>1</option>
                               <option>2</option>
                               <option>3</option>
                               </select></p>
                                <p><input type="submit" value="Применить"></p>

                            </form>
                            
        
                            
                                <form action="formdata" method="post" name="form2">
                                    <p><select name="list2">
                                    <option>Выберите тип работы</option>
                                    <option>Производство</option>
                                    <option>Потребление</option>
                                    </select></p>
                                    <p><input type="submit" value="Применить"></p>
                                </form>
                           
        
        
                               
                                    <form action="formdata" method="post" name="form3">
                                        <p><select name="list3">
                                        <option>Выберите активность</option>
                                        <option>Активные</option>
                                        <option>Неактивные</option>
                                        </select></p>
                                        <p><input type="submit" value="Применить"></p>
                                    </form>
                                
        
                                   
                                    <label for="start" class="tekst">Выберите дату:</label>
        
                                            <div class="data">
                                            <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="1980-01-01" max="2021-12-31"> 
                                                -
                                                <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="2018-01-01" max="2021-12-31">
                                            </div>
                                            <br><p><input type="submit" value="Применить"></p></br>
                                </div>
                            </div>
                    
                    </div>






                    <div id="page3" class="soderj_vkladki "><!--ТАБЛИЦА ХРАНИЛИЩЕ воды-->
                    <table class="table table-striped table-dark">
                        <?php

                        
                        $query = "SELECT * FROM water_storage;";
                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Значение</center></th>";
                        echo "    <th scope=\"col\"><center>Дата добавления</center></th>";
                        echo "    <th scope=\"col\"><center>Номер установки</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Id']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "<td><center>".$row['Created_at']."</center></td>";
                            echo "<td><center>".$row['Water_Engine_id']."</center></td>";

                            echo "</tr>";
                        }?>
                          </table>
                        
                        <div class="filtr"><!--ФИЛЬТРЫ-->


                          <div id = "list1">
                            <form action="formdata" method="post" name="form3">
                                <p><select name="list1">
                               
                                <option>Выберите потрибителя</option>
                                <option>Экипаж</option>
                                <option>Установки протеина</option>
                                </select></p>

                                <p><select name="list1">
                               <option>Выберите номер установки</option>
                               <option>1</option>
                               <option>2</option>
                               <option>3</option>
                               </select></p>
                                <p><input type="submit" value="Применить"></p>

                            </form>
                            
        
                            
                                <form action="formdata" method="post" name="form2">
                                    <p><select name="list2">
                                    <option>Выберите тип работы</option>
                                    <option>Производство</option>
                                    <option>Потребление</option>
                                    </select></p>
                                    <p><input type="submit" value="Применить"></p>
                                </form>
                           
        
        
                               
                                    <form action="formdata" method="post" name="form3">
                                        <p><select name="list3">
                                        <option>Выберите активность</option>
                                        <option>Активные</option>
                                        <option>Неактивные</option>
                                        </select></p>
                                        <p><input type="submit" value="Применить"></p>
                                    </form>
                                
        
                                   
                                    <label for="start" class="tekst">Выберите дату:</label>
        
                                            <div class="data">
                                            <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="1980-01-01" max="2021-12-31"> 
                                                -
                                                <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="2018-01-01" max="2021-12-31">
                                            </div>
                                            <br><p><input type="submit" value="Применить"></p></br>
                                </div>
                            </div>
                    
                    </div>

                    




                    <div id="page4" class="soderj_vkladki "><!--ТАБЛИЦА ХРАНИЛИЩЕ протеина-->
                    <table class="table table-striped table-dark">
                        <?php
                        $query = "SELECT * FROM protein_storage;";
                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Значение</center></th>";
                        echo "    <th scope=\"col\"><center>Дата добавления</center></th>";
                        echo "    <th scope=\"col\"><center>Номер установки</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Id']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "<td><center>".$row['Created_at']."</center></td>";
                            echo "<td><center>".$row['Protein_engine_id']."</center></td>";
                            echo "</tr>";
                        }
                    ?>   

                          </table>
                        
                        <div class="filtr"><!--ФИЛЬТРЫ-->


                          <div id = "list1">
                            <form action="formdata" method="post" name="form4">
                                <p><select name="list1">
                               
                                <option>Выберите потрибителя</option>
                                <option>Экипажы</option>
                                </select></p>
                                
                                <p><select name="list1">
                               <option>Выберите номер установки</option>
                               <option>1</option>
                               <option>2</option>
                               <option>3</option>
                               </select></p>
                                <p><input type="submit" value="Применить"></p>

                               

                            </form>
                            
        
                            
                                <form action="formdata" method="post" name="form2">
                                    <p><select name="list2">
                                    <option>Выберите тип работы</option>
                                    <option>Производство</option>
                                    <option>Потребление</option>
                                    </select></p>
                                    <p><input type="submit" value="Применить"></p>
                                </form>
                               
                                    <form action="formdata" method="post" name="form3">
                                        <p><select name="list3">
                                        <option>Выберите активность</option>
                                        <option>Активные</option>
                                        <option>Неактивные</option>
                                        </select></p>
                                        <p><input type="submit" value="Применить"></p>
                                    </form>
                                
        
                                   
                                    <label for="start" class="tekst">Выберите дату:</label>
        
                                            <div class="data">
                                            <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="1980-01-01" max="2021-12-31"> 
                                                -
                                                <input type="date" id="start" name="trip-start"
                                                value="гггг-мм-дд"
                                                min="2018-01-01" max="2021-12-31">
                                            </div>
                                            <br><p><input type="submit" value="Применить"></p><br>
                                </div>
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
                   
                   
                <div class="vertikalnoe-menuu">
                    <a href="crewmate.php" class="tablinks" ><center>Экипаж</center></a>
                    <a href="ust.php" class="tablinks" ><center>Установки</center></a>
                    <a href="storage.php" class="tablinks"><center>Хранилище</center></a>
                    <a href="storage.php" class="tablinks" ><center>Отчеты</center></a>
                </div>



            </body>
        </body>
    </html>