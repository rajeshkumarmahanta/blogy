<?php
include("./config/config.php");
?>
<div class="col-lg-4 sidebar">

          <div class="sidebar-box search-form-wrap mb-4">
            <form action="search-result.php" class="sidebar-search-form">
              <span class="bi-search"></span>
              <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
            </form>
          </div>
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <h3 class="heading">Latest Posts</h3>
            <div class="post-entry-sidebar">
              <ul>

                <?php
                $latest_query = "SELECT * FROM blogs_tbl ORDER BY createdAt ASC LIMIT 3";
                $latest_result = mysqli_query($conn, $latest_query);
                if (mysqli_num_rows($latest_result) > 0) {
                  foreach ($latest_result as $latest_blog) { ?>
                    <li>
                      <a href="">
                        <img src="images/upload/blogs/<?php echo $latest_blog["image"]; ?>" alt="Image placeholder" class="me-4 rounded">
                        <div class="text">
                          <h4><?php
                              $latestTitle = $latest_blog["title"];
                              $shortTitleLat = substr($latestTitle, 0, 30) . " ...";
                              echo $shortTitleLat;

                              ?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php

                                                $date_string = $latest_blog["createdAt"];
                                                $date = new DateTime($date_string);

                                                $formatted_date = $date->format('M. jS, Y'); // 'M' for short month, 'jS' for day with suffix, 'Y' for year
                                                echo $formatted_date;
                                                ?></span>
                          </div>
                        </div>
                      </a>
                    </li> <?php
                        }
                      }
                          ?>
              </ul>
            </div>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
              <?php
              $sql_cate = "SELECT category, COUNT(*) AS count 
            FROM blogs_tbl 
            GROUP BY category";
              $result_cate = mysqli_query($conn, $sql_cate);
              if (mysqli_num_rows($result_cate) > 0) {
                foreach ($result_cate as $category) { 
                  $nospace_cate = str_replace(" ","", $category['category']);
                  ?>
                  <li><a href="search-result.php?search=<?php echo $nospace_cate; ?>" class="text-capitalize"><?php echo $category['category']; ?> <span><?php echo $category['count']; ?></span></a></li><?php
                                                                                                                                                    }
                                                                                                                                                  }
                                                                                                                                                      ?>
            </ul>
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
              <?php
              $tag_query = "select tags from blogs_tbl";
              $result_tag = mysqli_query($conn, $tag_query);
              $all_tags = [];

              if ($result_tag && mysqli_num_rows($result_tag) > 0) {
                // Loop through each blog and extract tags
                while ($row = mysqli_fetch_assoc($result_tag)) {
                  // Split the comma-separated tags into an array
                  $tags = explode(',', $row['tags']);

                  // Trim whitespace and merge them into the all_tags array
                  foreach ($tags as $tag) {
                    $all_tags[] = trim($tag);
                  }
                }

                // Remove duplicates using array_unique
                $all_tags = array_unique($all_tags);

                // Display the tags
                
                foreach ($all_tags as $tag) { 
                  $no_spaces = str_replace(' ', '', $tag);
                  ?>
                   <li><a href="search-result.php?search=<?php echo $no_spaces; ?>">
                    <?php echo $tag; ?>
                 </a></li> <?php
                }
              } else {
                echo 'No tags found.';
              }

              ?>
              <!-- <li><a href="#">
       tag;
      </a></li> -->

            </ul>
          </div>

        </div>