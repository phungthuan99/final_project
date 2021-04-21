$(".present").change(function() {
    var student_id = $(this).data('student');
    $("#student_id").val(function() {
        return this.value + student_id + ',';
    });
});

$(".absent").change(function() {
    $(this).addClass('active');
    var student_id = $(this).data('absent') + ',';
    $('#student_id').val(function() {
        return this.value.replace(student_id, "");
    });
})