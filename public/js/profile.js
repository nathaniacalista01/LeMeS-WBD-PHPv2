function toggle() {
    var toggleChange = document.getElementsByClassName('profile-toggle-change');
    for (var i = 0; i < toggleChange.length; i++) {
        var element = toggleChange[i];
        element.style.display = (element.style.display === 'none' || element.style.display === '') ? 'block' : 'none';
    }

    var toggleFixed = document.getElementsByClassName('profile-toggle-fixed');
    for (var i = 0; i < toggleFixed.length; i++) {
        var element = toggleFixed[i];
        element.style.display = (element.style.display === 'block' || element.style.display === '') ? 'none' : 'block';
    }

    var inputFields = document.getElementsByClassName('profile-input');
    for (var i = 0; i < inputFields.length; i++) {
        var inputField = inputFields[i];
        inputField.disabled = !inputField.disabled;
    }
}