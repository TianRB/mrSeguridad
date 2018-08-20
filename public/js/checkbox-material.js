$(document).ready(function(){
  $('.check-awesome label').click(function() {
  
  // find the first span which is our circle/bubble
  var check = $(this).children('span:first-child');
  
  // add the bubble class (we do this so it doesnt show on page load)
  check.addClass('circle');
  
  // clone it
  var newone = check.clone(true);  
  
  // add the cloned version before our original
  check.before(newone);  
  
  // remove the original so that it is ready to run on next click
  $("." + check.attr("class") + ":last").remove();
}); 
})