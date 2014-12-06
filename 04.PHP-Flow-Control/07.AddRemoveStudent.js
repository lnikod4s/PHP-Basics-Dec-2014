var nextId = 0;

function addStudent() {
    nextId++;
    var currentRow = document.createElement("tr");
    currentRow.setAttribute("id", "row" + nextId);
    currentRow.innerHTML =
        '<td><input type="text" name="fName[]" required/></td>' +
        '<td><input type="text" name="lName[]" required/></td>' +
        '<td><input type="email" name="email[]" required/></td>' +
        '<td>' +
        '<input type="number" name="score[]" required/> ' +
        '<button type="button" onclick=removeStudent("row' + nextId + '")>-</button>' +
        '</td>';
    document.getElementById('inputs-parent').appendChild(currentRow);
}

function removeStudent(id) {
    var parent = document.getElementById('inputs-parent');
    if (parent.childElementCount <= 1) {
        alert('You must fill at least one student');
    } else {
        var currentRow = document.getElementById(id);
        parent.removeChild(currentRow);
    }
}

document.getElementById('addButton').onclick = addStudent;
addStudent();