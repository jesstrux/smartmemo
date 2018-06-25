<?php
    $no_bootstrap = true;
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
					<i class="zmdi zmdi-border-color"></i>
					<h1 class="text-light">Memo Drafts</h1>
				</section>

				 <div class="section-wrapper">
					<section>
						<div>
							<a href="memo-read-draft.html" class="memo-item">
								<span class="date">May 15</span>
								<h4>Request drive folder access &nbsp;
									<i class="zmdi zmdi-chevron-right"></i> &nbsp; Barikieli Chamikye</h4>
								<p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
							</a>

							<a href="memo-read-draft.html" class="memo-item">
								<span class="date">May 3</span>
								<h4>Fund Re-Embursment &nbsp; <i class="zmdi zmdi-chevron-right"></i> &nbsp; Accounting Department</h4>
								<p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>

								<div class="attachments">
									<div class="attachment pdf" title="Financial Report for the educated.">
										<i class="zmdi"></i>
										<span class="trim-text">Financial Report for the educated.</span>
									</div>

									<div class="attachment xls" title="Financial Report for the educated.">
										<i class="zmdi"></i>
										<span class="trim-text">Item cost breakdown.</span>
									</div>
								</div>
							</a>

							<a href="memo-read-draft.html" class="memo-item">
								<span class="date">April 17</span>
								<h4>Last Year Notes &nbsp;
									<i class="zmdi zmdi-chevron-right"></i> &nbsp; Feston Chambili</h4>
									<p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
							</a>

							<a href="memo-read-draft.html" class="memo-item">
								<h4>Socialist Test One First Draft &nbsp;
									<i class="zmdi zmdi-chevron-right"></i> &nbsp; HOD Social Protection</h4>
								<span class="date">May 15</span>
									<p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>

								<div class="attachments">
									<div class="attachment docx" title="Math Test 1 first Draft">
										<i class="zmdi"></i>
										<span class="trim-text">Math Test 1 first Draft.</span>
									</div>
								</div>
							</a>

							<a href="memo-read-draft.html" class="memo-item">
								<h4>Unqualified Student Removal &nbsp;
									<i class="zmdi zmdi-chevron-right"></i> &nbsp; Dean of School</h4>
								<span class="date">May 15</span>
									<p class="trim-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Tenetur ad delectus aperiam ipsum isnaf asljhlfas ajkfasflal asojktwpjklfas</p>
							</a>
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