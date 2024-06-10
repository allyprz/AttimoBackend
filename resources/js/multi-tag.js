import 'select2/dist/css/select2.min.css';
import $ from 'jquery';
import select2 from 'select2';
import 'select2';

$(document).ready(function() {
    $('#majors').select2(
        {
            placeholder: 'Select majors',
            allowClear: true,
            multiple: true
        }
    )
});

// $(document).ready(function() {
//     $('#majors').select2({
//         placeholder: 'Select majors',
//         allowClear: true,
//         multiple: true
//     });
// });