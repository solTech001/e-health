const Patient = document.querySelector("#Patient");
const Doctor = document.querySelector("#Doctor");
const LogP = document.querySelector("#LogP");
const LogD = document.querySelector("#LogD");
const Table = document.querySelector("#table");
const table = document.querySelector(".table");


Doctor.addEventListener(
'click', ()=>{
    LogP.classList.add('d-none')
    LogD.classList.remove('d-none')
}
)
Patient.addEventListener(
    'click', ()=>{
        LogP.classList.remove('d-none')
        LogD.classList.add('d-none')
    }
 )

