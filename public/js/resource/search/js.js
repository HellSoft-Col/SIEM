var classroomElements = document.getElementsByClassName('sala');
var instrumentElements = document.getElementsByClassName('instrumento');
var addSect = document.getElementById('char_1');
var caracteristicsSection = document.getElementById('options');
var xi = 2;

function unhideElements(arr) {
    for (i in arr) {
        arr[i].hidden = false;
    }
}

function hideElements(arr) {
    for (var i in arr) {
        arr[i].hidden = true;
    }
}

var tipos = document.getElementById('resource');

function onChangeEvent() {

    if (tipos.options[tipos.selectedIndex].value == "CLASSROOM") {
        hideElements(instrumentElements);
        unhideElements(classroomElements);
    } else if (tipos.options[tipos.selectedIndex].value == "INSTRUMENT") {
        hideElements(classroomElements);
        unhideElements(instrumentElements);
    }
}

function addCaracteristic() {
    var dup = addSect.cloneNode(true);
    dup.id = "char_" + xi;

    childrens = dup.children;
    for (var x in childrens) {
        childrens2 = childrens[x].children;
        for (var y in childrens2) {
            childrens3 = childrens2[y].children;
            for (var z in childrens3) {
                if (childrens3[z].id == "option" || childrens3[z].id == "aditionalCharacteristic") {
                    childrens3[z].id = childrens3[z].id + xi;
                    childrens3[z].name = childrens3[z].name + xi;
                }
            }
        }
    }
    caracteristicsSection.appendChild(dup);
    xi += 1;

}

function delCaracteristic(element) {

    caracteristicsSection.removeChild(element.parentElement.parentElement.parentElement.parentElement);
}
