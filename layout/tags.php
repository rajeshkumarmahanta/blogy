<?php
include("./config/config.php");
?>
<div class="sidebar-box">
  <h3 class="heading">Tags</h3>
  <div class="" id="tag">
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
          <li><a href="search-result.php?query=<?php echo $no_spaces; ?>">
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
  <button class="px-2 py-1 mt-4 text-white bg-secondary border-rounded rounded" id="tagsMoreBtn">More tags</button>
</div>

<script>
  let tagsMoreBtn = document.getElementById("tagsMoreBtn");
  let tag = document.getElementById("tag");
  let isOpen= false;
  tagsMoreBtn.addEventListener("click", () => {
    isOpen =!isOpen;
    if(isOpen){
      tag.style.height = "auto";
      tagsMoreBtn.innerText = "Close";
    }else{
      isOpen =false;
      tag.style.height = "266px";
      tagsMoreBtn.innerText = "More tags";
    }
    
  })
</script>