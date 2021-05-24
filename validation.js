function myfun(){
       
   var fp=f1.pass.value;
   var sp=f1.pass1.value;
  var error_msg="";
  var inp=0;
  var em=0;
  var mail=f1.emailid.value;
   if(fp=="")
   {
      error_msg=error_msg+" enter some password"
     
   }
   else if(sp.length<6)
   {
      error_msg=error_msg+" Password must be greater than 6 chars"
     
   }
   else if(fp==sp)
   {
      inp=1;
      
   }
   else
   {
      error_msg=error_msg+" Password is not same"
      
   }
   if(mail=="")
         {
            error_msg=error_msg+" Enter some E-Mail"

         }
    else if(mail.indexOf('@')==-1 || mail.indexOf('.')==-1)
       {
         error_msg=error_msg+" It is a invalid email id"
      
       }
   else  if(mail.indexOf("@")==0 || mail.indexOf(".")==0 || mail.indexOf('@')>mail.indexOf('.') )
      {
         error_msg=error_msg+" It is a invalid email id"
      }

else if(mail.indexOf('@') +1== mail.indexOf('.'))
      {
         error_msg=error_msg+" It is a invalid email id"
      }
 else 
   {
      em=1;
   
   }
   if(em==1 && inp==1 )
   {
      alert("Succesfully Submitted");

   }
   else{
      alert(error_msg)
   }


}
function myfunction() {
   var x=document.forms
   ["myForm"]["phone"].value;
   if (x==isNaN(0-9) || x==isNaN(0-9))
   { 
      alert("Input your phone number");
     return false;
   }
}
