<?php
// database connectivity....
$localhost="localhost";
$db_username="root";
$password="kathmandu";
$db_name="hungry_hippo";

$conn=mysqli_connect($localhost,$db_username,$password,$db_name);
$query="SELECT * FROM foods;";
$result = mysqli_query($conn,$query);
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
// echo "<pre>";
// var_dump($rows); //to display all contents of rows..
// echo "/<pre>";
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hungry Hippo | Roshan Shrestha</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</head>

<body class="container">
 <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">Hungry Hippo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add-product.php">Add Product</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Contact Us
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="https://Facebook.com">Facebook</a></li>
            <li><a class="dropdown-item" href="https://Instagram.com">Instagram</a></li>
            <li><a class="dropdown-item" href="https://Twitter.com">Twitter</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="container-box">
<?php foreach($rows as $data): ?>
  <div class="content">
    <img src="<?php echo $data["imageURL"];?>">
      <div class="info">
        <h1><?= $data["name"]?></h1>
      For kids:
        <?php if ($data["recommendedForKid"]==1)
        {
          echo '<span class="badge rounded-pills text-bg-success">Recommended</span>';
        }
        else{
          echo '<span class="badge text-bg-danger">Not Recommended</span>';

        }
        ?>
        <br>
        category:
        <h2 style='display: inline;"><?php $data["category"]; ?></h2>
        <h2><?= $data["nutritionInfo"];?></h2>
        <h1>Rs.<?= $data["price"] * 134; ?></h1>
        <button type="button" class="btn btn-warning">Edit</button>
        <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
  <?php endforeach;?>
</div>
  
    
</body>


</html>