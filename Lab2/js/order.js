var total;
var correctA = false, correctB = false, correctO = false;
var correctName = false;
var reE = /^$/;


document.addEventListener("DOMContentLoaded", function(event) {
  total = document.getElementById('total');

  // Disable Submit, Document Must Be Entirely Valid
  var button = document.getElementById('btnSub');
  button.disabled = true;
});

function validateNumber(event) {
  var re = /^[\d]+$/;
  var id = event.id;

  if (re.test(event.value)) {
    if (id == "apple") {
      correctA = true;
    } else if (id == "banana") {
      correctB = true;
    } else if (id == "orange") {
      correctO = true;
    }
    event.blur();
    calcTotal();
  } else if(reE.test(event.value)) {
    if (id == "apple") {
      correctA = false;
    } else if (id == "banana") {
      correctB = false;
    } else if (id == "orange"){
      correctO = false;
    }
    event.blur();
    calcTotal();
  } else {
    alert("Invalid Input. Only Numbers [0-9] are Allowed.");

    if (id == "apple") {
      correctA = false;
    } else if (id == "banana") {
      correctB = false;
    } else if (id == "orange"){
      correctO = false;
    }

    event.value = '';
    total.value = NaN;
    event.focus();
  }

  validateForm();
}

function validateName(event) {
  var re = /^[a-zA-Z -]+$/;
  var re2 = /^[ -]+$/;

  if (re2.test(event.value)) {
    alert("Invalid Name.\nName cannot be exclusively a permutation of spaces and/or dashes");
    correctName = false;
    event.value = '';
    event.focus();
  } else if(re.test(event.value)) {
    correctName = true;
    event.value = event.value.trim()
    event.blur();
  } else if (reE.test(event.value)) {
    correctName = false;
    event.blur();
  } else {
    alert("Invalid Input. Certain Characters [a-zA-Z -] are Allowed.");
    correctName = false;
    event.value = '';
  }

  validateForm();
}

function calcTotal() {
  var apple, banana, orange;
  apple = document.getElementById('apple').value;
  banana = document.getElementById('banana').value;
  orange = document.getElementById('orange').value;

  var runningTotal = 0;

  if(!isNaN(apple)) runningTotal = runningTotal + (apple * 0.69);
  if(!isNaN(banana)) runningTotal = runningTotal + (banana * 0.39);
  if(!isNaN(orange)) runningTotal = runningTotal + (orange * 0.59);

  total.value = runningTotal.toFixed(2);
}

function validateForm() {
  var button = document.getElementById('btnSub');
  button.disabled = !(correctA && correctB && correctO && correctName);
}
