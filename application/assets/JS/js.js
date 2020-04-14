

// var element=document.getElementById("button1")
// element.addEventListener("click", function(e)
// {
//     //nom
//     var filtrenom = /^[a-zA-Z\sáàâäãåçéèêëíìîïñóòôöõúùûü-]+$/;
//     var nom = document.getElementById("nom").value;    // je vais chercher la valeur du nom dans mon formulaire
//     console.log(nom)
    
//      if(nom=="")
//     {
//         document.getElementById("p1").textContent = "veuillez rentrez votre nom*"; // je veux la reponse en dessous du champ qui est faux
//         // je ne retourne pas le formulaire en cas d'erre 
//         p1.style.color="red";
//         e.preventDefault();  // je rajoute fonction.preventdefault pour eviter l'envoi du formulaire 
//     }
//     else if(!filtrenom.test(nom)) // le(!) devant veut dire "different de"
//     {
//     document.getElementById("p1").textContent = "veuillez rentrez un nom avec des caracteres valides*"; // je veux la reponse en dessous du champ qui est faux
//         p1.style.color="violet";
//         e.preventDefault();

//     }
//     else
//     {
//         document.getElementById("p1").textContent ="ok";
//         p1.style.color="green";

//     }
//     //prenom
//     var filtreprenom = /^[a-zA-Z\sáàâäãåçéèêëíìîïñóòôöõúùûü-]+$/i;  //le i a la fin est pour eviter la cassse en cas de lettres majuscules non déclarées deans le regex
//     var prenom = document.getElementById("prenom").value;
//     console.log(prenom)
//      if(prenom=="")
//     {
//         document.getElementById("p2").textContent ="veuillez rentrez votre prenom*";
//         p2.style.color="red";
//         e.preventDefault();
//     }
//     else if(!filtreprenom.test(prenom)) // le(!) devant veut dire "different de"
//     {
//         document.getElementById("p2").textContent = "veuillez rentrez un prenom avec des caracteres valides*"; // je met un id sur le p2 pour avoir le message d'erreur en dessous du champ souhaité
//         p2.style.color="violet";
//         e.preventDefault();

//     }
//     else
//     {
//         document.getElementById("p2").textContent ="ok";
//         p2.style.color="green";

//     }

// //date de naissance
// var filtredate = /^[\w\sáàâäãåçéèêëíìîïñóòôöõúùûü-]+$/;
//     var date = document.getElementById("date").value;
//     console.log(date)
    
//     if(!filtredate.test(date)) // le(!) devant veut dire "different de"
//     {
//         document.getElementById("p3").textContent = "format requis jj/mm/aaaa*";
//         p3.style.color="red";
//         e.preventDefault();

//     }
//     else
//     {
//         document.getElementById("p3").textContent ="ok";
//         p3.style.color="green";
//   }
// //email
// var filtreemail = /([\w-\.]+@[\w\.]+\.{1}[\w]+)/;
//     var email = document.getElementById("email").value;
//     console.log(email)
    
//     if(email=="")
//     {
//         document.getElementById("p4").textContent ="veuillez rentrez un e-mail*";
//         p4.style.color="red";
//         e.preventDefault();

//     }
    
//     else if(!filtreemail.test(email)) // le(!) devant veut dire "different de"
//     {
//         document.getElementById("p4").textContent = "email au format invalide*";
//         p4.style.color="violet";
//         e.preventDefault();

//     }
//     else{
    
//         document.getElementById("p4").textContent ="ok";
//         p4.style.color="green";
// }

    
//    //  Sujet

   
//    if (document.getElementById("select").value == "choix")
//    {
       
//        document.getElementById("p5").textContent = "Choisissez le sujet de votre requête.*";
//        p5.style.color="red";
//        e.preventDefault();
// }

// else{
    
//            document.getElementById("p5").textContent= "ok";
//            p5.style.color="green";

// }


// // message
  
//        if (document.getElementById("message").value == "")
   
//        {
   
//            document.getElementById("p6").textContent = "Vous n'avez renseigner aucun message.*";
//            p6.style.color="red";
//            e.preventDefault();
   
//        }
   
//        else
   
//            document.getElementById("p6").textContent = "";
//     });


