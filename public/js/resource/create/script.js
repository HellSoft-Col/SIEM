var addSect = document.getElementById('char_1');
var addSect2 = document.getElementById('char_nueva');
var caracteristicsSection = document.getElementById('options');
var xi = 2;

function addCaracteristic() {
    var dup = addSect.cloneNode(true);
    dup.id = "char_" + xi;

    childrens = dup.children;
    for (var x in childrens) {
        childrens2 = childrens[x].children;
        for (var y in childrens2) {
            childrens3 = childrens2[y].children;
            for (var z in childrens3) {
                if (childrens3[z].id == "quantity" || childrens3[z].id == "aditionalCharacteristic" || childrens3[z].id == "nueva_char") {
                    childrens3[z].id = childrens3[z].id + xi;
                    childrens3[z].name = childrens3[z].name + xi;
                }
            }
        }
    }
    caracteristicsSection.appendChild(dup);
    xi += 1;
}

function addNewCaracteristic() {

    var dup = addSect2.cloneNode(true);
    dup.id = "char_" + xi;
    dup.classList.remove("hidden");
    childrens = dup.children;
    for (var x in childrens) {
        childrens2 = childrens[x].children;
        for (var y in childrens2) {
            childrens3 = childrens2[y].children;
            for (var z in childrens3) {
                if (childrens3[z].id == "quantity" || childrens3[z].id == "aditionalCharacteristic" || childrens3[z].id == "nueva_char") {
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
    if (xi > 2) {
        caracteristicsSection.removeChild(element.parentElement.parentElement.parentElement.parentElement.parentElement);
        xi -= 1;
    }
}

function delCaracteristic2(element) {
    if (xi > 2) {
        caracteristicsSection.removeChild(element.parentElement.parentElement.parentElement.parentElement);
        xi -= 1;
    }
}
