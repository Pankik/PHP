<?
//$_POST["Filtr"]='';
$sql = 'SELECT filmy.id, filmy.Imya, Stoimost, Kart, filmzanr.idZanra, zanry.Imya AS ZanrName FROM filmy';
$ar_result = [];
$mysqli = new mysqli('localhost', 'root', '', 'kino');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
if(isset($_POST['Filtr'])&& strlen($_POST['Filtr'])&& isset($_POST['Filtr2'])&& strlen($_POST['Filtr2']))
{
	$F1 = $_POST["Filtr"];
	$F2 = $_POST["Filtr2"];
	$sql.=" JOIN filmzanr ON filmy.id = filmzanr.idFilma
	JOIN zanry ON filmzanr.idZanra = zanry.id
	HAVING filmy.Imya LIKE '%$F1%' and ZanrName LIKE '%$F2%'
	";
}
elseif (isset($_POST['Filtr'])&& strlen($_POST['Filtr'])&& $_POST['Filtr']!='')
{
	$F1 = $_POST["Filtr"];
	$sql .= " JOIN filmzanr ON filmy.id = filmzanr.idFilma
JOIN zanry ON filmzanr.idZanra = zanry.id
HAVING filmy.Imya LIKE '%$F1%'
";
}
elseif (isset($_POST['Filtr2'])&& strlen($_POST['Filtr2'])&& $_POST['Filtr2']!='')
{
$F2 = $_POST["Filtr2"];
$sql .= " JOIN filmzanr ON filmy.id = filmzanr.idFilma
JOIN zanry ON filmzanr.idZanra = zanry.id
HAVING zanry.Imya LIKE '%$F2%'";
}
elseif (isset($_GET['logout'])&& $_GET['logout']='yes')
	{
		$sql = "SELECT filmy.id, filmy.Imya, Stoimost, Kart, filmzanr.idZanra, zanry.Imya AS ZanrName FROM filmy
JOIN filmzanr ON filmy.id = filmzanr.idFilma
JOIN zanry ON filmzanr.idZanra = zanry.id";
	} 
else {
	//$sql = "SELECT id,Imya,Stoimost,Kart,Opisanie,Zanr1 FROM filmy";
	$sql = "SELECT filmy.id, filmy.Imya, Stoimost, Kart, filmzanr.idZanra, zanry.Imya AS ZanrName FROM filmy
	JOIN filmzanr ON filmy.id = filmzanr.idFilma
	JOIN zanry ON filmzanr.idZanra = zanry.id";
}


$result = $mysqli->query($sql, MYSQLI_USE_RESULT);
//$arr_clear = mysqli_fetch_all($result);

while ($row = mysqli_fetch_array($result)){
	
	//$ar_result[] = $row;
	
		
	
	if (!isset ($ar_result[$row['id']]))
	{		
		$ar_result[$row['id']] = $row;
		
	} else {
		$zanr = '';
		//var_dump ($ar_result[$row['id']]['idZanra']);
		$zanr = $ar_result[$row['id']]['ZanrName'] . ', '. $row['ZanrName'];
		$ar_result[$row['id']]['ZanrName'] = $zanr;
		//var_dump ($ar_result[$row['id']]['idZanra']);
		
	} 
	

}	

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Фарго (1996) - всё о фильме</title>
	
	
	
	
	
</head>
<body> 
<style >

p{ color: #C0C0C0;
font-family: Geneva, Arial, Helvetica, sans-serif;
margin-left: -15px; 
font-size: 9pt;  } 
 
p1{ color: #C0C0C0;
font-family: Geneva, Arial, Helvetica, sans-serif;
font-size: 13pt;  }

p2{ color: #C0C0C0;
font-family: Geneva, Arial, Helvetica, sans-serif;
font-weight:bold;
font-size: 15pt;  }

d{ color: #FFFFFF;
font-family: Geneva, Arial, Helvetica, sans-serif;
font-size: 9pt;  
font-weight:bold; }

ex { color: #171717; }

txt { color: #A9A9A9;
font-weight:bold; }

h9{ color: #000000;
font-size: 11pt; }

h8{ color: #000000;
 font-family: Geneva, Arial, Helvetica, sans-serif;
font-size: 11pt; 
font-weight:bold; }

h7{ color: #DCDCDC;
font-size: 10pt; }

h6{ color: #FFFFFF;
font-size: 10pt; }

h5{ color: #ffffff;
font-size: 11pt;
margin-left: -15px; }

h4{ color: #ffffff;
font-weight:bold;
font-size: 11pt; }

h3{ color: #FFFFFF;
font-weight:bold;
font-size: 20pt;
margin-left: 325px; }

h2{ color: #FFFFFF;
font-size: 11pt;
margin-left: 337px; }

h1{ color: #FFFFFF;
font-size: 11pt;
margin-left: 325px; }

t{ margin: 2%;
position: absolute;
top: 50%;
margin-top: -0.625em; }

t1{ position: absolute;
top: 50%;
margin-top: 2em; }

div{ background-color: #171717; }

divL { background-color: #F5F5F5; }

N { color: #F5F5F5; }

I { margin-left: -12px; }

body { background: url(F.jpg); }

CH{ border : 2 px solid  #F5F5F5;}


</style>
  
<div class="container">
  
<div class="row">
<br></br>
</div>
   
<div class="row">
		<div class="col-3"><img src = "logo2.svg" height = "50px" width = "170px"></div>
		<div class="col-7"><form>
                <div class="form-row">
                <div class="col">
                <input type="text" class="form-control" placeholder=Поиск по сайту>
                </div>
                </form></div>
</div>

<div class="col-2"><img src = "logo.svg" height = "40px" width = "170px" ></div>
</div>
<br></br>
</div>

</div>

<div class="container">
   <div class="row "> 
   
   <ul class="nav nav-pills nav-fill">
 <li class="nav-item">
    <a class="nav-link" href="#"><txt>смотреть онлайн</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>афиша</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>что посмотреть</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>подборка</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>главное</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>новости</txt></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#"><txt>знакомства</txt></a>
  </li>
</ul>
   <div class="col-xl-12 col-sm-12"><br></div>

   
		
	</div>
	</div>
</div>

</div>




<div class="container">


<a href='/kotliarov/Page.php?logout=yes'>Очистить фильтр</a>

<p>


<div class="container">
  
  <form method = "POST" action="/kotliarov/Page.php">
  <div class ="mb-3">
  <input class="form-control" id="myInput" name = "Filtr" type="text" placeholder="Фильтр по названию">
  <div id="myDIV"> </div>
  </div>

  <div class ="mb-3">
  <input class="form-control" id="myInput" name = "Filtr2" type="text" placeholder="Фильтр по жанру">
  <div id="myDIV"> </div>
  </div>
  <div class ="mb-3">
  <input class="form-control" type="submit">
  </div>
</form>
</div>

 

<div class="row "> 

<?
foreach ($ar_result as $value){
	echo '<div class="card" style="width: 18rem; background : #171717; border-color : #171717" >
  <img class="card-img-top" src="'. $value[Kart].'" alt="'. $value[Imya].'" width="100" >
  <div class="card-body">
    <h5 class="card-title" >'. $value[Imya].'</h5>
    <p class="card-text" style ="color: #FF0000">'. $value[Stoimost].' руб.</p>
	<p class="card-text"style ="color: #4169E1">'. $value[ZanrName].'</p>
	<p class="card-text">'. $value[Opisanie].'</p>
	
  </div>
</div>
';
	
}
?>

 </div>

















<div class="row">
    
	
	
</div>
   
   
   
   
   
   
   
   
	
<div class="container">
  
<footer class="row row-cols-12 py-4 my-4 border-top">
    <div class="col">
      <a href="/" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      </a>
      
<p class="text-muted"></p>
</div>

<div class="col">
      <ul class="nav flex-column">
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>О проекте</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Контакты</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Вакансии</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Реклама</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Перепечатка</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Лицензионное соглашение</d></a></li>
      </ul>
    </div>

  <div class="col">
</div>

<div class="col-2">
      
      <ul class="nav flex-column">
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Вконтакте</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>OK.RU</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Facebook</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Яндекс Дзен</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Твиттер</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Telegram</d></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Instagram</d></a></li>
      </ul>
    </div>

<div class="col">
</div>
<div class="col-4">

      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"></a></li>
<li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>Film.ru зарегистрирован Федеральной службой по надзору в сфере связи, информационных технологий и массовых коммуникаций (Роскомнадзор).
Свидетельство Эл № ФС77-55131 от 04.09.2013.</d></a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted"></a></li>
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"><d>© 2020 Film.ru — всё о кино, рецензии, обзоры, новости, премьеры фильмов</d></a></li>
      </ul>
    </div>

<div class="col">

<ul class="nav flex-column">
       
        <li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"></a></li>
<li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"></a></li>
<li class="nav-item mb-1"><a href="#" class="nav-link p-0 text-muted"></a></li>
      </ul>
<img src = "18.png" height = "30px" width = "30px">
  
</div>
<div class="col">
</div>
</footer>
</body>
</html>