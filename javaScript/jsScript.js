//Display personal settings window when buton change is pressed
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