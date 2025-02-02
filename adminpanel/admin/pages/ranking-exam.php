<?php
// Include PHPMailer's autoload files (assuming you have PHPMailer correctly set up)
require 'PHPMailer-master/PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'drinxy87@gmail.com';  // Your Gmail address
        $mail->Password = 'kzzo hxzr tteg xncu';  // Your Gmail app password
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('drinxy87@gmail.com', 'Unextify');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br($message);  // Convert newlines to <br> in HTML
        $mail->AltBody = $message;  // Plain text version of the email

        // Send the email
        if ($mail->send()) {
            $response = "Message has been sent.";
        }
    } catch (Exception $e) {
        $response = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
</head>
<body>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <!-- Page Title for Mail Notifications -->
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div><b class="text-primary">MAIL NOTIFICATIONS</b></div>
                    </div>
                </div>
            </div>

            <!-- Content for Mail Notifications Form -->
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">Send Email Notifications</div>
                    <div class="table-responsive">
                        <!-- Form for email notification -->
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Recipient Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="Recipient Email">
                            </div>
                            <div class="form-group">
                                <label for="subject">Subject:</label>
                                <input type="text" class="form-control" id="subject" name="subject" required placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <label for="message">Message:</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Notification</button>
                        </form>

                        <!-- Response from PHP if needed -->
                        <?php if (!empty($response)): ?>
                            <div class="mt-3">
                                <p class="text-center"><?= htmlspecialchars($response) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
