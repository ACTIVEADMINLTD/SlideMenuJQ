<head>
  <meta charset="utf-8">

  <title>Clocks</title>

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/9adb65dd0f.js"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>

  <!-- Menu animations in JQuery -->
  <script src='js/menu.js'></script>
  <!-- User Overlay in JQuery -->
  <script src='js/userIcon.js'></script>
  <!-- Main stylesheet -->
  <link rel="stylesheet" href="css/desktop.css">
  <!-- Personal stylesheet -->
  <link rel="stylesheet" href="css/menu.css">
</head>

<!-- Get user data from database using cookie -->
<?php

//Uncomment and include a PDO database login which returns the connection as $conn & a login token stored in a cookie
/* $conn = include __DIR__ . '/../src/dblogin.php';
$loginCookie = include "logincookie.php";

//Vars for user overlay
$firstName; $lastName; $imgUrl; $jobTitle;

if (isset($_COOKIE[$loginCookie])) {
	//Get token from cookie
	$token = $_COOKIE["$loginCookie"];
	//Edit this to your database fields
	$stmt = $conn->prepare("SELECT `empID` FROM `loginInfo` WHERE `token` = :token");
    $stmt->execute(['token' => $token]); 
    $data = $stmt->fetchAll();
	//Find all users with this token

	foreach ($data as $row)	{		
		$empID = $row["empID"];
		//Edit this to your database fields
		$ustmt = $conn->prepare("SELECT `picName`, `firstName`, `secondName`, `jobTitle` FROM `Employees` WHERE `ID` = :ID");
		$ustmt->execute(['ID' => $empID]); 
		$userData = $ustmt->fetchAll();
		//Get userdata from login info
		foreach ($userData as $urow) {
			//save data to variables
			$firstName = $urow["firstName"];
			$lastName = $urow["secondName"];
			$jobTitle = $urow["jobTitle"];
			$imgUrl = '/images/employees/' . $urow["picName"];
		}
	}
} else {
	//Redirects to login page if cookie not found
    Header("Location: login.php");
} */

//Display navbar with user icon 
echo "
<nav class='navBar'>
    <button id='menu-button' class='openMenuButton' type='button'>
        <i class='fa fa-bars' aria-hidden='true'></i>
    </button>
	"/* Delete line to enable user icon
	<div class='userIcon'>
		<div class='userIconText'>
			<h2 class='font-weight-light'>$firstName $lastName</h2>
			<h4 class='font-weight-light'>$jobTitle</h4>
		</div>
		<img src='$imgUrl' class='userImg'>
		<div class='userOverlay'>
		    <button class='settingsButton' type=button><i class='fa fa-cog' aria-hidden='true'></i></button>
			<button class='logOutButton' type=button><i class='fa fa-sign-out' aria-hidden='true'></i></button>
		</div>
	</div>
	Delete line to enable user icon */"
</nav>"; ?>

<!-- Display User Overlay -->


<!-- To create new items on the menu, follow this structure
	No dropdown:
		<li class="navButton">
			<button class="menuBtn btn">No Dropdown</button>
		</li>

	Dropdown:
		<li class="navButton navBtnDD">
			<button class="menuBtn btn">Dropdown</button>
			<ul class="navDropdown">
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 1</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">...</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 9</button>
				</li>
			</ul>
		</li>
-->

<!-- Display menu -->
<div class="menu">
	<ul class="menuNav">
		<li class="navButton">
			<button class="menuBtn btn">No Dropdown</button>
		</li>
		<li class="navButton navBtnDD">
			<button class="menuBtn btn">Dropdown</button>
			<ul class="navDropdown">
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 1</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 2</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 3</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 4</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 5</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 6</button>
				</li>
			</ul>
		</li>
		<li class="navButton navBtnDD">
			<button class="menuBtn btn">Dropdown</button>
			<ul class="navDropdown">
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 1</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 2</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 3</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 4</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 5</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Option 6</button>
				</li>
			</ul>
		</li>
		<li class="navButton">
			<button class="menuBtn btn">No Dropdown</button>
		</li>
	</ul>
</div>