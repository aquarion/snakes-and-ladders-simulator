<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>S&L</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container-fluid">
  <div class="row">

<div class="col-sm-12">
<h1>Advanced Snakes &amp; Ladders Simulator</h1>

<p>Leave a player name empty to limit the number of players</p>
</div>
<form method="POST" action="game.php" class="form-horizontal">

<?PHP 
$players = array(
	1 => "Jools",
	2 => "Jops",
	3 => "Stu",
	4 => "RJ"
);

foreach($players as $index => $player){ ?>
  <div class="form-group">
    <label for="inputPlayer<?PHP echo $index ?>" class="col-sm-2 control-label">Player</label>
    <div class="col-sm-3">
      <input type="text" class="form-control" name="Player[<?PHP echo $index ?>]" id="inputPlayer<?PHP echo $index ?>" placeholder="Player" value="<?PHP echo $player ?>">
    </div>
    <label for="inputAI<?PHP echo $index ?>" class="col-sm-1 control-label">AI Level</label>:
    <div class="col-sm-3">
      <input type="text" class="form-control" id="inputAI<?PHP echo $index ?>" name="AILevel[<?PHP echo $index ?>]" placeholder="AI Level" value="3">
    </div>
  </div>
<?PHP } ?>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Go</button>
    </div>
  </div>
</form>

</div>
</div>
  </body>
</html>
