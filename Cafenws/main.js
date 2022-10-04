let verif;




function checkError(element, id)
{

    if (element.value == '') {
        document.getElementById(id).classList.remove("hide");
        verif.preventDefault();
    }
    
    
    else{
        document.getElementById(id).classList.add("hide");
    }
}


document.querySelector("form").addEventListener("submit", (everif) =>
{
    verif = everif;

    checkError(prenom, "name");
    checkError(nom, "lname")
    checkError(quantite,"qttys")
    
});