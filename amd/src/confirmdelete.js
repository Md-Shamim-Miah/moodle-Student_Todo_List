
/**
 * Confirm modal before delete.
 *
 * @module     local_footballscore/confirmdelete
 * @copyright  2024 Md Shamim Miah
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/ajax',
    'core/str',
    'core/modal_factory',
    'core/modal_events',
    'core/notification'
], function($,
             Ajax,
             str,
             ModalFactory,
             ModalEvents,
             Notification) {

    $('.delete-btn').on('click', function() {
        // alert();
        let elementId = $(this).attr('id');
        let arr = elementId.split("-");
        let scoreId = arr[arr.length - 1];
        // eslint-disable-next-line promise/catch-or-return
        ModalFactory.create({
            type: ModalFactory.types.SAVE_CANCEL,
            title: str.get_string('deletetitle', 'local_todo', '', ''),
            body: str.get_string('modalmessage', 'local_todo', '', '')
            // eslint-disable-next-line promise/always-return
        }).then(function(modal) {
            modal.setSaveButtonText(str.get_string('delete', 'local_todo', '', ''));
            let root = modal.getRoot();
            root.on(ModalEvents.save, function() {
                let wsfunction = 'local_todo_delete_by_id';
                // alert(scoreId);
                // console.log( wsfunction);
                let params = {
                    'scoreid': scoreId,
                };
                let request = {
                    methodname: wsfunction,
                    args: params
                };

                // alert(request.methodname);

                Ajax.call([request])[0].done(function() {
                    window.location.href = $(location).attr('href');
                }).fail(Notification.exception);
            });
            modal.show();
        });
    });
});