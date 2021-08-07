<head>
  <meta charset="utf-8">

  <title>Clocks</title>

  <!-- Font Awesome -->
  <script src="https://use.fontawesome.com/9adb65dd0f.js"></script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>

  <!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>

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
$conn = include __DIR__ . '/../src/dblogin.php';
$loginCookie = include "logincookie.php";

$firstName; $lastName; $imgUrl; $jobTitle;

if (isset($_COOKIE[$loginCookie])) {
	$token = $_COOKIE["$loginCookie"];
	$stmt = $conn->prepare("SELECT `empID` FROM `loginInfo` WHERE `token` = :token");
    $stmt->execute(['token' => $token]); 
    $data = $stmt->fetchAll();

	foreach ($data as $row)	{		
		$empID = $row["empID"];
		$ustmt = $conn->prepare("SELECT `picName`, `firstName`, `secondName`, `jobTitle` FROM `Employees` WHERE `ID` = :ID");
		$ustmt->execute(['ID' => $empID]); 
		$userData = $ustmt->fetchAll();
		foreach ($userData as $urow) {
			$firstName = $urow["firstName"];
			$lastName = $urow["secondName"];
			$jobTitle = $urow["jobTitle"];
			$imgUrl = '/images/employees/' . $urow["picName"];
		}
	}
} else {
    Header("Location: login.php");
}

//Display navbar with user icon 
echo "
<nav class='navBar'>
    <button id='menu-button' class='openMenuButton' type='button'>
        <i class='fa fa-bars' aria-hidden='true'></i>
    </button>
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
</nav>"; ?>

<!-- Display User Overlay -->


<!-- Display menu -->
<div class="menu">
	<ul class="menuNav">
		<li class="navButton">
			<button class="menuBtn btn">Home</button>
		</li>
		<li class="navButton navBtnDD">
			<button class="menuBtn btn">Clocks</button>
			<ul class="navDropdown">
				<li class="dropdownButton">
					<button class="dropdownBtn btn">Clocked In</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
			</ul>
		</li>
		<li class="navButton navBtnDD">
			<button class="menuBtn btn">Parts</button>
			<ul class="navDropdown">
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
				<li class="dropdownButton">
					<button class="dropdownBtn btn">N/A</button>
				</li>
			</ul>
		</li>
		<li class="navButton">
			<button class="menuBtn btn">Work Orders</button>
		</li>
	</ul>
</div>