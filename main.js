

$(function(){
  
  p = $("#content_0>p")[0];

  var html = "<span class='highlight' id='inserted'>";
  
  var quote = $("#replace-statement").html();

  html = html + " " + quote + "</span>";

  $(p).append(html);
  document.getElementById('inserted').scrollIntoView(true);
  $('.highlight').effect("highlight", {color:"#000000"}, 3000);
});
