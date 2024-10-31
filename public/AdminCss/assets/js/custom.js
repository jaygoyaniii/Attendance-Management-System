
'use strict';

(function () {

    $(document).ready(function () {
        $('.marker').on('click', function () {
            markAsPresent($(this));
        });

        $('.delete-roll').on('click', function () {
            deleteWarning($(this).parent().find('.roll').text());
        });
        $('.delete-rollnumber').on('click', function () {
            deleteRoll($(this).parent().find('p .warning-roll').text());
        });
        $(".roll").tooltip({
            title: 'Click to see history',
            placement: 'top'
        });
        $(".present").tooltip({
            title: 'This is the number of days the student has attended your classes',
            placement: 'top'
        });
        $(".marker").tooltip({
            title: 'Click to mark this student as present or absent',
            placement: 'top'
        });
        $(".delete-roll").tooltip({
            title: 'Click to delete the student',
            placement: 'top'
        });
    });

    function deleteWarning(roll) {
        $('.warning-roll').html(roll);
    }

    function deleteRoll(roll) {
        $.ajax({
            url: 'php/delete_roll.php',
            type: 'post',
            data: {
                roll: roll,
                class_id: class_id
            },
            dataType: 'json',
            success: function (r) {
                console.log(r);
                switch (r.error) {
                    case 'not_found':
                        alert('We are facing some issues, logging you out for security .');
                        window.location = "logout.php";
                        break;
                    case 'roll_not_found':
                        alert('You might have already delete this roll number. Please refresh the page');
                        window.location = "";
                        break;
                    case 'none':
                        $('.student-record').each(function (k, v) {
                            if ($(this).find('.roll').text() == roll) {
                                $(this).hide('slow', function () {
                                    $(this).remove();
                                });
                                return;
                            }
                        });
                        $('.delete-warning').modal('hide');
                        break;

                }
            }
        });
    }

    function markAsPresent(marker) {
        markerParent = marker.parent();
        present = markerParent.find('.present');
        numPresents = parseInt(present.text());
        if (marker.text() == 'A') {
            marker.html('P');
            marker.css('font-weight', 'bold');
            marker.removeClass('btn-light');
            marker.addClass('btn-success');
            present.html(numPresents + 1);
        } else {
            marker.css('font-weight', '');
            marker.html('A');
            marker.removeClass('btn-success');
            marker.addClass('btn-light');
            present.html(numPresents - 1);
        }
    }

})();
