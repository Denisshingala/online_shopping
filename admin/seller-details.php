<?php
require('../configuration/config.php');
require('action/auth.php');
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>e-Shop | Admin</title>

    <?php include('utilities/header.php') ?>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include('utilities/navbar.php') ?>

    <main class="d-flex">
        <?php include('utilities/side-navbar.php') ?>

        <div class="p-4">

            <table class="table table-bordered table-responsive table-striped" id="myTable">
                <thead class="text-center">
                    <tr style="background-color: rgb(95, 162, 240);">
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        <th>Company Address</th>
                        <th>GST No.</th>
                        <th>Bank Account No.</th>
                        <th>IFSC code</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include('../configuration/config.php');

                    $sql = "SELECT * FROM seller WHERE status = 'approve'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>
									<td>' . $row['company_name'] . '</td>
									<td>' . $row['email'] . '</td>
									<td>' . $row['contact_number'] . '</td>
									<td>' . $row['company_address'] . '</td>
									<td>' . $row['gst_number'] . '</td>
									<td>' . $row['account_number'] . '</td>
									<td>' . $row['IFSC_code'] . '</td>
								</tr>';
                        }
                    }
                    ?>
                </tbody>
            </table>

        </div>

    </main>

    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

<?php include('utilities/datatable.php') ?>

</html>