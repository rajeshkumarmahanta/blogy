<?php
include("./config/config.php");
?>
<div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <div class="" id="cate">
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
                  <li><a href="search-result.php?query=<?php echo $nospace_cate; ?>" class="text-capitalize"><?php echo $category['category']; ?> <span><?php echo $category['count']; ?></span></a></li><?php
                                                                                                                                                    }
                                                                                                                                                  }
                                                                                                                                                      ?>
            </ul>
          </div>
          <button class="px-2 py-1 mt-4 text-white bg-secondary border-rounded rounded" id="catesMoreBtn">More Categories</button>
          </div>
          <script>
  let catesMoreBtn = document.getElementById("catesMoreBtn");
  let cate = document.getElementById("cate");
  let isOpenCat= false;
  catesMoreBtn.addEventListener("click", () => {
    isOpenCat =!isOpenCat;
    if(isOpenCat){
      cate.style.height = "auto";
      catesMoreBtn.innerText = "Close";
    }else{
      isOpenCat =false;
      cate.style.height = "266px";
      catesMoreBtn.innerText = "More categories";
    }
    
  })
</script>