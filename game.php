<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Advanced Snakes & Ladders Simulator X</title>

    <!-- Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<style type="text/css">
.good {
	color: darkgreen;
}

.bad {
	color: red;
}
</style>

  </head>
  <body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?PHP

class Game {
	var $players;

	var $board = array (
	'1' => null,
	'2' => null,
	'3' => null,
	'4' => 14,
	'5' => null,
	'6' => null,
	'7' => null,
	'8' => null,
	'9' => 31,
	'10' => null,
	'11' => null,
	'12' => null,
	'13' => null,
	'14' => null,
	'15' => null,
	'16' => null,
	'17' => 7,
	'18' => null,
	'19' => null,
	'20' => 38,
	'21' => null,
	'22' => null,
	'23' => null,
	'24' => null,
	'25' => null,
	'26' => null,
	'27' => null,
	'28' => 84,
	'29' => null,
	'30' => null,
	'31' => null,
	'32' => null,
	'33' => null,
	'34' => null,
	'35' => null,
	'36' => null,
	'37' => null,
	'38' => null,
	'39' => null,
	'40' => 59,
	'41' => null,
	'42' => null,
	'43' => null,
	'44' => null,
	'45' => null,
	'46' => null,
	'47' => null,
	'48' => null,
	'49' => null,
	'50' => null,
	'51' => 67,
	'52' => null,
	'53' => null,
	'54' => 34,
	'55' => null,
	'56' => null,
	'57' => null,
	'58' => null,
	'59' => null,
	'60' => null,
	'61' => null,
	'62' => 19,
	'63' => 81,
	'64' => 60,
	'65' => null,
	'66' => null,
	'67' => null,
	'68' => null,
	'69' => null,
	'70' => null,
	'71' => 91,
	'72' => null,
	'73' => null,
	'74' => null,
	'75' => null,
	'76' => null,
	'77' => null,
	'78' => null,
	'79' => null,
	'80' => null,
	'81' => null,
	'82' => null,
	'83' => null,
	'84' => null,
	'85' => null,
	'86' => null,
	'87' => 24,
	'88' => null,
	'89' => null,
	'90' => null,
	'91' => null,
	'92' => null,
	'93' => 73,
	'94' => null,
	'95' => 76,
	'96' => null,
	'97' => null,
	'98' => null,
	'99' => 78,
	'100' => null
);
	function __construct($players = false){

		if(!$players){
			$this->players = array(
				new Player("jools", 5),
				new Player("jops",  3),
				new Player("stu",   3),
				new Player("rj",    3),
			);
		} else {
			$this->players = $players;
		}
	}


	function play(){
		$this->output("good", "Let the game begin!");
		$round = 0;
		while (true){
		$round++;
		$this->output("state", "Round $round begins!");
		foreach ($this->players as &$player){
			//$this->output("state", $player->name." is on square ".$player->square);
			$player->turn($this);
			if($player->has_won){
				$this->output("good", $player->name." wins!");
				foreach ($this->players as &$player){
					if($player->ai_level > 3){
						if($player->has_won){
							$this->output("good", $player->name." is happy");
						} else {
							$this->output("bad", $player->name." is sad");
						}
					}
				}
				return;
			}
		}
		}
	}

	function output($type, $out){
		print "<li class=\"".$type."\">$out</li>\n";
	}
}

class Player {

	var $name;
	var $square;
	var $has_won = false;
	var $ai_level;

	function __construct($name, $ai_level){
		$this->name = $name;
		$this->ai_level = $ai_level;
		$this->square = 1;
	}

	function turn($game){
		$roll = rand(1, 6);
		$game->output("roll", $this->name." rolls a ".$roll);
		$this->square += $roll;
		if ($this->square > count($game->board)){
			$neg = $this->square - 100;
			$s = $neg == 1 ? '' : 's';
			$game->output("bad", $this->name." bounces off the top square $neg place$s!");
			$this->square = 100 - $neg;
		}

		if ($this->square == count($game->board)){
			$this->has_won = true;
			return;
		} 
		$game->output("roll", $this->name." is on square ".$this->square);
		if($game->board[$this->square] !== NULL){
			$end = $game->board[$this->square];
			if ($end > $this->square){
				$game->output("good", $this->name." climbs a ladder to square ".$end);
			} else {
				$game->output("bad", $this->name." slips down a snake to ".$end);
			}
			$this->square = $end;
		}		
	}

}

$players = array();
foreach($_POST['Player'] as $index => $name){
	if($name){
		$players[] = new Player($name, $_POST['AILevel'][$index]);
	}
}

$game = new Game($players);
echo "<ul>";
$game->play();
echo "<li><a href=\"/\">Play Again</a>";
echo "</ul>";
?>

  </body>
</html>
