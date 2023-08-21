
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>line-notify</title>
</head>
<body>
    
<h1>line-notify</h1>

<div class="container">



<form action="<?= site_url('repair_system/repair/notify'); ?>" method="post">



  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>


  <div class="mb-3">
    <label for="fullname" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="fullname" aria-describedby="fullname">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  



  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</body>
</html>
