<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="homestyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/
    css2?family=Ubuntu:wght@500&display=swap" rel="stylesheet">
    <title></title>
</head>
<body dir="ltr">
    <!-- php partion -->
    <?php
    //connect to database
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'schoolstudents';
    $conn = mysqli_connect($host, $user, $pass, $db);
    $res = mysqli_query($conn, "select * from students");
    // button variabls
    $id = '';
    $name = '';
    $country = '';
    $email = '';
    $phone = '';
    $age = '';
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    }
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['country'])) {
        $country = $_POST['country'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['age'])) {
        $age = $_POST['age'];
    }
    $sqls = '';
    if (isset($_POST['add'])) {
        $sqls = "insert into students values($id,'$name','$country','$email',$phone,$age)";
        mysqli_query($conn, $sqls);
        // header("refresh:0");
        header("location:/SchoolProject/home.php");
        exit();
    }
    if (isset($_POST["del"])) {
        $sqls = "delete from students where id= '$id' ";
        mysqli_query($conn, $sqls);
        header("refresh:0");
        // header("location:home.php");
    }
    ?>
    <div id="m">
        <form method='POST'>
            <!-- Controll -->
            <aside>
                <div id="div">
                    <img src="./harvard.png" alt="Picture" width="200">
                    <h3> HARVARD UNIVERSITY </h3>
                    <label> Student Id</label><br>
                    <input type="text" name='id' id='id'><br>
                    <label>Student Name</label><br>
                    <input type="text" name='name' id='name'><br>
                    <label>Student Country</label><br>
                    <input type="text" name='country' id='country'><br>
                    <label>Student Email</label><br>
                    <input type="text" name='email' id='email'><br>
                    <label>Phone Number</label><br>
                    <input type="text" name='phone' id='phone'><br>
                    <label>Student Age</label><br>
                    <input type="text" name='age' id='age'><br>
                    <button name='add'>Add Student</button>
                    <button name='del'>Delete Student</button>
                </div>
            </aside>

            <!-- Data Show-->
            <main>
                <table id='tbl'>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>country</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>age</th>
                    </tr>
            <?php
                while ($row = mysqli_fetch_array($res)) {
                    echo "<tr>";
                    echo "<td id='tdd' style='color: white;'>" . $row["id"] . "</td>";
                    echo "<td id='tdd' style='color: white;'>" . $row["name"] . "</td>";
                    echo "<td id='tdd' style='color: white;'>" . $row["country"] . "</td>";
                    echo "<td id='tdd' style='color: white;'>" . $row["email"] . "</td>";
                    echo "<td id='tdd' style='color: white;'>" . $row["phone"] . "</td>";
                    echo "<td id='tdd' style='color: white;'>" . $row["age"] . "</td>";
                    echo "</tr>";

                }
            ?>
                </table>
            </main>
        </form>
    </div>
</body>

</html>