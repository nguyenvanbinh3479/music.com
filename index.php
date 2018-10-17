<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
  </head>
  <body>
    <ul>
      <?php
        $i = 1;
        for ($i = 1; $i <= 5; $i++)
        {
          switch ($i) 
          {
            case "1": 
              echo "<li> Home </li>";
            break;
            case "2": 
              echo "<li> Musics </li>";
            break;
            case "3": 
              echo "<li> Singers </li>";
            break;
            case "4": 
              echo "<li> Categories </li>";
            break;
            default: 
              echo "<li> Contact </li>";
            break;
          } 
        }
      ?>
    </ul>
  </body>
</html>