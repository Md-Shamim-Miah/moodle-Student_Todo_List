<?php
require_once(__DIR__.'/../../config.php');
require_once('./locallib.php');
require_once($CFG->dirroot.'/local/todo/classes/form/create_form.php');

try {
    require_login();
} catch (Exception $exception) {
    print_r($exception);
}

$id = optional_param('id', 0, PARAM_INT);
$PAGE->set_url(new moodle_url('/local/todo/create.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('create', 'local_todo'));

$mform = local_todo_init_form();



// local_footballscore_edit_score($mform, $id);

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('create', 'local_todo'));
$mform->display();
local_todo_create($mform);
echo $OUTPUT->footer();