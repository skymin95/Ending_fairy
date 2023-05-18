var arrInput = [];
var arrInputValue = [];

function addInput() {
  if (arrInput.length === 0) {
    arrInput.push(0);
    arrInputValue.push("");
    display();
  }
}

function display() {
  document.getElementById('comm_answer').innerHTML = "";
  for (var i = 0; i < arrInput.length; i++) {
    document.getElementById('comm_answer').innerHTML += createInput(arrInput[i], arrInputValue[i]);
  }
}

function saveValue(id, value) {
  arrInputValue[id] = value;
}

function createInput(id, value) {
  return "<input type='text' id='test " + id + "' onChange='javascript:saveValue(" + id + ",this.value)' value='" + value + "'><br>";
}

function deleteInput() {
  if (arrInput.length > 0) {
    arrInput.pop();
    arrInputValue.pop();
  }
  display();
}