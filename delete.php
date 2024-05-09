<?php
require_once(__DIR__.'/../../config.php');
require_once('./locallib.php');
// require_once($CFG->dirroot.'/local/todo/classes/form/edit_form.php');

try {
    require_login();
} catch (Exception $exception) {
    print_r($exception);
}
// echo "shamim";
$id = optional_param('id', 0, PARAM_INT);
$success = $DB->delete_records('local_student_details', array('id' => $id));

if ($success) {
    redirect(new moodle_url('/local/todo/index.php'), get_string('updatethanks', 'local_todo'));
} else {
    // Deletion failed, handle the error or display an error message
    echo "Error: Record deletion failed.";
}


