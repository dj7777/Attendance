$(function(){
    var d = new Date();
    var t = d.getHours() + ":" + d.getMinutes() + ":" +  d.getSeconds();
    var todayDate = d.getDate() + "/" + d.getMonth() + "/" + d.getFullYear();
   $('#showTime').text(t).hide();
  // $('#date').text(todayDate);

 // alert(d.getMinutes());

   if((d.getHours()== 9 && d.getMinutes() >40)){
       $('#lecture').text('1');
   }
   
   else if((d.getHours()==10 && d.getMinutes() >35)){
       $('#lecture').text('2');
   }
   else if((d.getHours()==11 && d.getMinutes() >30)){
       $('#lecture').text('3');
   }
   else if((d.getHours()==12 && d.getMinutes() >25)){
       $('#lecture').text('4');
   }
   else if((d.getHours()>=13 && d.getMinutes() >40 && d.getHours()<=14)){
       $('#lecture').text('5');
   }
   else if((d.getHours()==14 && d.getMinutes() >40)){
       $('#lecture').text('6');
   }
   else if ((d.getHours()==15 && d.getMinutes() >30)){
       $('#lecture').text('7');
   }

   var count=0;
   $('#login').click(function(){
       count++;
       if(count>=5){
           $('#showTime').show();
       }
   })
  // $('#rollNo').text('0206cs121040');

});