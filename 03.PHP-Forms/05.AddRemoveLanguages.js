var nextProgramLangId = 0,
    nextLangId = 0,
    addProgLangButton = document.getElementById('addProgramLang'),
    removeProgLangButton = document.getElementById('removeProgramLang'),
    addLangButton = document.getElementById('addLang'),
    removeLangButton = document.getElementById('removeLang');

addProgLangButton.onclick = function() {
    nextProgramLangId++;
    var currentDiv = document.createElement("div");
    currentDiv.setAttribute('id', 'programLang' + nextProgramLangId);
    currentDiv.innerHTML =
        '<input type="text" name="programLang[]"/> ' +
        '<select name="programLevel[]">' +
        '<option value="Beginner">Beginner</option>' +
        '<option value="Programmer">Programmer</option>' +
        '<option value="Ninja">Ninja</option>' +
        '</select>';
    document.getElementById('computerSkills').insertBefore(currentDiv, removeProgLangButton);
};
removeProgLangButton.onclick = function() {
    if (nextProgramLangId < 1) {
        return;
    }
    var currentDiv = document.getElementById('programLang' + nextProgramLangId);
    document.getElementById('computerSkills').removeChild(currentDiv);
    nextProgramLangId--;
};
addLangButton.onclick = function() {
    nextLangId++;
    var currentDiv = document.createElement("div");
    currentDiv.setAttribute('id', 'lang' + nextLangId);
    currentDiv.innerHTML =
        '<input type="text" name="lang[]"/> ' +
        '<select name="comprehension[]">' +
        '<option hidden selected>-Comprehension-</option>' +
        '<option value="Beginner">Beginner</option>' +
        '<option value="Intermediate">Intermediate</option>' +
        '<option value="Advanced">Advanced</option>' +
        '</select> ' +
        '<select name="reading[]">' +
        '<option hidden selected>-Reading-</option>' +
        '<option value="Beginner">Beginner</option>' +
        '<option value="Intermediate">Intermediate</option>' +
        '<option value="Advanced">Advanced</option>' +
        '</select> ' +
        '<select name="writing[]">' +
        '<option hidden selected>-Writing-</option>' +
        '<option value="Beginner">Beginner</option>' +
        '<option value="Intermediate">Intermediate</option>' +
        '<option value="Advanced">Advanced</option>' +
        '</select>';
    document.getElementById('otherSkills').insertBefore(currentDiv, removeLangButton);
};
removeLangButton.onclick = function() {
    if (nextLangId < 1) {
        return;
    }
    var currentDiv = document.getElementById('lang' + nextLangId);
    document.getElementById('otherSkills').removeChild(currentDiv);
    nextLangId--;
};