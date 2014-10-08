function init() {
  $('.answers-options').each(function() {
    var group   = $(this);

    $('button', group).each(function(){
      var button = $(this);

      button.click(function(){
        var ele = $(this);
        var id = ele.parent("div").attr("data-toggle-id");
        $("#"+id).val(ele.val());
        ele.siblings(".btn").removeClass("active");
        ele.addClass("active");
      });
    });
  });
}
