<?php

function local_todo_display_student() {
    global $DB, $OUTPUT;
    $goalrecords = $DB->get_records('local_student_details');

    // Data to be passed in the index template.
    $templatecontext = (object) [
        'texttodisplay' => array_values($goalrecords),
        'editurl' => new moodle_url('/local/todo/edit.php'),
        'createurl' => new moodle_url('/local/todo/create.php'),
        'deleteurl' => new moodle_url('/local/todo/delete.php'),
    ];

    echo $OUTPUT->render_from_template('local_todo/manage', $templatecontext);
}


function local_todo_init_form(int $id = null) {
    global $DB;
    print_r($id);

    if ($id) {
        $actionurl = new moodle_url('/local/todo/edit.php');
        $score = $DB->get_record('local_student_details', array('id' => $id));
        // PRINT_R($score);
        $mform = new edit_form($actionurl, $score);
        // var_dump($mform);
        // print_r($mform);
    } else {
        $actionurl = new moodle_url('/local/todo/create.php');
        $mform = new create_form($actionurl);
    }
    // print_r($mform);
    return $mform;
}

function local_todo_create($mform) {
    global $DB;
    if ($mform->is_cancelled()) {
        //Back to index.php
        redirect(new moodle_url('/local/todo/index.php'));
    } else if ($fromform = $mform->get_data()) {
        // Handing the form data.
        $recordstoinsert = new stdClass();
        $recordstoinsert->name = $fromform->name;
        $recordstoinsert->roll = $fromform->roll;
        $recordstoinsert->email = $fromform->email;
        $DB->insert_record('local_student_details', $recordstoinsert);
    //     // Go back to index page.
    redirect(new moodle_url('/local/todo/index.php'), get_string('updatethanks', 'local_todo'));
        
    }
}

function local_todo_edit($mform, int $id = null) {
    global $DB;
    // print_r($id);
    // print_r($mform->is_cancelled());
    if ($mform->is_cancelled()) {
        // Back to index.php
       redirect(new moodle_url('/local/todo/index.php'));
    } 
    else if ($fromform = $mform->get_data()) {

        $recordstoinsert = new stdClass();
        $recordstoinsert->id = $fromform->id;
        $recordstoinsert->name = $fromform->name;
        $recordstoinsert->roll = $fromform->roll;
        $recordstoinsert->email = $fromform->email;
        
        // print_r($recordstoinsert);
        $DB->update_record('local_student_details', $recordstoinsert);
            // Go back to index page.
        redirect(new moodle_url('/local/todo/index.php'), get_string('updatethanks', 'local_todo'));
    }
}

function local_todo_delete($id) {
    global $DB;
    try {
        $DB->delete_records('local_footballscore', array('id' => $id));
    } catch (Exception $exception) {
        throw new moodle_exception($exception);
    }
}