function dateChange(event){
  msgDate.innerText = reserveDate.value;
}
function timeChange(event){
  msgTime.innerText = reserveTime.value;
}
function numberChange(event) {
  msgNumber.innerText = reserveNumber.value + '人';
}
const reserveDate = document.getElementById("reserveDate");
reserveDate.addEventListener('change', dateChange);
const reserveTime = document.getElementById("reserveTime");
reserveTime.addEventListener('change', timeChange);
const reserveNumber = document.getElementById("reserveNumber");
reserveNumber.addEventListener('change', numberChange);