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
        $i = 0;
        for ($i = 0; $i < 10; $i++)
        {
          echo "<li> Home $i </li>"; 
        }
      ?>
    </ul>
  </body>
</html>