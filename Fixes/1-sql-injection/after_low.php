<?php

if( isset( $_REQUEST[ 'Submit' ] ) ) {
    // Get input
    $id = $_GET[ 'id' ];

    switch ($_DVWA['SQLI_DB']) {
        case MYSQL:
            // Prepare the statement
            $stmt = mysqli_prepare($GLOBALS["___mysqli_ston"], "SELECT first_name, last_name FROM users WHERE user_id = ?");

            // Bind the parameter
            mysqli_stmt_bind_param($stmt, 's', $id);

            // Execute the statement
            mysqli_stmt_execute($stmt);

            // Get the results
            $result = mysqli_stmt_get_result($stmt);

            // Get results
            while( $row = mysqli_fetch_assoc( $result ) ) {
                // Get values
                $first = $row["first_name"];
                $last  = $row["last_name"];

                // Feedback for end user
                $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
            }

            mysqli_close($GLOBALS["___mysqli_ston"]);
            break;
        case SQLITE:
            global $sqlite_db_connection;

            $query  = "SELECT first_name, last_name FROM users WHERE user_id = '$id';";
            try {
                    $results = $sqlite_db_connection->query($query);
            } catch (Exception $e) {
                    echo 'Caught exception: ' . $e->getMessage();
                    exit();
            }

            if ($results) {
                    while ($row = $results->fetchArray()) {
                            // Get values
                            $first = $row["first_name"];
                            $last  = $row["last_name"];

                            // Feedback for end user
                            $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
                    }
            } else {
                    echo "Error in fetch ".$sqlite_db->lastErrorMsg();
            }
            break;
    }
}

?>