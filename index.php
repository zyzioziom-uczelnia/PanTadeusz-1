<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pan Tadeusz, czyli ostatni zajazd na Litwie</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
</head>
<body class="container">

		<h1 class="text-center">Pan Tadeusz, czyli ostatni zajazd na Litwie</h1>
		<h2 class="text-center">Historia szlachecka z roku 1811 i 1812 we dwunastu ksiegach wierszem</h2>
		<div class"row">
      <div id="menu">

			<ul class="nav nav-pills">

        <?php
          for ($i=1; $i <= 12; $i++) {
            $book = $i;
            if ($book == $_GET[book]) {
              echo '<li role="presentation" class="active"><a href="index.php?book='.$i.'">Księga '.rome($i).'</a>';
            } else {
              echo '<li role="presentation"><a href="index.php?book='.$i.'">Księga '.rome($i).'</a>';
            }
          }
        ?>

			</ul>
		  </div>
			</div>
      <div class="row">
        <div class="col-md-6 panel panel-default">
          <div class="panel-body">
            <h1>Refleksje</h1>

            <form action="index.php" method="post">
            Tytuł: <input type="text" name="title"><br>
            Treść: <input type="text" name="reflection"><br>
            <input type="submit" value="Dodaj refleksję" class="btn btn-primary">
            </form>
            <hr/>
            <?php include 'database.php'; ?>


          </div>
        </div>
		    <div class="col-md-6 panel panel-default">
          <div class="panel-body">
    			  <?php
              $book = './k'.$_GET[book].'.html';
              require_once($book);
            ?>
          </div>
		  </div>
		</div>
	</body>
</html>

<?php
function rome($N){
    $c='IVXLCDM';
    for($a=5,$b=$s='';$N;$b++,$a^=7)
        for($o=$N%$a,$N=$N/$a^0;$o--;$s=$c[$o>2?$b+$N-($N&=-2)+$o=1:$b].$s);
    return $s;
}
?>
