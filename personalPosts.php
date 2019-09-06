<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 07/26/2019
 * Time: 6:11 PM
 */

include_once('Property.php');

?>

<div class="container-fluid">
    <div class="row announcements-row">

        <!-- Show insert first announcement button if no previous announcements are present-->
        <?php if (DBConnection::getPropertiesNumberByUserId($_SESSION["userId"]) == 0): ?>
            <div class="no-properties">
               <div class="row">
                    <div class="text">You haven't published any announcements yet.</div>

                    <div class="create-advert">
                        <button id="submit_advert_button" class="submit-advert-button btn btn-lg btn-primary btn-block text-uppercase" onclick="openForm()">
                             Create one now!
                        </button>
                    </div>
               </div>
            </div>

        <!-- Load table with announcements if some have already been inserted -->
        <?php else: ?>

            <div class="col-md-9 posts-row">
                <div class="card">
                    <div class="card-body">
                        <div class="row card-title">
                            <div class="col-md-2 border-right posts-subtitle">
                                <h4>Posts</h4>
                            </div>
                            <div class="col-md-6 add-new-button">
                                <button type="button" class="submit-advert-button btn btn-lg btn-primary btn-block text-uppercase" onclick="openForm()">Add New</button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-hover ">
                                    <thead class="bg-light ">
                                    <tr>
                                        <th>Property ID</th>
                                        <th>Title</th>
                                        <th>Address</th>
                                        <th>Description</th>
                                        <th><i class="fa fa-bed" style="font-size:25px;"></i></th>
                                        <th><i class="fa fa-bath" style="font-size:25px;"></i></th>
                                        <th><i class="fa fa-car" style="font-size:25px;"></i></th>
                                        <th>Expiration</th>
                                        <th>Price</th>
                                        <th>Edit</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $propertyArray = DBConnection::getPropertiesByUserId($_SESSION['userId']);

                                        foreach ($propertyArray as $property) {
                                            echo "<tr>";
                                            echo "<td>" . $property->getPropertyId() . "</td>";
                                            echo "<td>" . $property->getTitle() . "</td>";
                                            echo "<td>" . $property->getAddress() . "</td>";
                                            echo "<td>";
                                            if (strlen($property->getDescription()) > 50) {
                                                echo substr($property->getDescription(), 0, 50);
                                                echo '...<a id="descriptionLoader">&nbsp;[Read more]</a>';
                                                echo '...<a id="descriptionLoader">&nbsp;[Read more]</a>';
                                            } else {
                                                echo $property->getDescription();
                                            }
                                            echo "</td>";
                                            echo "<td>" . $property->getBedrooms() . "</td>";
                                            echo "<td>" . $property->getBathrooms() . "</td>";
                                            echo "<td>"; if ($property->getParking() == 0) {echo "No";} else {echo "Yes";}; echo "</td>";
                                            echo "<td>" . $property->getUpdateDate() . "</td>";
                                            echo "<td>" . $property->getPrice() . "</td>";
                                            echo "<td><div class=\"edit-buttons-row\">";
                                                    echo "<div class=\"calendar-button\"><a onclick=\"extendExpiration("; echo $property->getPropertyId(); echo ");\" title=\"Extend announcement expiration date\"><i class=\"fa fa-calendar\"></i></a></div>";
                                                    echo "<div class=\"edit-button\"><a onclick=\"editProperty(";
                                                    echo $property->getPropertyId();
                                                    echo ")\" ";
                                                    echo "\"  title=\"Edit announcement\"><i class=\"fa fa-pencil-square-o\"></i></a></div>
                                                    <div id=\"delete-property-button\" class=\"delete-button\"><a onclick=\"return confirm('Are you sure?');\" href=\"propertyDeletion.php?delete=true&propertyId="; echo $property->getPropertyId(); echo "\" title=\"Delete announcement\"><i class=\"fa fa-trash\"></i></a></div></div>
                                                  </td>";
                                            echo "</tr>";

                                            echo "<!-- The Modal --> <div id=\"myModal\" class=\"modal\">";
                                            echo "<div class=\"modal-content\">";
                                            echo "<div class=\"modal-header\">";
                                            echo "<div class='modal-title'><span>Description</span><span id=\"close-description-modal\" class=\"close-modal\">&times;</span></div>";
                                            $description = $property->getDescription();
                                            echo $description;
                                            echo "</div></div></div>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div id="announcementForm">
            <form name = "propertyForm" class="form-container" method="post" action="userpage.php">
                <h1>Insert details</h1>

                <div>
                    <label for="title"><b>Title</b></label>
                    <input id="form-property-title" type="text" placeholder="Title" name="title" maxlength="60" size="60" required>
                </div>

                <div>
                    <label for="address"><b>Address</b></label>
                    <input id="form-property-address" type="text" placeholder="Address" name="address" maxlength="60" size="60" required>
                </div>

                <div>
                    <label for="description"><b>Description</b></label>
                    <textarea id="form-property-description" class="form-control" rows="5" name="description" required></textarea>
                </div>

                <div class="facilities">
                    <div>
                        <label for="bedrooms"><b><i class="fa fa-bed" style="font-size:30px;"></i></b></label>
                        <select id="form-property-bedrooms" name="bedrooms" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div>
                        <label for="bathrooms"><b><i class="fa fa-bath" style="font-size:30px;"></i></b></label>
                        <select id="form-property-bathrooms" name="bathrooms" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>

                    <div>
                        <label for="parking"><b><i class="fa fa-car" style="font-size:30px;"></i></b></label>
                        <select id="form-property-parking" name="parking" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                </div>

                <div class="details">
                    <div>
                        <label for="area"><b>Area (in m^2)</b></label>
                        <input id="form-property-area" type="number" placeholder="Area" name="area" min="1" max="10000" required>
                    </div>

                    <div>
                        <label for="year"><b>Property Building Year</b></label>
                        <input id="form-property-year" type="number" pattert="[0-9]{4}" placeholder="Year" name="year" min="1600" max="2019"required>
                    </div>

                    <div>
                        <label for="price"><b>Price per month (in €)</b></label>
                        <input id="form-property-price" type="number" pattert="[0-9]{4}" placeholder="Price" name="price" min="100" required>
                    </div>
                </div>

                <div class="buttons-row">
                    <button type="submit" name="submit" class="btn btn-lg btn-primary text-uppercase">Publish</button>
                    <button type="button" class="btn btn-lg btn-primary text-uppercase cancel" onclick="closeForm()">Close</button>
                </div>

            </form>
        </div>

    </div>
</div>

<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // When the user clicks the button, open the modal
    document.getElementById("descriptionLoader").onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    document.getElementById("close-description-modal").onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>