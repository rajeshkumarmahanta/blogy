<?php
include("./config/config.php");
?>
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
                      <a href="single.php?id=<?php echo $latest_blog["id"]; ?>">
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