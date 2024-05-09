<?php

require_once("$CFG->libdir/formslib.php");

class edit_form extends moodleform {

    protected $data;

    /**
     * Constructor.
     */
    public function __construct($actionurl, $data = null) {
        $this->data = $data;
        // print_r($data);
        parent::__construct($actionurl);
    }


    //Add elements to form
    public function definition() {
        // print_r($this->data);
        $mform = $this->_form;
        $mform->addElement('hidden', 'id', get_string('id', 'local_todo'));
        $mform->setType('id', PARAM_INT);
        $mform->setDefault('id', $this->data->id ?? "");



        $mform->addElement('hidden', 'id', get_string('id', 'local_todo'));
        $mform->setType('id', PARAM_INT);
        // $mform->setDefault('id', $this->data->id ?? "");
        
        $mform->addElement('text', 'name', 'Name');
        $mform->setType('name', PARAM_TEXT);
        $mform->setDefault('name', $this->data->name ?? "");
        // $mform->addRule('name', 'Please enter a name', 'required', null, 'client');
        
        $mform->addElement('text', 'roll', 'Roll');
        $mform->setType('roll', PARAM_TEXT);
        $mform->setDefault('roll', $this->data->roll ?? "");
        $mform->addRule('roll', 'Please enter a roll number', 'required', null, 'client');
        
        $mform->addElement('text', 'email', 'Email');
        $mform->setType('email', PARAM_EMAIL);
        $mform->setDefault('email', $this->data->email ?? "");
        $mform->addRule('email', 'Please enter a valid email address', 'email', null, 'client');
        
        // Add submit button
        $this->add_action_buttons();

    }
}