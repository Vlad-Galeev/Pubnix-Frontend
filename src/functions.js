// https://www.w3schools.com/howto/howto_js_copy_clipboard.asp
function myFunction() {
    // Get the text field
    var copyText = document.getElementById("conn_string");

    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices

    // Copy the text inside the text field
    navigator.clipboard.writeText(copyText.value);
}