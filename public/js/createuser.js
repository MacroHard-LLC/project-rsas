// function userCheck() {
//     if (document.getElementById('studentCheck').checked) {
//         document.getElementById('ifStudent').style.display = 'block';
//     }
//     else {
//     	document.getElementById('ifStudent').style.display = 'none';
//       }

//     if (document.getElementById('advisorCheck').checked){
//     		document.getElementById('ifAdvisor').style.display = 'block';
//     }
//     else {
//     	document.getElementById('ifAdvisor').style.display = 'none';
//       }
// }

const studentCheck = document.querySelector('#studentCheck');
const adviserCheck = document.querySelector('#adviserCheck');
const adminCheck = document.querySelector('#adminCheck');

studentCheck.addEventListener('change', userCheck);
adviserCheck.addEventListener('change', userCheck);
adminCheck.addEventListener('change', userCheck);

function userCheck() {
  if (document.getElementById("adminCheck").checked) {
    document.getElementById("student_or_adviser").style.display = "none";
    // document.getElementById("student").style.display = "block";
  } else if (document.getElementById("studentCheck").checked) {
    document.getElementById("student_or_adviser").style.display = "block";
    document.getElementById("rfid").style.display = "block";
  } else {
    document.getElementById("student_or_adviser").style.display = "block";
    document.getElementById("rfid").style.display = "none";
  }
}
