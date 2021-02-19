
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>2 Запрос</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" /></head>

<body id="bo">
<div id="be">
    <form method="POST" class="form-inline">
        <input type="submit" name="button1" class="btn btn-outline-secondary" value="Экспедиция"><br><br><br>
        <input type="submit" name="button2" class="btn btn-outline-success" value="Эллектро установка"><br><br><br>
        <input type="submit" name="button3" class="btn btn-outline-danger" value="Кислородная установка"><br><br><br>
        <input type="submit" name="button4" class="btn btn-outline-danger" value="Водная установка"><br><br><br>
        <input type="submit" name="button5" class="btn btn-outline-danger" value="Протеиновая установка"><br><br><br>
        <input type="submit" name="button6" class="btn btn-outline-success" value="Эллектро хранилище"><br><br><br>
        <input type="submit" name="button7" class="btn btn-outline-danger" value="Кислородная хранилище"><br><br><br>
        <input type="submit" name="button8" class="btn btn-outline-danger" value="Водная хранилище"><br><br><br>
        <input type="submit" name="button9" class="btn btn-outline-danger" value="Протеиновая хранилище"><br><br><br>
    </form>
</div>

<table width="100%">
    <tr align="center">
        <td align="center">
            <div>
                <table class="table table-striped table-dark">

                    <?php
                    $host='localhost';
                    $user='root';
                    $password='12345';
                    $db_name='moon';
                    $link = mysqli_connect($host,$user ,$password ,$db_name );
                    mysqli_query($link,"SET NAMES Utf8");

                    if(isset($_POST['button1'])){  $query = "select crewmate.Id as id, FirstName,Secondname, Age, Gender,
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
                        }}
                    if(isset($_POST['button2'])){  $query = "SELECT * FROM electro_engine;";

                        echo "<tr>";
                        echo "    <th scope=\"col\"><center>№</center></th>";
                        echo "    <th scope=\"col\"><center>Активность</center></th>";
                        echo "    <th scope=\"col\"><center>Значение</center></th>";
                        echo "</tr>";
                        $res = mysqli_query($link,$query) or die (mysqli_error($link));
                        while($row = mysqli_fetch_array($res))
                        {
                            echo "<tr>";
                            echo "<td><center>".$row['Id']."</center></td>";
                            echo "<td><center>".$row['Active']."</center></td>";
                            echo "<td><center>".$row['Value']."</center></td>";
                            echo "</tr>";
                        }}
                    if(isset($_POST['button3'])){  $query = "SELECT * FROM oxygen_engine;";

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
                        }}
                    if(isset($_POST['button4'])){  $query = "SELECT * FROM water_engine;";

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
                        }}
                    if(isset($_POST['button5'])){  $query = "SELECT * FROM protein_engine;";

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
                        }}
                    if(isset($_POST['button6'])){  $query = "SELECT * FROM electro_storage;";

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
                            echo "<td><center>".$row['Electro_engine_id']."</center></td>";
                            echo "</tr>";
                        }}
                    if(isset($_POST['button7'])){  $query = "SELECT * FROM oxygen_storage;";

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
                        }}
                    if(isset($_POST['button8'])){  $query = "SELECT * FROM water_storage;";

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
                        }}
                    if(isset($_POST['button9'])){  $query = "SELECT * FROM protein_storage;";

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
                        }}
                    ?>
                </table>
            </div>

        </td>
    </tr>
</table>
</body>
</html>