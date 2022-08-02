<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>Test Task</title>

</head>

<body>
  <?php include view_path() . '/partials/navbar.php'; ?>

  <div class="container">
    {{content}}
  </div>

  <footer class="my-3 fixed-bottom">
    <div class="container">
      <hr>
      <h5 class="text-center">Scandiweb Test Task</h5>
    </div>
  </footer>

</body>

</html>