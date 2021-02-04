$("area").mousemove(function(e) {
  $("#imageHover").attr("src", $(this).data("image")).show().css({
    left: e.pageX + -75,
    top: e.pageY + -180
  });
});
$("area").mouseout(function(e) {
  $("#imageHover").hide();
});
