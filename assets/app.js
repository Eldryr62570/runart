/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';
// start the Stimulus application

require('@fortawesome/fontawesome-free/css/all.min.css');
require('@fortawesome/fontawesome-free/js/all.js');

// Modal Modification user

var modalmodifprofil = document.getElementById("ModalModifProfil");
var modifprofil = document.getElementById("ModifProfil");
var span = document.getElementsByClassName("close")[0];

modifprofil.onclick = function() {
    console.log("1");
    modalmodifprofil.style.display = "block";
}

span.onclick = function() {
    modalmodifprofil.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modalmodifprofil) {
    modalmodifprofil.style.display = "none";
  }
}

// Modal Suppression user

var modalsupprprofil = document.getElementById("ModalSupprProfil");
var supprprofil = document.getElementById("SupprProfil");
var span = document.getElementsByClassName("closed")[0];

supprprofil.onclick = function() {
    console.log("1");
    modalsupprprofil.style.display = "block";
}

span.onclick = function() {
    modalsupprprofil.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modalsupprprofil) {
    modalsupprprofil.style.display = "none";
  }
}

// Modal Suppression oeuvre

var span = document.querySelectorAll(".closedo");
var div = document.querySelectorAll(".SupprOeuvre");

div.forEach((e)=>{
    e.addEventListener("click" , ()=>{
      console.log("1");
      document.getElementById("ModalSupprOeuvre" + e.id).style.display = "block";
    })
})

span.forEach((f)=>{
  f.addEventListener("click" , ()=>{
    console.log("1");
    document.getElementById("ModalSupprOeuvre" + f.id).style.display = "none";
  })
})

// Modal Suppression user

var spane = document.querySelectorAll(".closedom");
var vide = document.querySelectorAll(".ModifOeuvre");

vide.forEach((g)=>{
    g.addEventListener("click" , ()=>{
      console.log("1");
      document.getElementById("ModalModifOeuvre" + g.id).style.display = "block";
    })
})

spane.forEach((h)=>{
  h.addEventListener("click" , ()=>{
    console.log("1");
    document.getElementById("ModalModifOeuvre" + h.id).style.display = "none";
  })
})