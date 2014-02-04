$(document).ready(function(){

    

    $(document).on("click", ".join-button", function(){
        validateForm();   
    });

    function validateForm()
    {
        var nameReg = /^[A-z]+$/;
        var emailReg = /\w*\@(boisestate|u.boisestate)+(.edu)/;

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var classgrade = $('#class').val();
        var sex = $('#sex').val();
        var bdateday = $('#bdateday').val();
        var bdatemonth = $('#bdatemonth').val();
        var bdateyear = $('#bdateyear').val();
        var submit = true;

        console.log(classgrade);

        //First name
        if(fname == ""){
            submit = false;
            $('#fnamelabel').css("color","red");
        } 
        else if(!nameReg.test(fname)){
            submit = false;
            $('#fnamelabel').css("color","red");
        }

        //Last name
        if(lname == ""){
            submit = false;
            $('#lnamelabel').css("color","red");
        } 
        else if(!nameReg.test(lname)){
            submit = false;
            $('#lnamelabel').css("color","red");
        }

        //email
        if(email == ""){
            submit = false;
            $('#emaillabel').css("color","red");
        }

        else if(!emailReg.test(email)){
            submit = false;
            $('#emaillabel').css("color","red");
        }

        //password
        if(password == ""){
            submit = false;
            $('#passwordlabel').css("color","red");
        } 

        //class
        if(classgrade == ""){
            submit = false;
            $('#classlabel').css("color","red");
        } 

        //sex
        if(sex == ""){
            submit = false;
            $('#sexlabel').css("color","red");
        }

        //bdate
        if(bdateday == ""){
            submit = false;
            $('#bdatelabel').css("color","red");
        }  

        //sex
        if(bdatemonth == ""){
            submit = false;
            $('#bdatelabel').css("color","red");
        }  

        //sex
        if(bdateyear == ""){
            submit = false;
            $('#bdatelabel').css("color","red");
        }    

        console.log(submit);
        if(submit == true)
        {
            $.ajax({
                type: "POST",
                url: "handlers/joinUpdate.php",
                data: { fname: fname,
                    lname: lname,
                    email: email,
                    password: password,
                    classgrade: classgrade,
                    sex: sex,
                    bdateday: bdateday,
                    bdatemonth: bdatemonth,
                    bdateyear: bdateyear,
                },
                success: function(data){
                    window.location = 'dashboard.php';
                }
            })
         }
     }
});      
