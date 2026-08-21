<?php
session_start();

if(isset($_SESSION["ad_session"]))
{
    include("header.php");
    include("../conn.php");

    $result = mysqli_query($con, "SELECT * FROM feedback");
?>

<section class="w3ls-bnrbtm py-5" id="about">
    <div class="container py-xl-5 py-lg-3">
        <div class="row pb-5">
            <div class="col-lg-12">

<?php

    echo "<center>";
    echo "<h1>Feedback Data</h1>";
    echo "<br>";

    if($result)
    {
        echo "<table border='3' cellpadding='10' cellspacing='0'>";

        echo "<tr>";
        echo "<th>Feedback ID</th>";
        echo "<th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Phone No</th>";
        echo "<th>Message</th>";
        echo "<th>Delete</th>";
        echo "</tr>";

        while($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>";

            echo "<td>".htmlspecialchars($row['fb_id'])."</td>";
            echo "<td>".htmlspecialchars($row['name'])."</td>";
            echo "<td>".htmlspecialchars($row['email'])."</td>";
            echo "<td>".htmlspecialchars($row['phone_no'])."</td>";
            echo "<td>".htmlspecialchars($row['message'])."</td>";

            echo "<td>
                    <a href='FeedbackDelete.php?id=".$row['fb_id']."'>
                        Delete
                    </a>
                  </td>";

            echo "</tr>";
        }

        echo "</table>";
    }
    else
    {
        echo "Error: ".mysqli_error($con);
    }

    echo "</center>";

?>

            </div>
        </div>
    </div>
</section>

<?php
    include("footer.php");
}
else
{
    echo "<script>window.location='Login.php';</script>";
}
?>