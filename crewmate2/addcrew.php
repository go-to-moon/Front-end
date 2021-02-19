<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<title>Добавление в экипаж</title>



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


</head>


<style>
	.name{
		position: absolute;
		top: 50px;
		left: 470px;
		border: 1px solid black;
		padding:0 10px;

	}


	.save{
		position: absolute;
		top: 550px;
		left: 565px;
	}

	.cancel{
		position: absolute;
		top: 600px;
		left:553px;
	}

	.moreimage{
		position: absolute;
		width: 25px;
	}


	.backimg{
		width: 55px;
		height: 55px;
	}


	.form-inline{
		position: absolute;
		top: 250px;
		left: 150px;
		
	}
</style>

<body>

	<div class = "name">
		<h1>Добавление данных</h1>
	</div>

    <form action="" method="POST">
	<button class="save"  name="submit" value="GO">Добавить данные </button>
	</form>

    <button class="cancel" onclick="location.href = 'crew.php';">Отменить добавление </button>


	<div class="back">
		<a href="crew.php"> 
		<img src="back.png" class="backimg"> 
        </a>
	</div>



	<form class="form-inline"0000="" action="" method="POST">
    <input type="text"  class="form-control" placeholder="Введите Имя" name="imyaf">
    <input type="text"  class="form-control" placeholder="Введите Фамилию" name="secondName">
    <input type="date"   class="form-control" placeholder="Введите Дату рождения" name="datta">

    <select id="record-status" class="form-control" name="gender">
        <option value="">Пол</option>
        <option value="Female">Female</option>
        <option value="Male">Male</option>
    </select>
    <?php
    $host='localhost';
    $user='root';
    $password='12345';
    $db_name='moon';
    $link = mysqli_connect($host,$user ,$password ,$db_name );


    $query = "SELECT * FROM country;";
    $result = mysqli_query($link, $query);


    echo "<select id='record-status' class='form-control' name='country'>";

           echo " <option value=''>Введите Страну</option>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<option value='" . $row['Id'] . "'>" . $row['Name'] . "</option>";

    }
    echo "</select>";

    $query = "SELECT * FROM specialities;";
    $result = mysqli_query($link, $query);

    echo "<select id='record-status' class='form-control' name='spec'>";

    echo " <option value=''>Введите Специальность</option>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<option value='" . $row['Id'] . "'>" . $row['Spec_name'] . "</option>";

    }
    echo "</select>";
    ?>



<div id="motek">

     <?php

        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $secondName = $_POST['secondName'];
            $datta = $_POST['datta'];
            $gender = $_POST['gender'];
            $country = $_POST['country'];
            $spec = $_POST['spec'];

            $query = "INSERT INTO crewmate SET Firstname='$name', Secondname='$secondName', Age='$datta',  Gender='$gender', Country_id='$country', Speciality_id='$spec'";
            mysqli_query($link, $query);

    /*Если будете менять название страницы то тут тоже поменяйте */
     echo "<script>window.location.replace('addcrew.php')</script>";
            }
    ?>
</div>

    

<script>
function myFunction() {
  var txt;
  var r = confirm("Удалить?");
  if (r == true) {
    txt = "Удалено";
    //Код удаления данных из crewmate 
  } else {
    txt = "Изменения отменены";
  }
  document.getElementById("demo").innerHTML = txt;

}
</script>

</body>
</html>