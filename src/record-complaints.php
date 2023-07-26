<?php
    require "./classes/class-db-connector.php";
    use classes\DBConnector;

    $dbcon = new DBConnector();
    $con = $dbcon->getConnection();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Record Complaints</title>
    <link rel="icon" type="image/png" href="../assets/logo.png">

    <style>
        .traffic{
            display: none;
        }
    </style>
</head>

<body>
     <!------------------navbar---------------------------->
     <?php
        include 'navbar.php';
        renderNavBar();
    ?>
    <!---------------------------------------------------->

    <div class="container-md w-100 mt-5">
        <div class="row">
            <div class="col">
                <?php
                    if(isset($_GET["status"])){
                        if($_GET["status"] == "0"){
                            ?>
                            <div class="alert alert-success w-100 mt-5" role="alert">
                                Record inserted succesfully!
                            </div>
                            <?php
                        }
                        elseif ($_GET["status"] == "1"){
                            ?>
                            <div class="alert alert-danger w-100 mt-5" role="alert">
                                An error occured. Please try again!
                            </div>
                            <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <div class="containter-md d-flex justify-content-center ml-4 mr-4 mt-3">
        <div class="row">
            <div class="col-md w-100">
                <h3 class="h3 mt-5 mb-4 ml-5">New Complaint</h3>
                <form method="POST" action="process-complaints.php" enctype="multipart/form-data">
                    <table class="ml-3 w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="date">Date</label>
                                </td>
                                <td>
                                    <input type="date" id="date" name="date" class="mb-4 w-100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="category" class="mr-4">Complaint Category</label>
                                </td>
                                <td>
                                    <select id="category" name="category" class="mb-4 w-100">
                                        <option value="1">Abuse of Women or Children</option>
                                        <option value="2">Appreciation</option>
                                        <option value="3">Archeological Issue</option>
                                        <option value="4">Assault</option>
                                        <option value="5">Bribery and Corruption</option>
                                        <option value="6">Complaint against Police</option>
                                        <option value="7">Criminal Offence</option>
                                        <option value="8">Cybercrime</option>
                                        <option value="9">Demonstration / Protest / Strike</option>
                                        <option value="10">Environmental Issue</option>
                                        <option value="11">Exchange Fault</option>
                                        <option value="12">Foreign Employment Issue</option>
                                        <option value="13">Frauds / Cheating</option>
                                        <option value="14">House Breaking</option>
                                        <option value="15">Illegal Mining</option>
                                        <option value="16">Industrial / Labour Dispute</option>
                                        <option value="17">Information</option>
                                        <option value="18">Intellectual Property Dispute</option>
                                        <option value="19">Miscellaneous</option>
                                        <option value="20">Mischief / Sabotage</option>
                                        <option value="21">Murder</option>
                                        <option value="22">Narcotics / Dangerous Drugs </option>
                                        <option value="23">National Security</option>
                                        <option value="24">Natural Disaster</option>
                                        <option value="25">Offence / Act against Public Health</option>
                                        <option value="26">Offence against Public Property</option>
                                        <option value="27">Organized Crime</option>
                                        <option value="28">Personal Complaint</option>
                                        <option value="29">Police Clearance</option>
                                        <option value="30">Property Disputes</option>
                                        <option value="31">Robbery</option>
                                        <option value="32">Sexual Offences</option>
                                        <option value="33">Suggestion</option>
                                        <option value="34">Terrorism Related</option>
                                        <option value="35">Theft</option>
                                        <option value="36">Threat &amp; Intimidation</option>
                                        <option value="37">Tourist Harassment</option>
                                        <option value="38">Traffic &amp; Road Safety</option>
                                        <option value="39">Treasure Hunting</option>
                                        <option value="40">Vice Related</option>
                                        <option value="41">Violation of Immigration Laws</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="title">Complaint Title</label>
                                </td>
                                <td>
                                    <input type="text" id="title" name="title" class="mb-4 w-100" placeholder="Enter Complaint Title"/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="start-recording">Record Complaint</label>
                                </td>
                                <td>
                                    <button name="start-recording" id="start-recording" class="btn-danger mb-4">Start
                                        Recording</button>
                                    <button name="stop-recording" id="stop-recording" class="btn-dark mb-4">Stop
                                        Recording</button>
                                    <p id="isRecording">Click start to button to record</p>
                                    <audio src="" name="recording" id="audioElement" class="mb-4" controls></audio>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="comp_desc">Complaint In Text</label>
                                </td>
                                <td>
                                    <!--button name="start-speech" id="start-speech" class="btn-danger mb-2" disabled>Start</button>
                                    <button name="stop-speech" id="stop-speech" class="btn-dark mb-2" disabled>Stop</button-->
                                    <textarea id="comp_desc" name="comp_desc" rows="10" cols="40" class="mb-4" placeholder="Type the complaint in text"></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_type">Type</label>
                                </td>
                                <td>
                                    <select name="people_type" id="people_type" class="mb-4 w-100">
                                        <option value="Plantiff">Plantiff</option>
                                        <option value="Suspect">Suspect</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_nic">NIC</label>
                                </td>
                                <td>
                                    <input list="people_nics" name="people_nic" id="people_nic" class="mb-4 w-100" placeholder="Person's NIC" onchange="fillDetails(this.value)" value="">
                                    <datalist id="people_nics" name="people_nic" class="mb-4 w-100">     
                                        <?php 
                                            try{
                                                $query = "SELECT nic FROM people";
                                                $pstmt = $con->prepare($query);
                                                $pstmt->execute();
                                                $rows = $pstmt->fetchAll(PDO::FETCH_ASSOC);

                                                foreach($rows as $row){
                                                    ?>
                                                    <option value="<?php echo $row["nic"]; ?>"></option>
                                                    <?php
                                                }
                                            }catch(PDOException $e){}
                                        ?>
                                    </datalist>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_name">Name</label>
                                </td>
                                <td>
                                    <input type="text" id="people_name" name="people_name" class="mb-4 w-100" placeholder="Person's Name" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_address">Address</label>
                                </td>
                                <td>
                                    <input type="text" id="people_address" name="people_address" class="mb-4 w-100" placeholder="Person's Address" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_contact">Contact</label>
                                </td>
                                <td>
                                    <input type="text" id="people_contact" name="people_contact" class="mb-4 w-100" placeholder="Person's Contact" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="people_email">Email</label>
                                </td>
                                <td>
                                    <input type="email" id="people_email" name="people_email" class="mb-4 w-100" placeholder="Person's Email" value=""/>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="location">Location</label>
                                </td>
                                <td>
                                    <input type="hidden" name="selectedCity" id="selectedCity" value=""/>
                                    <input type="hidden" name="selectedLat" id="selectedLat" value=""/>
                                    <input type="hidden" name="selectedLon" id="selectedLon" value=""/>
                                    <select id="city" name="city" class="mb-4 w-100"></select>                           
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="comp_status">Complaint Status</label>
                                </td>
                                <td>
                                    <select name="comp_status" id="comp_status" class="mb-4 w-100">
                                        <option value="Ongoing">Ongoing</option>
                                        <option value="Resolved">Resolved</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="emp_id">Recorded By</label>
                                </td>
                                <td>                
                                    <input list="emp_ids" name="emp_id" id="emp_id" class="mb-4 w-100" placeholder="Employee ID">
                                    <datalist id="emp_ids" name="emp_id" class="mb-4 w-100">     
                                        <?php
                                            $query2 = "SELECT empID FROM employee WHERE retired_status=?";
                                            $pstmt2 = $con->prepare($query2);
                                            $pstmt2->bindValue(1,0);
                                            $pstmt2->execute();
                                            $rows2 = $pstmt2->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($rows2 as $row){
                                                ?>
                                                <option value="<?php echo $row["empID"]; ?>"></option>
                                                <?php
                                            }
                                        ?>
                                    </datalist>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="ml-3 w-100 traffic">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td>
                                    <label for="vehicle_number">Vehicle Number</label>
                                </td>
                                <td>
                                    <input type="text" id="vehicle_number" name="vehicle_number" class="mb-4 w-100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="temp_start" class="mr-4">Temporary License Start Date</label>
                                </td>
                                <td>
                                    <input type="date" id="temp_start" name="temp_start" class="mb-4 w-100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="temp_end">Temporary License End Date</label>
                                </td>
                                <td>
                                    <input type="date" id="temp_end" name="temp_end" class="mb-4 w-100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="fine_amount">Fine Amount</label>
                                </td>
                                <td>
                                    <input type="text" id="fine_amount" name="fine_amount" class="mb-4 w-100" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="fine_status">Fine Status</label>
                                </td>
                                <td>
                                    <select name="fine_status" id="fine_status" class="mb-4 w-100">
                                        <option value="unpaid">Unpaid</option>    
                                        <option value="paid">Paid</option>
                                    </select>
                                </td>
                            </tr>
                         </tbody>
                    </table>

                    <table class="ml-3 w-100">
                        <thead></thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <input type="submit" name="add" value="Add New" class="btn-primary mb-4 w-25">
                                    <input type="submit" name="update" value="Update" class="btn-warning mb-4 w-25">
                                    <input type="reset" name="reset" value="Reset" class="btn-dark mb-4 w-25">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>

            <div class="col-md mt-5">
                <h3 class="h3 mb-4">Complaint History</h3>
                <div class="row mb-4">
                    <div class="col-md">
                        <label for="sort_type" class="mr-3">Sort By</label>
                        <select name="sort_type" id="sort_type">
                            <option value="id">Complaint ID</option>
                            <option value="title">Complaint Title</option>
                            <option value="date">Date</option>
                            <option value="emp">Employee</option>
                        </select>
                    </div>
                    <div class="col-md">
                        <label for="search" class="mr-3">Search</label>
                        <input type="text" id="search" name="search" placeholder="Enter Text to Search">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md mr-3">
                        <table class="table table-primary table-striped-columns">
                            <thead>
                                <tr>
                                    <th>Complaint ID</th>
                                    <th>Date</th>
                                    <th>Complaint Category</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Recorded By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>C0001</td>
                                    <td>14/07/2023</td>
                                    <td>Traffic</td>
                                    <td>Sachini Thakshila</td>
                                    <td>Ongoing</td>
                                    <td>EMP0005</td>
                                </tr>
                                <tr>
                                    <td>C0002</td>
                                    <td>12/04/2023</td>
                                    <td>Environmental Issue</td>
                                    <td>Gimhani Snadeepani</td>
                                    <td>Ongoing</td>
                                    <td>EMP0002</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--button name="start-speech" id="start-speech" class="btn-danger mb-4">Start Speech</button>
        <button name="stop-speech" id="stop-speech" class="btn-dark mb-4">Stop Speech</button-->
        <!--div class="p-3" style="border: 1px solid #000; height: 300px;">
            <span id="final" class="text-dark"></span>
            <span id="interim" class="text-secondary"></span>
        </div-->
        
    </div>

    <script>
        function fillDetails(str){
            let name = document.getElementById("people_name");
            let address = document.getElementById("people_address");
            let contact = document.getElementById("people_contact");
            let email = document.getElementById("people_email");

            if(str.length == 0){
                name.value = "";
                address.value = "";
                contact.value - "";
                email.value = "";
            }
            else{
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        var obj = JSON.parse(this.responseText);
                        name.value = obj[0];
                        address.value = obj[1];
                        contact.value = obj[2];
                        email.value = obj[3];
                    }
                };

                xmlhttp.open("GET", "./scripts/people-auto-fill.php?nic=" + str, true);
                xmlhttp.send();
            }
        }
    </script>

    <!-- SHOW/ HIDE TRAFFIC COMPLAINTS -->
    <script type="text/javascript">
        let tableID = document.querySelector(".traffic");
        let category = document.getElementById("category");
        
        category.addEventListener("change", function(){
            if(category.value == "38"){
                tableID.style.display = "block";
            }
            else{
                tableID.style.display = "none";
            }
        });
    </script>

     <!-- FILL CITIES BASED ON DISTRICT -->
    <script type="module">
        import {Badulla} from "../assets/sl-cities/badulla.js";

        city = document.getElementById("city");
        for(let i=0; i<Badulla.length; i++){
            city.options[i] = new Option(Badulla[i]["city"], i);
        }
    </script>
    
    <script type="module">
        import {Badulla} from "../assets/sl-cities/badulla.js";

        let selectedCity = document.getElementById("selectedCity");
        let lat = document.getElementById("selectedLat");
        let lon = document.getElementById("selectedLon");
        let city = document.getElementById("city");

        city.addEventListener("change", function(){
            selectedCity.value = Badulla[city.value]["city"];
            lat.value = Badulla[city.value]["latitude"];
            lon.value = Badulla[city.value]["longitude"];
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="../js/complaint-recorder.js"></script>
</body>
</html>