
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>contact us</title>
  </head>
  <body>
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <nav class="bg-gray-900 text-white p-4">
        <div class="container mx-auto flex justify-between items-center"><!--  it is used for when we go to another page or interface than we use the adress of thatpage in the herf-->
            <a href="#" class="text-xl font-bold">Brand</a>
            <div class="hidden md:flex space-x-6">
                <a href="/RAHUL/trial/trial.php" class="hover:text-gray-400">Home</a>
                <a href="R.HTML" class="hover:text-gray-400">About</a>
                <a href="#" class="hover:text-gray-400">Services</a>
                <a href="#" class="hover:text-gray-400">Contact</a>
            </div>
            <button id="menu-toggle" class="md:hidden">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
        <div id="mobile-menu" class="hidden md:hidden flex flex-col space-y-2 mt-4 bg-gray-800 p-4 rounded-lg">
            <a href="#" class="hover:text-gray-400">Home</a>
            <a href="#" class="hover:text-gray-400">About</a>
            <a href="#" class="hover:text-gray-400">Services</a>
            <a href="#" class="hover:text-gray-400">Contact</a>
        </div>
    </nav>





    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $desc = trim($_POST['desc']);

    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "dkp";

    // Create connection
    $conn = mysqli_connect($server, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    } else {
        echo "Connection was successful";

        // Prepare SQL query to insert data securely
        $sql = "INSERT INTO `contact` (`name`, `email`, `concern`, `dt`) 
                VALUES ('$name', '$email', '$desc', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your entry has been submitted successfully!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
        } else {
            echo "The record was not inserted successfully: " . mysqli_error($conn);
        }
    }
}
?>



<div class="container">
    <h1>Contact us for your concern</h1>
    <form action="/RAHUL/trial/conu.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
            <div class="form-text">We'll never share your name</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="10" cols="50" placeholder="Enter description"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


    <script>
        document.getElementById('menu-toggle').addEventListener('click', function () {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>

    <h1>hello</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    -->
  </body>
</html>







