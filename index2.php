<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <link rel="stylesheet" href="bootstrap-4.0.0-dist/css/bootstrap.min.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css"  href="https://fonts.googleapis.com/css?family=Tangerine">
    <title>Document</title>
    <head>

      <title>Hello World </title>
   </head>
   
   <body>
   <header>
   <h1> <img src="./logo/autocollants-real-madrid-14-champions-league.jpg" alt="logo"><p>welcome in  no barca nghits</p> </h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>
    <table  class="table table-bordered"  style = "width :40rem; ">
  <thead>
    <tr>
      <th scope="col">team name</th>
      <th scope="col">results</th>
      <th scope="col">team name</th>
    </tr>
  </thead>
  <tbody>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <tr>
      <td scope="row">  Real madrid</td>
      <td> <img id="img" src="./logo/el blancos logo.png" alt="logo"><input type="number"  name="club1Gol">  vs   <input type="number"  name="club2Gol"><img id="img" src="./logo/leipzig.png" alt="logo">   <input type ="submit" class="btn btn-success"></td>

      <td>RB leipzig</td>
    </tr>
    </form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <tr>
      <td scope="row"> chakhtior donestk</td>
      <td><img id="img" src="./logo/shakhtar logo.png" alt="logo"><input type="number"  name="club1Gol" >vs<input type="number"   name="club2Gol"><img id="img" src="./logo/celtic logo.png" alt="logo"> <input type ="submit" class="btn btn-success"> </td>
      <td>celtic</td>
    </tr>
    </form>
    
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <tr>
      <td scope="row"> Real madrid</td>
      <td><img id="img" src="./logo/el blancos logo.png" alt="logo"><input type="number"  name="club1Gol">vs<input type="number"  name="club2Gol"><img id="img" src="./logo/celtic logo.png" alt="logo"><input type ="submit" class="btn btn-success"></td>
      <td>celtic</td>
    </tr>
    </form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <tr>
      <td scope="row">  RB leipzig</td>
      <td><img id="img" src="./logo/leipzig.png" alt="logo"><input type="number"  name="club1Gol">vs<input type="number"  name="club2Gol"><img id="img" src="./logo/shakhtar logo.png" alt="logo"><input type ="submit" class="btn btn-success"></td>
      <td>   chakhtior donestk</td>
    </tr>
</form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <tr>
      <td scope="row"> Real madrid</td>
      <td><img id="img" src="./logo/el blancos logo.png" alt="logo"><input type="number"  name="club1Gol">vs<input type="number"  name="club2Gol"><img id="img" src="./logo/shakhtar logo.png" alt="logo"><input type ="submit" class="btn btn-success"></td>
      <td> chakhtior donestk</td>
    </tr>
</form>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <tr>
      <td scope="row">  RB leipzig</td>
      <td><img id="img" src="./logo/leipzig.png" alt="logo"><input type="number"  name="club1Gol">vs<input type="number"  name="club2Gol"><img id="img" src="./logo/celtic logo.png" alt="logo"><input type ="submit" class="btn btn-success"></td>
      <td>   celtic</td>
    </tr>
</form>

  </tbody>
</table>
<!-- <<input type ="submit" class="btn btn-success"> -->


    

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get input field value
    $goals_scored= htmlspecialchars($_REQUEST['club1Gol']);
    $goals_received = htmlspecialchars($_REQUEST['club2Gol']);


   
  

    class Club
    {
        public $name;
        public $played;
        public $won;
        public $drawn;
        public $lost;
        public $points;
        public $goals_scored;
        public $goals_received;
        public $goals;
    
        public function __construct($name)
        {
            $this->name = $name;
            $this->played = 0;
            $this->won = 0;
            $this->drawn = 0;
            $this->lost = 0;
            $this->points = 0;
            $this->goals_scored = 0;
            $this->goals_received = 0;
            $this->goals = 0;
        }
    
        public function addResult( $goals_scored, $goals_received)
        {
             $this->played++;
             $this->goals_scored += $goals_scored;
             $this->goals_received += $goals_received;
             $this->goals = $this->goals_scored - $this->goals_received;
            
             if($this->goals_scored > $this->goals_received){
                 $this->won++;
                 $this->points+= 3;
             } elseif ($this->goals_scored === $this->goals_received) {
                 $this->drawn++;
                 $this->points++;
             } else {
                 $this->lost++;
             }
        }
        
    }



    
    $clubs = [
        new Club('RMA'),
        new Club('CHD'),
        new Club('RLB'),
        new Club('CIL')
    ];
    
     // Add results for RMA vs RLB
     $clubs[0]->addResult($goals_scored, $goals_received);
     $clubs[2]->addResult($goals_received, $goals_scored);
    
     // Add results for SHD vs CIL
     $clubs[1]->addResult($goals_scored, $goals_received);
     $clubs[3]->addResult( $goals_received, $goals_scored);
    
    
    
     // Add results for RMA vs CIL
     $clubs[0]->addResult($goals_scored, $goals_received);
     $clubs[3]->addResult($goals_received, $goals_scored);
    
     // Add results for RLB vs SHD
     $clubs[2]->addResult($goals_scored, $goals_received);
     $clubs[1]->addResult($goals_received, $goals_scored);
    
    // Add results for RMA vs CHD
     $clubs[0]->addResult($goals_scored, $goals_received);
     $clubs[1]->addResult($goals_received, $goals_scored);
    
     // Add results for RLB vs CIL
     $clubs[2]->addResult($goals_scored, $goals_received);
     $clubs[3]->addResult($goals_received, $goals_scored);
    
    
    
    // Sort clubs by points goals a
    
    usort($clubs, function ($a, $b) {
        return $b->points - $a->points;
    });
    
    usort($clubs, function ($a, $b) {
        return $b->goals - $a->goals;
    });
    usort($clubs, function ($a, $b) {
        return $b->goals_scored - $a->goals_scored;
    }); 
    
    
    // Print table of results
    echo '<table class="table">';
    echo '<tr>';
    echo '<th>Club</th>';
    echo '<th> MP</th>';
    echo '<th>W</th>';
    echo '<th>D</th>';
    echo '<th>L</th>';
    echo '<th>GS</th>';
    echo '<th>GR</th>';
    echo '<th>+/-</th>';
    echo '<th>Pts</th>';
    echo '</tr>';
    foreach ($clubs as $club) {
        echo '<tr>';
        echo '<td>' . $club->name . '</td>';
        echo '<td>' . $club->played . '</td>';
        echo '<td>' . $club->won . '</td>';
        echo '<td>' . $club->drawn . '</td>';
        echo '<td>' . $club->lost . '</td>';
        echo '<td>' . $club->goals_scored . '</td>';
        echo '<td>' . $club->goals_received . '</td>';
        echo '<td>' . $club->goals. '</td>';
        echo '<td>' . $club->points . '</td>';}
       
        
    }




?> 
    
   </body>

</html>