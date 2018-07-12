<?php
    // $no_bootstrap = true;
include("partials/header.php");
?>
<?php include("includes/getUsers.php"); ?>
<link rel="stylesheet" href="css/staff_home.css">

<body class="show-na">
	<main class="layout">
		<?php include("partials/aside.php"); ?>

		<div id="siteContent" class="flex">
			<?php include("partials/navbar.php"); ?>

			<div id="mainContent">
				<section class="page-title layout vertical center-center">
					<h1 class="text-light">
						Request Drive Folder Access<br>
						<span>(DRAFT)</span>
					</h1>
					<small class="text-light">
						Recepients <a href="#" class="link user-link">James Hose</a>, <a href="#" class="link user-link user-group">Upper Management</a>
					</small>

					<div class="buttons layout center-justified">
						<a href="memo-read.html" class="rounded-btn btn-sm imperfec">Continue Editting</a>
						<button class="rounded-btn btn-sm btn-success imperfec">Send Memo</button>
					</div>
				</section>
				 <div class="section-wrapper">
					<section>
						<div id="memoContent">
							<div id="memoBody">
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis enim eaque suscipit, labore, repellat inventore quos repudiandae totam animi ab voluptate libero, consequatur modi quibusdam ullam? Enim incidunt cupiditate odit. <br><br>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis enim eaque suscipit, labore, repellat inventore quos repudiandae totam animi ab voluptate libero, consequatur modi quibusdam ullam? Enim incidunt cupiditate odit. <br><br>
								Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis enim eaque suscipit, labore, repellat inventore quos repudiandae totam animi ab voluptate libero, consequatur modi quibusdam ullam? Enim incidunt cupiditate odit.
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

							<div class="buttons layout center-justified">
								<a href="memo-read.html" class="rounded-btn">Continue Editting</a>&nbsp;&nbsp;
								<button class="rounded-btn btn-sm btn-success">&emsp;Send Memo&emsp;</button>
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