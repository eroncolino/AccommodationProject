<?php
/**
 * Created by PhpStorm.
 * User: Elena Roncolino ID: 14623
 * Date: 07/26/2019
 * Time: 6:11 PM
 */
?>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="#" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row">

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

            <div id="announcementForm">
                <form class="form-container" onsubmit="insertAnnouncement()">
                    <h1>Insert details</h1>

                    <label for="title"><b>Title</b></label>
                    <input type="text" placeholder="Title" name="title" required>

                    <label for="address"><b>Address</b></label>
                    <input type="text" placeholder="Address" name="address" required>

                    <label for="description"><b>Description</b></label>
                    <input type="text" placeholder="Description" name="description" required>

                    <label for="bedrooms"><b><i class="fa fa-bed" style="font-size:30px;"></i></b></label>
                    <select name="bedrooms">
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

                    <label for="parking"><b><i class="fa fa-car" style="font-size:30px;"></i></b></label>
                    <select name="parking" required>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>

                    <label for="area"><b>Area (in m^2)</b></label>
                    <input type="number" placeholder="Area" name="area" min="1" max="10000" step="5" required>

                    <label for="year"><b>Property Building Year</b></label>
                    <input type="number" pattert="[0-9]{4}" placeholder="Year" name="year" min="1600" max="2019" step="10" required>

                    <label for="price"><b>Price per month</b></label>
                    <input type="number" pattert="[0-9]{4}" placeholder="Price" name="price" min="100" step="100" required>

                    <button type="submit" class="btn">Publish</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>

                </form>
            </div>

        <?php else: ?>

            <div class="col-md-9 posts-row">
                <div class="card">
                    <div class="card-body">
                        <div class="row card-title">
                            <div class="col-md-2 border-right posts-subtitle">
                                <h4>Posts</h4>
                            </div>
                            <div class="col-md-6 add-new-button">
                                <button type="button" class="btn btn-sm btn-primary">Add New</button>
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
                                    <tr>
                                        <td><a href="#"><small>Johny</small></a></td>
                                        <td><small>Doe</small></td>
                                        <td><small>john@example.com</small></td>
                                        <td><small>Admin</small></td>
                                        <td><a href="#"><small>5</small></a></td>
                                        <td><small>Published 2018/05/21</small></td>
                                        <td>
                                            <a href="#"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>


    </div>
</div>
