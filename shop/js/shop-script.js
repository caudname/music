$(document).ready(function(){

  $('#block-category > ul > li > ul').css('display','none');
  // Обновление строки о количестве товаров в корзине
  loadcart();



  //Проверка email на правильность
    function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
    }
///////////////////////////
 // Контактные данные
  $('#confirm-button-next').click(function(e){   

   var order_fio = $("#order_fio").val();
   var order_email = $("#order_email").val();
   var order_phone = $("#order_phone").val();
   var order_address = $("#order_address").val();
   
 if (!$(".order_delivery").is(":checked"))
 {
    $(".label_delivery").css("color","#E07B7B");
    send_order_delivery = '0';

 }else { $(".label_delivery").css("color","black"); send_order_delivery = '1';

  
  // Проверка ФИО
 if (order_fio == "" || order_fio.length > 50 )
 {
    $("#order_fio").css("borderColor","#FDB6B6");
   send_order_fio = '0';
   
 }else { $("#order_fio").css("borderColor","#DBDBDB");  send_order_fio = '1';}

  
 // Проверка email
 if (isValidEmailAddress(order_email) == false)
 {
    $("#order_email").css("borderColor","#FDB6B6");
  send_order_email = '0';   
 }else { $("#order_email").css("borderColor","#DBDBDB"); send_order_email = '1';}
  
 // Проверка телефона
 
  if (order_phone == "" || order_phone.length > 50)
 {
    $("#order_phone").css("borderColor","#FDB6B6");
    send_order_phone = '0';   
 }else { $("#order_phone").css("borderColor","#DBDBDB"); send_order_phone = '1';}
 
 // Проверка адреса
 
  if (order_address == "" || order_address.length > 150)
 {
    $("#order_address").css("borderColor","#FDB6B6");
    send_order_address = '0';   
 }else { $("#order_address").css("borderColor","#DBDBDB"); send_order_address = '1';}
  
} 
 // Глобальная проверка
 if (send_order_delivery == "1" && send_order_fio == "1" && send_order_email == "1" && send_order_phone == "1" && send_order_address == "1")
 {
    // Отправляем форму
   return true;
 }

e.preventDefault();

});
// Добавляет товар в корзину
//////////////////////////////
$('.add-cart-style-grid, .add-cart').click(function(){
              
 var tid = $(this).attr("tid");

 $.ajax({
  type: "POST",
  url: "/include/addtocart.php",
  data: "id="+tid,
  dataType: "html",
  cache: false,
  success: function(data) { 
  loadcart();
      }
});

});
// Показывает количество товаров в корзине
function loadcart(){
     $.ajax({
  type: "POST",
  url: "/include/loadcart.php",
  dataType: "html",
  cache: false,
  success: function(data) {
    
  if (data == "0")
  {
  
    $("#block-basket > a").html("Корзина пуста");
  
  }else
  {
    $("#block-basket > a").html(data);

  }  
    }
});         
}
///////////////////////////////////

$('#block-category > ul > li > a').click(function(){
 if ($(this).attr('class') !='active'){
  
  $('#block-category > ul > li > ul').slideUp(400); 
  $(this).next().slideToggle(400);
       $('#block-category > ul > li > a').removeClass('active');
       $(this).addClass('active');
       $.cookie('select_cat', $(this).attr('id'));
 
 }else
 {
  $('#block-category > ul > li > a').removeClass('active');
  $('#block-category > ul > li >ul').slideUp(400);
  $.cookie('select_cat', '');
 }

});

////////////////////////////////

//Блок авторизации
$('.top-auth').click(function() {
    $("#block-top-auth").toggle();
});
////////////////////////////////
// Авторизация
$("#button-auth").click(function() {
        
 var auth_login = $("#auth_login").val();
 var auth_pass = $("#auth_pass").val();

 
 if (auth_login == "" || auth_login.length > 30 )
 {
    $("#auth_login").css("borderColor","#FDB6B6");
    send_login = 'no';
 }else {
    
   $("#auth_login").css("borderColor","#DBDBDB");
   send_login = 'yes'; 
      }
 

if (auth_pass == "" || auth_pass.length > 15 )
 {
    $("#auth_pass").css("borderColor","#FDB6B6");
    send_pass = 'no';
 }else { $("#auth_pass").css("borderColor","#DBDBDB");  send_pass = 'yes'; }


 if ( send_login == 'yes' && send_pass == 'yes' )
 { 
    
    $.ajax({
  type: "POST",
  url: "include/auth.php",
  data: "login="+auth_login+"&pass="+auth_pass,
  dataType: "html",
  cache: false,
  success: function(data) {
      if (data=='Добро пожаловать') {
        location.reload();
      } else {
        alert(data);
        location.reload();
      }

   }
});  
}
}); 
/////////////////////////
$('#logout').click(function(){
    
    $.ajax({
  type: "POST",
  url: "/include/logout.php",
  dataType: "html",
  cache: false,
  success: function(data) {

      location.reload();
  
}
}); 
});
/////////////////////////////
// Кнопка минус в корзине
$('.count-minus').click(function(){

  var iid = $(this).attr("iid");      
 
 $.ajax({
  type: "POST",
  url: "/include/count-minus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  
  // Переменная с ценой продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на количество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(result_total+" руб");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});

// Кнопка плюс в корзине
$('.count-plus').click(function(){

  var iid = $(this).attr("iid");      
  
 $.ajax({
  type: "POST",
  url: "/include/count-plus.php",
  data: "id="+iid,
  dataType: "html",
  cache: false,
  success: function(data) {   
  $("#input-id"+iid).val(data);  
  loadcart();
  
  // Переменная с ценой продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на количество
  result_total = Number(priceproduct) * Number(data);
 
  $("#tovar"+iid+" > p").html(result_total+" руб");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  
  itog_price();
      }
});
  
});
// Поле для количества товаров в корзине
 $('.count-input').keypress(function(e){
    
 if(e.keyCode==13){
     
 var iid = $(this).attr("iid");
 var incount = $("#input-id"+iid).val();        
 
 $.ajax({
  type: "POST",
  url: "/include/count-input.php",
  data: "id="+iid+"&count="+incount,
  dataType: "html",
  cache: false,
  success: function(data) {
  $("#input-id"+iid).val(data);  
  loadcart();
    
  // Переменная с ценой продукта
  var priceproduct = $("#tovar"+iid+" > p").attr("price"); 
  // Цену умножаем на количество
  result_total = Number(priceproduct) * Number(data);


  $("#tovar"+iid+" > p").html(result_total+" руб");
  $("#tovar"+iid+" > h5 > .span-count").html(data);
  itog_price();

      }
}); 
  }
});
 /////////////////////////
function itog_price(){
 
 $.ajax({
  type: "POST",
  url: "/include/itog_price.php",
  dataType: "html",
  cache: false,
  success: function(data) {

  $(".itog-price > strong").html(data);

}
}); 
       
}
//////////////////////////
});