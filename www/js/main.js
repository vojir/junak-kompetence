$(function(){
  $('ul.withDescriptions a').each(function(){
    $(this).mouseover(function(){
      $('.navPillDescription.hint').hide();
      var contentElement=$('.navPillDescription.content');
      contentElement.html($('<h2></h2>').text($(this).text()));
      contentElement.append($('<p></p>').text($(this).data('description')));
    });
    $(this).mouseout(function(){
      $('.navPillDescription.hint').show();
      $('.navPillDescription.content').html("");
    });
  });


});
