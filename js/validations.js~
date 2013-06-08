function user_validation(user) 
{
  
	if(user.value=='')
	{	
		alert("Please enter the user name");
		user.focus();
		return false;
	}

    else {
			
			return true;
   
         }


}

/** method for password validations **/   

function pwd_validation(pwd)
 {
   pwdvalue=pwd.value;
	if(pwd.value=='')
	{
			alert("Please enter the password");
			pwd.focus();
			return false;

	}
   
    else {
		pwdvalue;	
              return true;
          }

}
function cnfrmpwd_validation(confirmpwd)
 {
	//alert(pwd.value);
   
	if(confirmpwd.value=='')
	{
			alert("Please the enter the confirm password");
			confirmpwd.focus();
			return false;

	}
	else if(pwdvalue != confirmpwd.value)
        {
			alert("password not matched");
			confirmpwd.focus();
			return false;
	}
   	 else
	 {
			
              return true;
          }

}

/** method for firstname validation **/
function fname_validation(fname) 
{
	if(fname.value=='')
	{	
		alert("Please enter Your firstname");
		fname.focus();
		return false;

	}
   
    else {
		return true;	
       
          }

}
/** method for lastname validation **/
function lname_validation(lname) 
{
	if(lname.value=='')
	{	
		
			alert("Please enter your lastname");
			lname.focus();
			return false;

	}
  
    else
    {
        
        return true;
    }

}
function filename_validation(filename) 
  {
	var fileName1 = filename.value;
   	 var ext = fileName1.substring(fileName1.lastIndexOf('.') + 1);
    if(fileName1 =='')
	{
		alert("please choose the file for uploading")
		filename.focus();
		return false;
		
	}
   else if(ext!= "gif" && ext!= "GIF"  && ext!= "jpg" && ext!= "JPG" && ext!= "png")
    {
        alert("Upload Gif,jpg or png images only for the profile pic");
        filename.focus();
        return false;
    }


    else
    {
       return true;
    }

}

function validateRadiobutton(radio)
{
	 var chx = document.getElementsByName('sex');
	
		 for (var i=0; i<chx.length; i++)
    		 {
			if(chx[i].checked ==true ) 
			{
				
				return true;
				
			}
		
		}
		
		alert("please check any one Radiobutton");
		return false;										
}
function day_validation(day)
{
	
    if(day.value =='default')
    {
	alert("Please select day");
        day.focus();
        return false;
    }
    else
    {
        return true;

    }
}
function month_validation(month)
{
    if(month.value =='0')
    {
	alert("Please select month");
        month.focus();
        return false;
    }
    else
    {
        return true;

    }
}
function year_validation(year)
{
    if(year.value =='default')
    {
	alert("Please select year");
        year.focus();
        return false;
    }
    else
    {
        return true;

    }
}
function validateCheckBoxes() 
{
    var chx = document.getElementsByName('hobbies[]');
    for (var i=0; i<chx.length; i++)
    {
        if (chx[i].checked==true)
        {
            return true
        }
    }
    
    alert("Please check any checkbox");
    return false;
} 

function validation_email(mail)
{
	 var regex=/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	email=mail.value;
	//alert(mail);
	if(email =='')
	{
		alert("Please enter mail you will get the cofirmation mail to this mail");
		mail.focus();
		return false;

	}
	else if(email.match(regex)) 
	{
		//alert("success");
		return true;
	}
	else 
	{
		alert("please give valid email id ");
		mail.focus();
		return false;
	}
	
}



function formValidate(myForm) 
{
	
    var fname=myForm.firstname;
    var lname=myForm.lastname;
    var pwd=myForm.password;
    var confirmpwd=myForm.confirmpassword;
    var username=myForm.username;
    var fup=myForm.filename;
    var radio=myForm.sex;
    var day=myForm.day;
    var month=myForm.month;
    var year=myForm.year;
    var chx =myForm.hobbies;
    var mail=myForm.email;
 
   if(user_validation(username))
    {
     if(pwd_validation(pwd))
	if(cnfrmpwd_validation(confirmpwd))
	 if(fname_validation(fname))
	  if(lname_validation(lname))
	   if(filename_validation(fup))
	   if(validateRadiobutton(radio))
	    if(day_validation(day))
	     if(month_validation(month))
	      if(year_validation(year))
	       if(validateCheckBoxes())
		if(validation_email(mail))
		{
			return true;
		}


	}
 
  return false;

}

