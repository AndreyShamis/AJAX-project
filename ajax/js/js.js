// that function called on the next events:
//  - onblur - Execute a JavaScript when a user leaves an input field
//  - oninput
function checkname(field, error_field)
{
    var alphaExp = /^[a-zA-Z]+$/;
    var fl_field = document.getElementById(field).value;
    var error_fl_field = document.getElementById(error_field);

    if(fl_field.trim() === "") // Was changed to === from  ==
    {
        error_fl_field.innerHTML="you mast enter at least one leter!";
    }
    else if(!fl_field.trim().match(alphaExp))
    {
         error_fl_field.innerHTML="you mast enter only laters!";
    }
    else
    {
        error_fl_field.innerHTML="";
        document.getElementById(field).valid = "true";
    }
}

function checkFrom1(fname,lname,cemail)
{
    if(document.getElementById(fname).valid === "true"   &&
       document.getElementById(lname).valid === "true"   &&
       document.getElementById(cemail).valid === "true")
    {

 $.post("new_user_reciver.php" , $("#section1").serializeArray() ,function(data) {
    });
        return true;
    }
    return false;
}



function checkEmail(field,error_field, error_msg)
{
  alert('sdsd');
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    var email_field = document.getElementById(field).value;
    var error_email_field = document.getElementById(error_field);
    if(email_field.trim() === ""){
        error_email_field.innerHTML=error_msg;
    }else if(!email_field.trim().match(emailExp)){
         error_email_field.innerHTML="wrong email address - email format is: a@b.cd";
    }else{
        if(field === "email"){
            document.getElementById("email").valid = "true";
            error_email_field.innerHTML="";
        }else{
            if(document.getElementById("email").valid === "true"){
                var entered_email = document.getElementById("email").value;
                //console.info("valid == true");
                if(email_field.trim().toLowerCase() !== entered_email.trim().toLowerCase()){
                    error_email_field.innerHTML="Renter email did not match!";
                    //console.info("Renter email did not match!");
                }else{
                    error_email_field.innerHTML="";
                    document.getElementById(field).valid = "true";
                }
            }else{
                error_email_field.innerHTML="";
                document.getElementById(field).valid = "true";
            }
        }
    }
 }
