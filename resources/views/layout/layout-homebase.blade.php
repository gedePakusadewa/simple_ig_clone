<!DOCTYPE html>
<html>
	<head>
		<title>Homepage Login</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
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
				 width:190px;
				 z-index:1;
				 border-radius: 3px;
				 border:1px solid #dbdbdb;
			 }

			 .container-body-template{
				 margin:0 15%;
			 }

			 .body-margin-top-fixed-bar{
				margin-top : 80px;
			 }

			 .fixed-sidebar-timeline{
				position:fixed;
				left:62%;
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

		</style>
	</head>
	<body class = "container-body-template">
		<div class = "fixed-top " style = "background-color:white; border-bottom:1px solid #dbdbdb;">
			<div class="d-flex justify-content-between container-body-template">
				<div class="p-2">
					<a href = "{{route('home_timeline_page')}}">
						<img style = "" src = "/icon/font-only-ig.png" alt = "instagram logo" width = "115px" />
					</a>
				</div>
				<div class="p-2">
					<form action = "{{route('account_search_rslt')}}" method = "post">
						<input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>" />
						<input id = "inputSearch" autocomplete="off" type = "text" name = "keyword" placeholder = "search" style = "text-align:center;"/>
					</form>
					<div id = "modalSearch" class="hidden-submenu" style = "height:200px; width:300px; border:2px solid #dbdbdb; border-radius:5px; background-color:white; padding:5px ">
			 			<div class = "d-flex justify-content-between">
			 				<div>Recent</div>
							<div>Clear All</div>
						</div>
						<div class = "modal-dialog-scrollable">
							<div class = "modal-body">
								<div>1</div>
								<div>2</div>
								<div>3</div>
								<div>4</div>
								<div>5</div>
								<div>6</div>
								<div>7</div>
								<div>8</div>
								<div>9</div>
							</div>
						</div>
					</div>
				</div>
				<div class="p-1" style = "background-color:white;">
					<div class="d-flex justify-content-end">
						<div class = "p-2"><a href = "{{route('home_timeline_page')}}"><i class="material-icons" style = "font-size:30px; color:black;">home</i></a></div>
						<div class = "p-2"><a href = "{{route('home_inbox_page')}}"><i class='fab fa-facebook-messenger' style = "font-size:23px;  color:black;"></i></a></div>
						<div class = "p-2"><a href = "{{route('home_explore_page')}}"><i class="material-icons" style = "font-size:27px;  color:black;">explore</i></a></div>
						<div class = "p-2"><i class='far fa-heart' style = "font-size:23px;  color:black;"></i></div>
						<div class = "p-2">
							<div id = "container-dropdown-account">
								<div>
									<a href="javascript:void(0)" onclick = "dropSubmenu('account-submenu')"><img style = "border-radius: 50%;" src = "{{session('account_img_path')}}" width = "25px" /></a>
								</div>
								<div id="account-submenu" class="hidden-submenu">
									<div><a href="{{route('profile_page', ['account_name' => session('account_username')])}}">Profile</a></div>
									<div><a href="{{route('saved_post', ['account_name' => session('account_username')])}}">Saved</a></div>
									<div><a href="{{route('updt_account_pge')}}">Settings</a></div>
									<div><a href="{{route('switch_account_page')}}">Switch Account</a></div>
									<div style = "border-top:1px solid #dbdbdb;"><a href="{{route('logout')}}">Log Out</a></div>
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
		});
			 
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