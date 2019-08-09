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

        <!-- Load table with annoncements if some have already been inserted -->
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
                                        <th>Date inserted</th>
                                        <th>Days to expiration</th>
                                        <th>Price</th>
                                        <th>Edit</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $propertyArray = DBConnection::getPropertiesByUserId($_SESSION['userId']);

                                        foreach ($propertyArray as $property) {

                                            echo "<tr>";
                                            echo "<td>" .  $property->getPropertyId() . "</td>";
                                            echo "<td>" .  $property->getTitle() . "</td>";
                                            echo "<td>" .  $property->getAddress() . "</td>";
                                            echo "<td>" .  $property->getDateInserted() . "</td>";
                                            echo "<td>" .  $property->getUpdateDate() . "</td>";
                                            echo "<td>" .  $property->getPrice() . "</td>";
                                            echo "<td> 
                                                    <a href=\"#\"><i class=\"fa fa-pencil-square-o\"></i></a>
                                                    <a href=\"#\"><i class=\"fa fa-trash\"></i></a>
                                                  </td>";
                                            echo "</tr>";
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
            <form class="form-container" method="post" action="userpage.php">
                <h1>Insert details</h1>

                <div>
                    <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Title" name="title" maxlength="60" size="60" required>
                </div>

                <div>
                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Address" name="address" maxlength="60" size="60" required>
                </div>

                <div>
                    <label for="description"><b>Description</b></label>
                    <textarea class="form-control" rows="5" name="description" required></textarea>
                </div>

                <div class="facilities">
                    <div>
                        <label for="bedrooms"><b><i class="fa fa-bed" style="font-size:30px;"></i></b></label>
                        <select name="bedrooms" required>
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
                        <select name="bathrooms" required>
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
                        <select name="parking" required>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                </div>

                <div class="details">
                    <div>
                        <label for="area"><b>Area (in m^2)</b></label>
                        <input type="number" placeholder="Area" name="area" min="1" max="10000" required>
                    </div>

                    <div>
                        <label for="year"><b>Property Building Year</b></label>
                        <input type="number" pattert="[0-9]{4}" placeholder="Year" name="year" min="1600" max="2019"required>
                    </div>

                    <div>
                        <label for="price"><b>Price per month (in €)</b></label>
                        <input type="number" pattert="[0-9]{4}" placeholder="Price" name="price" min="100" required>
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
