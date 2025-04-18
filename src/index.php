<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="./output.css" rel="stylesheet">
  <title>MyApp</title>
</head>
<body>
  <div class="flex justify-center items-center h-screen bg-blue-300">
    <div class="w-96 p-6 bg-white rounded-lg shadow-lg">
      <form action="insertdata.php" method="POST">
        <div>
        <input name="Name" type="text" class="border p-2 w-full rounded-md"placeholder="name">
        </div>
     
        <div>
        <br>
        <input  name="Phone" type="tel" class="border p-2 w-full rounded-md" placeholder="phone">
        </div>
        <br>
        <input type ="submit" value="OK" class="bg-blue-500 text-white p-2 w-full rounded-md">
      </form>

     
    </div>
  </div>

  
</body>
</html>
