<?php
ob_start();
include('Head.php');
?>

<?php
include("../Assets/Connection/connection.php");

//Verify

	if(isset($_GET["update"]))
	{
		$updateQry = "update tbl_locationlender set lender_status = 1 where lender_id='".$_GET["update"]."'";
		if($con->query($updateQry))
		{
			echo "Verification Success";
		}
		else
		{
			echo "Verification Failed";
		}
	}
	
 ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<div class="container mt-4">
        <a href="Homepage.php" class="btn btn-primary mb-4">Home</a>

        <div class="table-responsive">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>SI No</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $selQry = "SELECT * FROM tbl_locationlender WHERE lender_status = 2";
                    $selData = $con->query($selQry);
                    while ($row = $selData->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr>
                            <td><?php echo $i ?></td>
                            <td><?php echo $row["lender_name"] ?></td>
                            <td><?php echo $row["lender_contact"] ?></td>
                            <td><?php echo $row["lender_email"] ?></td>

                            <td>
                                <a href="LocationLenderRejectedList.php?update=<?php echo $row["lender_id"] ?>" class="btn btn-success">Accept</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</html>

<?php
        include('Foot.php');
        ob_flush();
        ?>