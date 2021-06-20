<!DOCTYPE html>
<html>
	<head>
		<title>Homepage Login</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src='https://kit.fontawesome.com/a076d05399.js'></script>
		<style>
			.hidden-submenu{
				 display:none;
				 position:absolute;
				 background-color:white;
				 padding:5px 10px 5px 9px;
				 width:220px;
				 z-index:1;
				 border-radius:3px;
				 border:1px solid #dbdbdb;
			 }

			 .container-body-template{
			   margin:0 4%;
			 }

			 .left-home-timeline{
			   width:100%;	
			 }

			 .right-home-timeline{
			   width:0%;	
			 }

			 .body-margin-top-fixed-bar{
				margin-top : 60px;
			 }

			 .fixed-sidebar-timeline{
				display:none;
				position:fixed;
				left:63%;
			 }

			 body{
				 background-color:#fafafa;
			 }

			 .icon-float{
				 float:left;
			 }

			.under-development{
			  background-color:#FCAF45;
			  text-align:center;
			  border-radius:4px;
			  padding:10px 5px;	
			}

			a.account-link:link, a.account-link:visited, a.account-link:hover, a.account-link:active {
			  color: black;
			  text-decoration: none;
			  display: inline-block;
			}

			a.account-modal-search-link:link, a.account-modal-search-link:visited, a.account-modal-search-link:hover, a.account-modal-search-link:active {
			  color: black;
			  text-decoration: none;
			  display: inline-block;
			}

			.display-search-navbar{
		      display:none;
			}

			.post-card-timeline{
			  width:100%;
			  border:1px solid #dbdbdb;
			}

			.comment-section-timeline{
			  display:none;
			  border-top: 1px solid #dbdbdb;
			  padding:10px 0;	
			}

			@media only screen and (min-width: 600px) {
			  .display-search-navbar{
			    display:block;
			  }

			  .post-card-timeline{
			   width:620px;
			  }

			  .container-body-template{
				margin:0 6%;
			  }

			  .body-margin-top-fixed-bar{
		        margin-top : 80px;
			  }

			  .comment-section-timeline{
			    display:block;
			  }
			}

			@media only screen and (min-width: 1308px) {
			  .fixed-sidebar-timeline{
			    display:block;
			  }	

			  .container-body-template{
				margin:0 15%;
			  }

			  .left-home-timeline{
			   width:70%;	
			 }

			 .right-home-timeline{
			   width:30%;	
			 }

			 
			}

		</style>
	</head>
	<body class = "container-body-template">
		
		<div class = "fixed-top pt-1" style = "background-color:white; border-bottom:1px solid #dbdbdb;">
			<div class="d-flex justify-content-between container-body-template">
				<div class="pt-2">
					<a href = "{{route('home_timeline_page')}}">
						<img src = "/icon/font-only-ig.png" alt = "instagram logo" width = "115px" />
					</a>
				</div>
				<div class="pt-2 display-search-navbar">
					<form id = "searchForm" action = "">
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" />
						<input id = "inputSearch" autocomplete="off" type = "text" name = "keyword" placeholder = "Search" style = "text-align:center; background-color:#fafafa; border:1px solid #dbdbdb; font-size:14px; height:28px; border-radius:3px;"/> 
					</form>
					<div id = "modalSearch" class="hidden-submenu" style = "height:400px; width:400px; border:1px solid #dbdbdb; border-radius:5px; background-color:white; padding:5px ">
			 			<div class = "d-flex justify-content-between">
			 				<div class = "pt-1 pl-2"><strong>Recent</strong></div>
							<div class = "pt-1 pr-2">Clear All</div>
						</div>
						<div class = "modal-dialog-scrollable">
							<div id = "modalContent" class = "modal-body d-flex flex-column">
								<div style = "color:#fefefe">No recent searches.</div>
							</div>
						</div>
					</div>
				</div>
				<div style = "background-color:white; padding-bottom:10px;">
					<div class="d-flex justify-content-end">
						<div><a href = "{{route('home_timeline_page')}}"><i class="material-icons" style = "font-size:30px; color:black; padding-top:5px;">home</i></a></div>
						<div><a href = "{{route('home_inbox_page')}}"><i class='fab fa-facebook-messenger' style = "font-size:23px; color:black; padding-top:9px; padding-left:17px;"></i></a></div>
						<div><a href = "{{route('home_explore_page')}}"><i class="material-icons" style = "font-size:26px;  color:black; padding-top:7px; padding-left:17px;">explore</i></a></div>
						<div><i class='far fa-heart' style = "font-size:23px; color:black; padding-top:9px; padding-left:17px;"></i></div>
						<div style = "padding-top:7px; padding-left:17px;">
							<div id = "container-dropdown-account">
								<div>
									<a href="javascript:void(0)" onclick = "dropSubmenu('account-submenu')"><img style = "border-radius: 50%;" src = "{{session('account_img_path')}}" width = "25px" /></a>
								</div>
								<div id="account-submenu" class="hidden-submenu">
									<div style = "padding-bottom:5px;"><a class = "account-link" href="{{route('profile_page', ['account_name' => session('account_username')])}}"><i class='far fa-user-circle' style='font-size:19px; padding-right:8px;'></i>Profile</a></div>
									<div style = "padding-bottom:5px;"><a class = "account-link" href="{{route('saved_post', ['account_name' => session('account_username')])}}"><i class='far fa-bookmark' style = "font-size:18px; padding-right:8px; padding-left:2px;"></i>Saved</a></div>
									<div style = "padding-bottom:5px;"><a class = "account-link" href="{{route('updt_account_pge')}}"><i class="material-icons" style = "font-size:18px; padding-right:7px;">settings</i>Settings</a></div>
									<div style = "padding-bottom:5px;"><a class = "account-link" href="{{route('switch_account_page')}}"><i class="material-icons" style = "font-size:18px; padding-right:7px;">compare_arrows</i>Switch Account</a></div>
									<div style = "border-top:1px solid #dbdbdb; padding:5px 0px;"><a class = "account-link" href="{{route('logout')}}">Log Out</a></div>
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "body-margin-top-fixed-bar">
			@yield('content')
		</div>
	</body>

	<script src = "https://code.jquery.com/jquery-2.2.4.min.js"
		  integrity = "sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
		  crossorigin = "anonymous">
  	</script>

	<script>

		window.addEventListener('load', function(){	
			// const nextURL = 'http://127.0.0.1:3000/timeline/ualalal';
			// const nextTitle = 'My new page title';
			// const nextState = { additionalInformation: 'Updated the URL with JS' };

			document.getElementById('modalSearch').style.display = "none";
			document.getElementById('inputSearch').addEventListener('click', function(){
				if(document.getElementById('modalSearch').style.display === ""){
					document.getElementById('modalSearch').style.display = "none";
				}else if(document.getElementById('modalSearch').style.display === "block"){
					document.getElementById('modalSearch').style.display = "none";
				}else{
					document.getElementById('modalSearch').style.display = "block";
				}
				//window.history.pushState(nextState, nextTitle, nextURL);
			});

			document.getElementById('inputSearch').addEventListener('keyup', function(){
				document.getElementById('modalSearch').style.display === "";
				let chatData = document.forms['searchForm']['keyword'].value;
				getDataFromServer(chatData);
			});

			document.getElementById('searchForm').addEventListener('submit', function(e){
				e.preventDefault();
			});
		});

		function getDataFromServer(keywords){
			$.ajax({
				url: '/get-search-result',
				type: 'get',
				data: { 
					keywords : '' + keywords
				},

				success:function(dataServer){
					//console.log(dataServer);
					setNewDataModalSearch(dataServer);
				},
				error: function(){alert('error');}, 
			});  
		}

		function setNewDataModalSearch(dataServer){
		  let dta = JSON.parse(dataServer);
		  let dataViewModalSearch = "";
		  for(var i = 0; i < dta.length; i++) {
		    let obj = dta[i];
			//console.log(obj.username);

			dataViewModalSearch +=
			"<div>"+
				"<a class = 'account-modal-search-link pt-2' href = '/" + obj.username + "'>"+ 
					"<div class = 'd-flex flex-row'>"+
						"<div class = 'pr-2'>"+
							"<img style = 'border-radius: 50%;' src = '" + obj.selfie_path + "' width = '40'/>"+
						"</div>"+
						"<div class = 'd-flex flex-column'>"+
							"<div class = 'font-weight-bold'>" + obj.username + "</div>"+
							"<div class = 'text-secondary'>" + obj.full_name + "</div>"+
						"</div>"+
					"</div>"+
				"</a>"+
			"</div>";
		  }
		  document.getElementById('modalContent').innerHTML = dataViewModalSearch;
		}
			 
		function dropSubmenu(idSubmenu){
			var statusDisplay = document.getElementById(idSubmenu); 

			if(statusDisplay.style.display === "block"){
				statusDisplay.style.display = "none";
			}else{
				statusDisplay.style.display = "block";
			}
		}	


		//src:https://stackoverflow.com/questions/36695438/detect-click-outside-div-using-javascript
		window.addEventListener('click', function(e){
			if(!document.getElementById("container-dropdown-account").contains(e.target)){
				document.getElementById('account-submenu').style.display = "none";
			}

			if(!document.getElementById("inputSearch").contains(e.target)){
				document.getElementById('modalSearch').style.display = "none";
			}
		});
			
	</script>
</html>