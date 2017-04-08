<?php include("connecting.php"); ?>
<?php
if (isset($_POST['action'])) {
        $co = new connecting();
        $conn = $co->get_connection();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            return;
        }

        $sql = 'UPDATE queue SET status="';
        $sql = $sql . $_POST['action'];
        $sql = $sql . '" WHERE ticket_num="';
        $sql = $sql . $_POST['ticket_num'];
        $sql = $sql . '"';

        if ($conn->query($sql) === TRUE) {
            $conn->close();
            exit;
        } else {
            die("Error during update: " . $conn->error);
            return;
    }
}
?>
