function title_validation(title) 
{
  
	if(title.value=='')
	{	
		alert("Please enter the title");
		title.focus();
		return false;
	}

    else {
			
			return true;
   
         }


}

/** method for firstname validation **/
function cperson_validation(cperson) 
{
	if(cperson.value=='')
	{	
		alert("Please fill the contact person details");
		cperson.focus();
		return false;

	}
   
    else {
		return true;	
       
          }

}
/** method for lastname validation **/
function address_validation(address) 
{
	if(address.value=='')
	{	
		
			alert("Please enter your address");
			address.focus();
			return false;

	}
  
    else
    {
        
        return true;
    }

}
function mbno_validation(mbno) 
  {
	var a = mbno.value;
    	if(a =='')
	{
		alert("please enter your phone num")
		return false;
		
	}
	else if(isNaN(a))
	{
		alert("Enter the valid Mobile Number(Like : 9566137117)");
		return false;
	}
    	else
    	{
      	 return true;
    	}

}
function validation_description(des) 
{
	if(des.value=='')
	{	
		
			alert("Please enter the description");
			description.focus();
			return false;

	}
  
    else
    {
        
        return true;
    }

}
function category_validation(category)
{
    if(category.value =='default')
    {
	alert("Please select category");
        category.focus();
        return false;
    }
    else
    {
        return true;

    }
}


function validation_email(mail)
{
	 var regex=/^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
	email=mail.value;
	//alert(mail);
	if(email =='')
	{
		alert("Please enter mail ");
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
	
    var title=myForm.title;
    var cperson=myForm.contactperson;
    var address=myForm.address;
    var mobileno=myForm.mbno;
    var mail=myForm.email;
    var des=myForm.description;
    var category=myForm.category;
 
   if(title_validation(title))
    {
	 if(cperson_validation(cperson))
	  if(address_validation(address))
	   if(mbno_validation(mbno))
	   if(validation_email(mail))
	   if(validation_description(des))
	    if(category_validation(category))
		{
			return true;
		}


	}
 
  return false;

}

