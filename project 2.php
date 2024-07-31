<html>
    <body>
        <table style="width:100%" border="2px">
        <tr>
        <th>id</th>
        <th>firstname</th>
        <th>lastname</th>
        </tr>
        <?php
        for ($i=1;$i<=10;$i++)//$i++ is equivalent to $i=$i+1
        {
            echo $i."<br>";
        }
        

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "courses";

        // Create connection
        $conn = new mysqli($servername, $username, $password,$dbname);

        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        /*/ Create database
        $sql = "CREATE DATABASE courses";
        if ($conn->query($sql) === TRUE){
        echo "Database created successfully";
        } else {
        echo "Error creating database: " . $conn->error;
        }*/

        /*/ sql to create table
        $sql = "CREATE TABLE names(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if ($conn->query($sql) === TRUE) {
            echo "Table names created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }*/

        /*$sql = "INSERT INTO names(firstname, lastname, email)
        VALUES ('khiren', 'patni', 'khirenjain@gmail.com')";

        if ($conn->query($sql) === TRUE) {  
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }*/

        
        $sql = "SELECT id, firstname, lastname FROM names";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
        } else {
        echo "0 results";
        }
      
        $sql = "SELECT id, firstname, lastname FROM names where id='2'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["firstname"] . "</td>";
            echo "<td>" . $row["lastname"] . "</td>";
            echo "</tr>";
        }
        } else {
        echo "<tr><td colspan='3'>0 results</td></tr>";
        }

        $conn->close();
        ?>
        </table>
        
     
    </body>
</html>