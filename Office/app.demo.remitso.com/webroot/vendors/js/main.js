var creditCardType = require('credit-card-type');
$(function(){
   $("#card-number").on("keyup", function(){
       if ( $(this).val() ) {
           var cardType = creditCardType($(this).val());
           $(this).next("i").removeAttr("class").addClass("icon card-icon card-"+cardType[0].type);
       } else {
            $(this).next("i").removeAttr("class").addClass("icon mdi mdi-credit-card");
       }
   });
});
