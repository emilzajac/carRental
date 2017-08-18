//Display personal settings window, when button change is pressed
window.onload = function () {
    var button = document.getElementById('personalSettingsButton');

    document.getElementById('personal_data').style.display = 'none';

    button.onclick = function () {
        var div = document.getElementById('personal_data');
        if (div.style.display === 'none') {
            div.style.display = 'block';
        } else {
            div.style.display = 'none';
        }
    };
    
    var button = document.getElementById('personalSettingsCancelButton');
    
    button.onclick = function () {
        var div = document.getElementById('personal_data');
        if (div.style.display !== 'none') {
            div.style.display = 'none';
        } 
    };
};


//Hide message window when button is clicked
var toggle = function () {
    var mydiv = document.getElementById('message_form');
    if (mydiv.style.display === 'block' || mydiv.style.display === ''){
        mydiv.style.display = 'none';
    }else{
        mydiv.style.display = 'block'
    }
}