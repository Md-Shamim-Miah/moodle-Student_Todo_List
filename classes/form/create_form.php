<?php
require_once("$CFG->libdir/formslib.php");

class create_form extends moodleform {

    protected $data;

    // /**
    //  * Constructor.
    //  */
    public function __construct($actionurl, $data = null) {
        $this->data = $data;
        print_r($actionurl);
        parent::__construct($actionurl);
    }

    //Add elements to form
    public function definition() {
        global $CFG;
        $mform = $this->_form;
        
        // Add form elements

        
        $mform->addElement('text', 'name', 'Name');
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', 'Please enter a name', 'required', null, 'client');

        $mform->addElement('text', 'roll', 'Roll');
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', 'Please enter a name', 'required', null, 'client');
        
        $mform->addElement('text', 'email', 'Email');
        $mform->setType('email', PARAM_EMAIL);
        $mform->addRule('email', 'Please enter a valid email address', 'email', null, 'client');
        
        // Add submit button
        $this->add_action_buttons();
    }
}