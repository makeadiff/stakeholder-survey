function init() {
  $('#main-form').submit(function(e) {
  	var total = $(".answer input").size();
  	var answer_count = $(".answer input:checked").size();
  	var unanswered = total - answer_count;
  	if(unanswered > 10) {
  		alert("Please answer all the questions.");
  		e.stopPropagation();
  		return false;

  	}

  });
}
 
