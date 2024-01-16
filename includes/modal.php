<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register Your Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="product-name" class="col-form-label">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name">
                        </div>
                        <div class="form-group">
                            <label for="product-description" class="col-form-label">Product Description</label>
                            <textarea class="form-control" id="product-description" name="product-description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-form-label">Product Image</label>

                            <div><input type="file" name="image"></div>

                        </div>
                        <div class="form-group">
                            <label for="date" class="col-form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Product Category</label>
                            <select class="form-control" id="product-category" name="product-category">
                                <option>Vegetable</option>
                                <option>Fruit</option>
                                <option>Grain</option>
                                <option>Pulses</option>
                                <option>Nut</option>
                                <option>Sugar and Starch</option>
                                <option>Spice</option>
                                <option>Oilseed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Available Stock (in Kg)</label>
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Select State</label>
                            <select class="form-control" id="state" name="state">
                                <option value="Andhra Pradesh">Andhra Pradesh</option>
                                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                <option value="Assam">Assam</option>
                                <option value="Bihar">Bihar</option>
                                <option value="Chandigarh">Chandigarh</option>
                                <option value="Chhattisgarh">Chhattisgarh</option>
                                <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                <option value="Daman and Diu">Daman and Diu</option>
                                <option value="Delhi">Delhi</option>
                                <option value="Lakshadweep">Lakshadweep</option>
                                <option value="Puducherry">Puducherry</option>
                                <option value="Goa">Goa</option>
                                <option value="Gujarat">Gujarat</option>
                                <option value="Haryana">Haryana</option>
                                <option value="Himachal Pradesh">Himachal Pradesh</option>
                                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                <option value="Jharkhand">Jharkhand</option>
                                <option value="Karnataka">Karnataka</option>
                                <option value="Kerala">Kerala</option>
                                <option value="Madhya Pradesh">Madhya Pradesh</option>
                                <option value="Maharashtra">Maharashtra</option>
                                <option value="Manipur">Manipur</option>
                                <option value="Meghalaya">Meghalaya</option>
                                <option value="Mizoram">Mizoram</option>
                                <option value="Nagaland">Nagaland</option>
                                <option value="Odisha">Odisha</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Rajasthan">Rajasthan</option>
                                <option value="Sikkim">Sikkim</option>
                                <option value="Tamil Nadu">Tamil Nadu</option>
                                <option value="Telangana">Telangana</option>
                                <option value="Tripura">Tripura</option>
                                <option value="Uttar Pradesh">Uttar Pradesh</option>
                                <option value="Uttarakhand">Uttarakhand</option>
                                <option value="West Bengal">West Bengal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Enter City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Contact Person Name</label>
                            <input type="text" class="form-control" id="person-name" name="person-name">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact-number" name="contact-number">
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">Email for communication</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

      <!-- Adding product details to database -->
      <?php
    if (isset($_POST['submit'])) {
        $productname = $_POST['product-name'];
        $productdescription = $_POST['product-description'];
        $date = $_POST['date'];
        $productcategory = $_POST['product-category'];
        $stock = $_POST['stock'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $personname = $_POST['person-name'];
        $contactnumber = $_POST['contact-number'];
        $email = $_POST['email'];

        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        // Allow certain file formats 
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

        $conn = mysqli_connect("localhost", "root", "root", "id17402499_bbdms") or die("error in connection");

        if (in_array($fileType, $allowTypes)) {

            $image = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($image));

            $sql = "INSERT INTO products(productname ,productdescription,date,productcategory,stock,state,city,personname,contactnumber,image,filename,email) VALUES('$productname' ,'$productdescription','$date','$productcategory','$stock','$state','$city','$personname','$contactnumber', '$imgContent','$fileName',' $email')" or die("error in query");
            $lastInsertId = mysqli_query($conn, $sql) or die("error in operation");

            if ($lastInsertId) {
                echo '<script>alert("Product information added succesfully !")</script>';
            } else {
                echo '<script>alert("Something went wrong. Please try again!")</script>';
            }
        } else {
            echo '<script>alert("File type not allowded!")</script>';
        }
    }
    ?>