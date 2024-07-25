<?php
require('../../config.php');
require_once($CFG->libdir.'/formslib.php');
require_once('classes/form/registration_form.php');

$PAGE->set_url(new moodle_url('/local/registration/index.php'));
$PAGE->set_context(context_system::instance());
$PAGE->set_title('User Registration');

$mform = new local_registration\form\registration_form();

if ($mform->is_cancelled()) {
    // Handle form cancel operation, if cancel button is present on form
} else if ($data = $mform->get_data()) {
    // Process validated data. Here, you can insert data into the temp table and send a verification email.
    
    // Generate temporary password
    $temp_password = random_string(8);
    
    // Insert into the database
    $DB->insert_record('local_registration_temp', array(
        'email' => $data->email,
        'name' => $data->name,
        'surname' => $data->surname,
        'country' => $data->country,
        'mobile' => $data->mobile,
        'temp_password' => hash('sha256', $temp_password),
        'verified' => 0
    ));
    
    // Send email
    $subject = "Email Verification";
    $message = "Your temporary password is: $temp_password. Click here to verify: [link]";
    email_to_user($data->email, $subject, $message);

    echo $OUTPUT->notification('Please check your email for the verification link.', 'notifysuccess');
} else {
    // Display the form
    echo $OUTPUT->header();
    $mform->display();
    echo $OUTPUT->footer();
}
