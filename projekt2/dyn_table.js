/* encoding="UTF-8" */

  var firstName = ["Jakub", "Kacper", "Michał", "Filip", "Szymon", "Jan", "Mateusz", "Adam", "Piotr", "Tomasz", "Maciej", "Paweł", "Krzysztof", "Łukasz", "Wiktor",
    "Mikołaj", "Dawid", "Konrad", "Bartosz", "Bartłomiej", "Patryk", "Igor", "Daniel", "Damian", "Jacek", "Artur", "Grzegorz", "Robert", "Juliusz", "Rafał"]
  var lastName = ["Nowak", "Kowalski", "Wiśniewski", "Wójcik", "Kowalczyk", "Kamiński", "Lewandowski", "Dąbrowski", "Zieliński", "Szymański", "Woźniak", "Kozłowski",
    "Jankowski", "Mazur", "Wojciechowski", "Kwiatkowski", "Krawczyk", "Kaczmarek", "Piotrowski", "Grabowski", "Zając", "Pawłowski", "Michalski", "Król", "Nowakowski",
    "Wieczorek", "Wróbel", "Jabłoński", "Dudek", "Adamczyk"]

function generate() {
  var form = document.getElementById('numberel');

  if (form.value%10 == 0 && form.value > 0){
    var table = document.getElementById('studentstable');
    document.getElementById('choosenumber').classList.add('hidden');
    document.getElementById('studentstable').classList.remove('hidden');

    table.rows[0].insertCell(3).innerHTML = '<button class="btn btn-primary" type="button" onclick="addColumn()">Dodaj</button>';
    for (var i = 0; i < form.value; i++) {
      var row = table.insertRow(i+1);
      row.insertCell(0).innerHTML = String(i+1);
      row.insertCell(1).innerHTML = firstName[Math.floor(Math.random()*30)];
      row.insertCell(2).innerHTML = lastName[Math.floor(Math.random()*30)];
      row.insertCell(3).innerHTML = '<input type="text">';
    }
  }
  else {
    alert("Niepoprawna liczba studentów");
  }
}

function addColumn() {
  var table = document.getElementById('studentstable');
	var length = table.rows[0].cells.length;

	table.rows[0].cells[length-1].innerHTML = '';
	table.rows[0].insertCell(length).innerHTML = '<button class="btn btn-primary" type="button" onclick="addColumn()">Dodaj</button>';

	for (i = 1; i < table.rows.length; i++) {
    table.rows[i].insertCell(table.rows[i].cells.length).innerHTML = '<input type="text" id="inputInfo">';
  }
}
