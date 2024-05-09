<?php
require_once(__DIR__.'/../../config.php');
require_once('./locallib.php');
// require_once(__DIR__.'/lang/en/local_todolist.php');

try {
    require_login();
} catch (Exception $exception) {
    print_r($exception);
}

$PAGE->set_url(new moodle_url('/local/todo/index.php'));
$PAGE->set_context(\context_system::instance());
$PAGE->set_title(get_string('managepagetitle', 'local_todo'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'local_todo'));

local_todo_display_student();

echo $OUTPUT->footer();