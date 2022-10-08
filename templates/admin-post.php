<?php
// handle contact form submission and send wp mail to user
if (isset($_POST['txt'])) {
    $username = $_POST['txt'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $subject = 'Contact form submission';
    $body = '<p>' . $message . '</p>';
    wp_mail($email, $subject, $body, $headers);
}
// redirect back to  custom admin contact form page
wp_redirect(admin_url('admin.php?page=custom_chat'));
exit;

?>




