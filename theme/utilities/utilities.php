<?php

function showArchives() { ?>

  <?php $query_year = get_query_var('year'); ?>

  <nav class="archives__navigation">

        <div role="menu" class="archives__yearly swiper">

          <div class="swiper-wrapper">

           <?php
                global $wpdb;
                $years = $wpdb->get_col(
                    "SELECT DISTINCT YEAR(post_date) 
                    FROM $wpdb->posts 
                    WHERE post_status = 'publish' 
                    AND post_type ='post' 
                    ORDER BY post_date DESC"
                );
                $count = 1;
                foreach($years as $year) :
                    $yearQuery = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' AND YEAR(post_date) = ". $year);

        ?>

          <div class="swiper-slide">
                  <div class="archives__tab <?php if( ( $query_year && $query_year == $year ) || ( !$query_year && $count == 1 ) ) echo 'open';?>" data-content="<?php echo $count;?>">
                    <span class="archives__top-link"> <?php echo $year; ?></span>
                  </div>
          </div>

                <?php $count++ ;?>
            <?php endforeach; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>

        </div>
          <div class="archives__tab-content-wrapper">

            <?php
            global $wpdb;
            $years = $wpdb->get_col(
              "SELECT DISTINCT YEAR(post_date) 
                    FROM $wpdb->posts 
                    WHERE post_status = 'publish' 
                    AND post_type ='post' 
                    ORDER BY post_date DESC"
            );
            $count = 1;
            foreach($years as $year) :
              $yearQuery = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' AND YEAR(post_date) = ". $year);

              ?>

                <div class="archives__tab-content <?php if( ( $query_year && $query_year == $year ) || ( !$query_year && $count == 1 ) ) echo 'show-content';?>" data-content="<?php echo $count;?>">
                  <?php
                  $months = $wpdb->get_col("
                            SELECT DISTINCT MONTH(post_date) 
                            FROM $wpdb->posts 
                            WHERE post_status = 'publish' 
                            AND post_type ='post' 
                            AND YEAR(post_date) = '".$year."' ORDER BY post_date DESC");
                  foreach($months as $month) :
                    $monthQuery = $wpdb->get_var("SELECT count(ID) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' AND MONTH(post_date) = ". $month);
                    ?>
                    <div class="archives__inner-list-item">
                      <a class="archives__inner-list-link" href="<?php echo get_month_link($year, $month); ?>"><?php echo date( 'F', mktime(0, 0, 0, $month) );?></a>
                    </div>
                  <?php endforeach; ?>
                </div>

              <?php $count++ ;?>
            <?php endforeach; ?>

          </div>

    </nav>
<?php
}

function get_id_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) {
    return $page->ID;
  } else {
    return null;
  }
}

function array_flatten($array) {
  if (!is_array($array)) {
    return FALSE;
  }
  $result = array();
  foreach ($array as $key => $value) {
    if (is_array($value)) {
      $result = array_merge($result, array_flatten($value));
    }
    else {
      $result[$key] = $value;
    }
  }
  return $result;
}

add_filter('acf/validate_value/name=end_date', 'validate_end_date_func', 10, 4);
function validate_end_date_func($valid, $value, $field, $input) {
  if (!$valid) {
    return $valid;
  }
  $start_key = 'field_63dfac20207b0';
  $end_key = 'field_63dfacad207b1';
  $group_key = 'field_63dfabe3207ae';
  $start_value = $_POST['acf'][$group_key][$start_key];
  $start_value = new DateTime($start_value);
  $end_value = $_POST['acf'][$group_key][$end_key];
  $end_value = new DateTime($end_value);

  if ($end_value <= $start_value) {
    $valid = 'The end date cannot be earlier than the start date';
  }
  return $valid;
}

