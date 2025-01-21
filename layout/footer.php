<?php 
include("./config/config.php");

?><footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<?php 
				$sql="select about_1desc from about";
				$result = $conn->query($sql);
				$about=[];
				if($result->num_rows>0){
					$about =mysqli_fetch_assoc($result);

				}
				?>
						<p><?php echo $about['about_1desc']; ?></p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Quick Links</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="about.php">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="about.php">Vision</a></li>
							<li><a href="about.php">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">Recent Post Entry</h3>
						<div class="post-entry-footer">
							<ul>
								<?php
								$sql = "select * from blogs_tbl order by createdAt desc limit 2";
								$res = mysqli_query($conn,$sql);
								if(mysqli_num_rows($res)>0){
									foreach($res as $row){ ?>
									<li>
									<a href="">
										<img src="images/upload/blogs/<?php echo $row["image"]; ?>" style="    height: 82px;
    width: 90px;
    object-fit: cover;" alt="Image placeholder" class="me-4 rounded">
										<div class="text">
											<h4><?php
											$title = $row['title'];
											echo substr($title,0,30);
											?></h4>
											<div class="post-meta">
												<span class="mr-2"><?php 
												$date_string = $row["createdAt"];;
												$date = new DateTime($date_string);
		  
												$formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
												echo $formatted_date;
												?></span>
											</div>
										</div>
									</a>
								</li><?php

									}
								}
								
								?>
							</ul>
						</div>


					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
					<p>Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script>. All Rights Reserved. &mdash; Designed by <a href="">Rajesh</a> Distributed by <a href="#">Rajesh</a> 
					</p>
				</div>
			</div>
		</div> <!-- /.container -->
	</footer>