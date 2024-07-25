<?php
require('../../config.php');

$email = required_param('email', PARAM_EMAIL);
$temp_password = required_param('temp_password', PARAM_RAW);

$record = $DB->get_record('local_registration_temp', array('email' => $email, 'temp_password' => hash('sha256', $temp_password), 'verified' => 0));

if ($record) {
    // Mark as verified
    $record->verified = 1;
    $DB->update_record('local_registration_temp', $record);

    // Create user in main user table
    $user = new stdClass();
    $user->username = $email;
    $user->password = hash_internal_user_password($temp_password);
    $user->firstname = $record->name;
    $user->lastname = $record->surname;
    $user->email = $email;
    $user->confirmed = 1;

    $DB->insert_record('user', $user);

    // Force password change on first login
    // (Moodle usually handles this via user settings)

    echo "Verification successful. Please log in using your temporary password and change it immediately.";
} else {
    echo "Verification failed.";
}
