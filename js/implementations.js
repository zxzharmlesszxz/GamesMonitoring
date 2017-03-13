$(document).ajaxComplete(function(){
  // Autocheck checkbox if value = 1
  $('input[type="checkbox"]').each(function(){ ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false); });

  // Colored nav menu
  $('nav#menu').children('menu').children('li').each(function(){
    if ($(this).children('a').attr('href') == location.pathname){
      $(this).toggleClass('active');
    }
  });

  // display map image in table
    var list = document.querySelectorAll("td[data-icon]");
    for (var i = 0; i < list.length; i++) {
     var url = list[i].getAttribute('data-icon');
     list[i].style.backgroundImage = "url('" + url + "')";
    }
});
