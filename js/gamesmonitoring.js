$(document).ready(function(){
  // DataTable jquery plugin
  //var table = $('#table').DataTable({"stateSave": true});
  var table = $('#table').DataTable();
  $('#table.search tfoot th').each(function(){var title = $('#table.search thead th').eq($(this).index()).text();$(this).html('<input type="text" placeholder="'+title+'" />');});

  // Apply the search
  if(table.columns().eq(0)){table.columns().each(function(colIdx){$('input', table.column(colIdx).footer()).on('keyup change', function(){table.column(colIdx).search(this.value).draw();});});}

  // Autocheck checkbox if value = 1
  $('input[type="checkbox"]').each(function(){ ($(this).val() == 1) ? $(this).prop('checked', true) : $(this).prop('checked', false); });
  $(document).on('change',"input[type=checkbox]", function(event){if(!$(this).attr('readonly')){$(this).is(':checked') ? $(this).val(1) : $(this).val(0);} });

  // Colored nav menu
  $('nav#menu').children('menu').children('li').each(function(){
    if ($(this).children('a').attr('href') == location.pathname){
      $(this).toggleClass('active');
    }
  });

  // display map image in table
  var list = document.querySelectorAll("span[data-icon]");
  for (var i = 0; i < list.length; i++) {
   var url = list[i].getAttribute('data-icon');
   list[i].style.backgroundImage="url('" + url + "')";
  }

  // Change status checkbox functions
  $(document).on('change',"input[type=checkbox].status", function(event){
    var el = $(this),
    id = el.data('id'),
    type = el.data('type');
    if (type == undefined) return;
    if(el.is(':checked')){
      el.attr('value',1);
    }else{
      el.attr('value',0);
    }
    $.ajax({
     url: '/'+type+'s/changeStatus/',
     data: type+"id="+id,
     type: 'post',
     success: function(){
     }
    });
  });

  $(document).on('click','button#show', function(event){
    $('p.form').toggleClass('hide');
  });

// Delete function
  $(document).on('click','button.delete', function(event){
   if(confirm('Are you shure?')){
    var el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     result = type + " #" + id + " has been removed.";
     link = '/'+type+'s/delete/';

    $.ajax({
     url: link,
     data: type+"id="+id,
     type: 'post',
     success: function(){
      alert(result);
      el.parent().parent().parent().remove();
     }
    });
   };
  });

// Save function
  $(document).on('click','button.save', function(event){
    var table = $('#table'),
     el = $(this),
     id = el.data('id'),
     type = el.data('type'),
     form = $(this).parent().parent().parent(),
     send = type+'['+type+'id]='+id+'&',
     p = form.parent().parent();

     form.children().find('input').each(function(){
        send += $(this).prop('name')+'='+encodeURIComponent($(this).val())+'&';
     });

     form.children().find('select').each(function(){
      $(this).children('option:selected').each(function(){
        send += $(this).parent().prop('name')+'='+$(this).val()+'&';
      });
     });

    $.ajax({
     url: '/'+type+'s/update/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
      p.prepend('<b>'+type+' data updated!</b>');
     }
    });
  });

// Create function
  $(document).on('click','button.create', function(event){
    var table = $('#table'),
     form = $(this).parent(),
     el = $(this),
     type = el.data('type'),
     send = '';

    form.children('input').each(function(){
      send += $(this).prop('name')+'='+encodeURIComponent($(this).val())+'&';
    });

    form.children('select').each(function(){
      $(this).children('option:selected').each(function(){
        send += $(this).parent().prop('name')+'='+$(this).val()+'&';
      });
    });

    $.ajax({
     url: '/'+type+'s/create/',
     dataType: 'json',
     data: send,
     type: 'post',
     success: function(data){
       if (data != false) {
        location.reload();
       } else {
        alert('Error in '+type+' create!');
       }
     }
    });
  });

});
