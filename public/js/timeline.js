"use strict";

// function like_dislike(pkPost, isLiked){
// 	if(isLiked){
// 		$('#id_like_button_'+pkPost).html("<i class='far fa-heart' style = 'font-size:23px; color:black;'></i>");
// 		document.getElementById('id_like_button_'+pkPost).setAttribute('onclick','like_dislike('+pkPost+',false)');

// 	}else{
// 		$('#id_like_button_'+pkPost).html("<i class='fas fa-heart' style = 'font-size:23px; color:red;'></i>");
// 		document.getElementById('id_like_button_'+pkPost).setAttribute('onclick','like_dislike('+pkPost+',true)');
// 	}

// 	let url_tmp = "{{ route('ajax_set_unset_like', ['account_name' => 'ass', 'id_postingan'=>'-99999']) }}";
// 	$.ajax({
// 	  headers: {
// 	      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
// 	  },	
// 	  url: url_tmp.replace('-99999', pkPost),
// 	  method: 'POST', 
// 	  success:function(result){
// 	  	if(result.total_liked === 0){
// 	  	  $('#id_total_liked_'+pkPost ).html("Be the first to <strong>like this</strong>");
// 	  	}else{
// 	  	  $('#id_total_liked_'+pkPost ).html("<strong>"+result.total_liked+" likes</strong>");
// 	  	}
// 	  }
// 	});
// }