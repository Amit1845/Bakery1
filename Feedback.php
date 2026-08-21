<?php
    include "header.php";
?>

<!-- contact -->
<section class="contact py-5" id="contact">
    <div class="container">

        <h3 class="title-w3ls text-left text-bl mb-5">Feedback</h3>

        <div class="row mx-sm-0 mx-2">

            <!-- map -->
            <?php /*?>
            <div class="col-lg-6 map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d423286.27404345275%2d118.69191921441556%3d34.02016130939095"
                    allowfullscreen>
                </iframe>
            </div>
            <?php */?>

            <!-- contact form -->
            <div class="col-lg-6 main_grid_contact">

                <div class="form-w3ls p-md-5 p-4" align="center">

                    <h4 class="mb-4 sec-title-w3 let-spa text-bl">
                        Send us a message
                    </h4>

                    <form action="#" method="post">

                        <div class="row">

                            <div class="col-sm-6 form-group pr-sm-1">
                                <input
                                    class="form-control"
                                    type="text"
                                    name="Name"
                                    placeholder="Name"
                                    required>
                            </div>

                            <div class="col-sm-6 form-group pl-sm-1">
                                <input
                                    class="form-control"
                                    type="email"
                                    name="Email"
                                    placeholder="Email"
                                    required>
                            </div>

                        </div>

                        <div class="form-group">
                            <input
                                class="form-control"
                                type="text"
                                name="PhoneNumber"
                                maxlength="10"
                                placeholder="Phone Number"
                                required>
                        </div>

                        <div class="form-group">
                            <textarea
                                name="message"
                                placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="input-group1 text-center">

                            <input
                                type="submit"
                                class="btn"
                                value="Submit"
                                name="fb_submit">

                            <input
                                type="reset"
                                class="btn"
                                value="Cancle"
                                name="fb_cancle">

                        </div>

                    </form>

                </div>

            </div>
            <!-- //contact form -->

        </div>

    </div>
</section>
<!-- //contact -->


<?php

    include "conn.php";

    if (isset($_REQUEST["fb_submit"])) {
        $name  = trim($_REQUEST["Name"] ?? '');
        $email = trim($_REQUEST["Email"] ?? '');
        $phone = trim($_REQUEST["PhoneNumber"] ?? '');
        $msg   = trim($_REQUEST["message"] ?? '');

        if ($name !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && ctype_digit($phone) && $msg !== '') {
            $stmt = mysqli_prepare($con, "INSERT INTO feedback (fb_id, name, email, phone_no, message) VALUES (NULL, ?, ?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "ssis", $name, $email, $phone, $msg);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            echo "<script>window.location='index.php'</script>";
        } else {
            echo "<script>alert('Please fill the form correctly.'); window.location='Feedback.php';</script>";
        }
    }

    include "footer.php";

?>