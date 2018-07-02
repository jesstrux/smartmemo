<?php
	$no_bootstrap = true;
	$css_file = "memo_read.css";
	include("partials/header.php");

	include("includes/getMemo.php");
?>
<?php include("includes/getUsers.php"); ?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
	<main class="layout">
		<?php include("partials/aside.php"); ?>

		<div id="siteContent" class="flex">
			<?php include("partials/navbar.php"); ?>

			<div id="mainContent">

				<?php
					$user_id= $_SESSION['user_id'];
					$result=getMemo::byId($con, $_GET['memo_id'], $user_id);
					$memo = mysqli_fetch_assoc($result);
				?>

				<section class="page-title layout vertical center-center">
					<h1 class="text-light">
						<?php echo $memo['title']; ?>
					</h1>
					<small class="text-light">
						<?php echo $memo['sent'] ? 'Sent To' : 'From' ?>: 
							<a href="#" class="link user-link">
								<?php echo getUsers::getFullname($con, $memo['other_user_id']) ?>
							</a>
						<br>
						<?php echo $memo['sent'] ? 'Sent' : 'Received' ?> On:
							<?php echo date("F jS Y", mktime($memo['created_at'])); ?>
					</small>
				</section>
				 <div class="section-wrapper">
					<section>
						<div id="memoContent">
							<div id="memoBody">
								<?php echo $memo['body']; ?>
							</div>

							<div id="attachments">
								<a href="#" class="attachment docx">
									<i class="zmdi"></i>
									<span class="trim-text">Math Test 1 first Draft.</span>
								</a>

								<a href="#" class="attachment xls">
									<i class="zmdi"></i>
									<span class="trim-text">Item Cost Breakdown</span>
								</a>

								<a href="#" class="attachment pdf">
									<i class="zmdi"></i>
									<span class="trim-text">Financial Report for the educated.</span>
								</a>

								<a href="#" class="attachment image">
									<i class="zmdi"></i>
									<span class="trim-text">Receipt Screenshots</span>
								</a>
							</div>
						</div>
					</section>
				 </div>

				<footer class="layout center-justified">
					Coyright &copy; Smart Memo 2018
				</footer>
			</div>
		</div>
	</main>
	
	<?php include("partials/js.php"); ?>
</body>
</html>