<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 12/27/2018
 * Time: 3:01 PM
 */
?>

<div class="main-houses">

    <h3>Properties</h3>

    <div class="properties-container">

        <?php
        //Code for pagination
        include 'DBConnection.php';

        if (isset($_GET['page_no']) && $_GET['page_no'] != "") {
            $page_no = $_GET['page_no'];
        } else {
            $page_no = 1;
        }

        $properties_per_page = 9;
        $offset = ($page_no - 1) * $properties_per_page;
        $previous_page = $page_no - 1;
        $next_page = $page_no + 1;
        $adjacents = "2";

        $total_no_of_properties = DBConnection::getInstance()->getNumberOfProperties();
        $total_no_of_pages = ceil($total_no_of_properties / $properties_per_page);
        $second_last = $total_no_of_pages - 1;

        $selected_properties = DBConnection::getInstance()->getPropertiesWithOffset($offset, $properties_per_page);

        echo '<div class="property-display-container">';

        foreach ($selected_properties as $property) {
            echo '<div class="item">' . $property->getPropertyId() . '</div>';
        }

        //Create empty elements as placeholder for displaying properties correctly
        $empty_elements = (count($selected_properties) % 3);

        for ($x = 0; $x < $empty_elements; $x++) {
            echo '<div class="item"></div>';
        }

        echo "</div>";
        ?>

        <div class="pagination-row">
            <ul class="pagination">
                <?php
                if ($page_no > 1) {
                    echo '<li><a href="?page_no=1">First Page</a></li>';
                }
                ?>

                <li <?php if ($page_no <= 1) {
                    echo 'class="disabled"';
                } ?> >
                    <a <?php if ($page_no > 1) {
                        echo "href='?page_no=$previous_page'";
                    } ?> >Previous
                    </a>
                </li>

                <?php
                if ($total_no_of_pages <= 10) {
                    for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                } elseif ($total_no_of_pages > 10) {
                    if ($page_no <= 4) {
                        for ($counter = 1; $counter < 8; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li class='active'><a>$counter</a></li>";
                            } else {
                                echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                        }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                    }
                } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                    echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for (
                        $counter = $page_no - $adjacents;
                        $counter <= $page_no + $adjacents;
                        $counter++
                    ) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                    echo "<li><a>...</a></li>";
                    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                } else {
                    echo "<li><a href='?page_no=1'>1</a></li>";
                    echo "<li><a href='?page_no=2'>2</a></li>";
                    echo "<li><a>...</a></li>";
                    for (
                        $counter = $total_no_of_pages - 6;
                        $counter <= $total_no_of_pages;
                        $counter++
                    ) {
                        if ($counter == $page_no) {
                            echo "<li class='active'><a>$counter</a></li>";
                        } else {
                            echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                        }
                    }
                }
                ?>

                <li <?php if ($page_no >= $total_no_of_pages) {
                    echo "class='disabled'";
                } ?>>
                    <a <?php if ($page_no < $total_no_of_pages) {
                        echo "href='?page_no=$next_page'";
                    } ?>>Next</a>
                </li>

                <?php if ($page_no < $total_no_of_pages) {
                    echo "<li><a href='?page_no=$total_no_of_pages'>Last</a></li>";
                }


                ?>

            </ul>
        </div>


    </div>
</div>
