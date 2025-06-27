<?php


include '../../lib/bpconn.php';
include '../../lib/config-details.php';

if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false || strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false) {
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "db_fynd_supplier");
} else {
    define("DBHOST", "localhost");
    define("DBUSER", "thebri46_udr24fyd");
    define("DBPASSWORD", "m5mfutTHUdUg");
    define("DBNAME", "thebri46_fynd_demo");
}

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the search term is passed via GET request
$searchTerm = isset($_GET['q']) ? $_GET['q'] : '';

// Prepare SQL query to search product names based on the input term
$sql = "SELECT product_name, MIN(id) AS id 
        FROM supplier_chemical_list 
        WHERE product_name LIKE '%" . $conn->real_escape_string($searchTerm) . "%'
        GROUP BY product_name
        ORDER BY product_name ASC
        LIMIT 10";  // Limit results to 10 for performance

$result = $conn->query($sql);

$response = array();

// Fetch and prepare results for Select2
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response[] = array(
            "id" => $row['id'],  // The value to use for the selection
            "text" => $row['product_name']  // The text displayed in the dropdown
        );
    }
}

// Return the results as JSON
echo json_encode($response);

// Close the connection
$conn->close();
?>
?>