<?php
// This file defines the settings for the "todo" local plugin

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $ADMIN->add('localplugins', new admin_category('localplugins', get_string('pluginname','local_todo')));
    $ADMIN->add('localplugins', new admin_externalpage('local_todo_url', get_string('pluginname', 'local_todo'), "$CFG->wwwroot/local/todo/index.php"));
}