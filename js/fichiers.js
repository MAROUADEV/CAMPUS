$(document).ready(function() {
$("#submit").click(function() {
    var id = $("#id").val();
var cartetd = $("#cartetd").val();
var certif = $("#certif").val();
var passeport = $("#passeport").val();

// Returns successful data submission message when the entered information is stored in database.
$.post("refreshform.php", {
    id1: id,
cartetd1: cartetd,
    certif1: certif,
passeport1: passeport,

}, function(data) {
alert(data);
$('#form')[0].reset(); // To reset form fields
});

});
});