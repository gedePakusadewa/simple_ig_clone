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
		<style>
			.hidden-submenu{
				 display:none;
				 position:absolute;
				 background-color:black;
				 padding:5px 10px 5px 9px;
				 width:190px;
				 z-index:1;
			 }
		</style>
	</head>
	<body class = "bg-light">
            <h1>INSTAGRAM</h1>
			<form>
				<input type = "text" name = "search" placeholder = "search" />
				<button type = "submit" >Search</button>
			</form>

			<div class="d-flex p-3 bg-secondary text-white">
				<div class = "p-2"><a href = "{{route('home_timeline_page')}}">home</a></div>
				<div class = "p-2">inbox</div>
				<div class = "p-2"><a href = "{{route('home_explore_page')}}">explore</a></div>
				<div class = "p-2">like</div>
				<div class = "p-2">
					<div id = "container-dropdown-account">
						<div>
							<a href="javascript:void(0)" onclick = "dropSubmenu('account-submenu')">Account</a>
						</div>
						<div id="account-submenu" class="hidden-submenu">
							<div><a href="{{route('profile_page', ['account_name' => session('account_username')])}}">Profile</a></div>
							<div><a href="">Saved</a></div>
							<div><a href="{{route('updt_account_pge')}}">Settings</a></div>
							<div><a href="">Switch Account</a></div>
							<div><a href="{{route('logout')}}">Log Out</a></div>
						</div>
					</div>	
				</div>
			</div>
			<div>
		        @yield('content')
		    </div>
	</body>

	<script>

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

		});
			
	</script>
</html>