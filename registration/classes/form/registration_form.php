<?php
namespace local_registration\form;

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

class registration_form extends \moodleform {
    public function definition() {
        $mform = $this->_form;

        // Add form elements
        $mform->addElement('text', 'email', get_string('email'));
        $mform->setType('email', PARAM_NOTAGS);
        $mform->addRule('email', null, 'required', null, 'client');
        $mform->addRule('email', null, 'email', null, 'client');

        $mform->addElement('text', 'name', get_string('name'));
        $mform->setType('name', PARAM_NOTAGS);
        $mform->addRule('name', null, 'required', null, 'client');

        $mform->addElement('text', 'surname', get_string('surname'));
        $mform->setType('surname', PARAM_NOTAGS);
        $mform->addRule('surname', null, 'required', null, 'client');

        $mform->addElement('text', 'country', get_string('country'));
        $mform->setType('country', PARAM_NOTAGS);
        $mform->addRule('country', null, 'required', null, 'client');

        $mform->addElement('text', 'mobile', get_string('mobile'));
        $mform->setType('mobile', PARAM_NOTAGS);
        $mform->addRule('mobile', null, 'required', null, 'client');

        $this->add_action_buttons(true, get_string('submit'));
    }

    // Custom validation should be added here
    function validation($data, $files) {
        return array();
    }
}
