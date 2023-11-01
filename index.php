<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" media="screen" rel='stylesheet' href="css/style.css">
    <script src="js/script.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <script> const data = "<?php echo $List; ?>";</script>
</head>

<body>

    <header>
        <nav class="navbar">
            <img src="img/espas_logo.svg" alt="espas logo" class="espas_logo">
            <div class="currentDate">
                <div class="todayDate"></div>
                <div class="timeNow"></div>
            </div>
        </nav>
    </header>

    <main>
       <div class="nav-buttons">
            <button class="buttons" id="button1">Button 1</button>
            <button class="buttons" id="button2">Button 2</button>
            <button class="buttons" id="button3">Button 3</button>
        </div>

        <?php

        // Daten für die infinite_scroll Liste auslesen
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "call_report";

        // Verbindung zur MySQL-Datenbank herstellen
        $conn = new mysqli($servername, $username, $password, $dbname);

        // SQL Query
        $sql = "SELECT SubscriberName, DialledNumber, CallDuration, Time, Date, CallType, Type FROM callaccounting";
        $result = $conn->query($sql);

        // HTML für eine scrolling list
        echo '<div class="infinite_scrolling_list_container">';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Nummer</th>';
        echo '<th scope="col">Datum</th>';
        echo '<th scope="col">Uhrzeit</th>';
        echo '<th scope="col">Aus/Eingehende Anrufe</th>';
        echo '<th scope="col">Anruflänge</th>';
        echo '<th scope="col">Angenommen/verpasst</th>';
        echo '</tr>';  
        echo '</thead>';
        echo '<tbody">';

        if (mysqli_num_rows($result) > 0) {
            // output der query
            while($row = mysqli_fetch_assoc($result)) {
            echo '<tr>'. '<td>'. $row["SubscriberName"]. "</td>". '<td>'. $row["DialledNumber"]. "</td>". '<td>'. $row["CallDuration"]. "</td>".'<td>'. $row["Time"]. "</td>". '<td>'. $row["Date"]. "</td>". '<td>'. $row["CallType"]. "</td>". '<td>'. $row["Type"]. '</td>'. "</tr>";
            }
        } else {
            echo "0 results";
        }
        
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        

        $conn->close();
        ?>
        <!--Container für die Labels der Daten und der Liste

        <div class="infinite_scrolling_list_container">
            <div class="infinite_scrolling_list">
                <ul>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                    <li>item</li>
                </ul>
            </div>

        </div> -->

    </main>

</body>

</html>