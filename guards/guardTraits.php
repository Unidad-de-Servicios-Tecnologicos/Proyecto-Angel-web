<?php

trait guardTraits
{

  public function startSession()
  {

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
  }

  public function notAnAdminHTML()
  {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
    </head>

    <body>

      <h2>Ingreso no permitido</h2>
    </body>

    </html>
    <?php
  }

  public function notPermittedHTML($bool, $text)
  {
    if (!$bool) {

    ?>

      <!DOCTYPE html>
      <html lang="en">

      <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
      </head>

      <body>
        <h2><?php echo $text ?? ""; ?></h2>
      </body>

      </html>
<?php
      die();
    }
  }
}

class UseGuardTrait
{
  use guardTraits;
}
