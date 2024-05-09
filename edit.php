<?php


require_once(__DIR__.'/../../config.php');
require_once('./locallib.php');
require_once($CFG->dirroot.'/local/todo/classes/form/edit_form.php');

try {
    require_login();
} catch (Exception $exception) {
    print_r($exception);
}
// echo "shamim";
$id = optional_param('id', 0, PARAM_INT);
$PAGE->set_url(new moodle_url('/local/todo/edit.php', array('id' => $id)));
$PAGE->set_context(\context_system::instance());
echo $PAGE->set_title(get_string('edit', 'local_todo'));

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('edit', 'local_todo'));

$mform = local_todo_init_form($id);
// print_r($mform);
local_todo_edit($mform,$id);

$mform->display();
// local_footballscore_edit_score($mform, $id);



echo $OUTPUT->footer();