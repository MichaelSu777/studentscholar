<?php
  session_start();
    require("connect.php");
    if ($_SESSION["username"]){
    $username = $_SESSION["username"];
    $classes = array();
    $check_u = mysqli_query($con, "SELECT * FROM users WHERE email='".$username."'");
        $check_d = mysqli_query($con, $sql = "SELECT * FROM `classes`");
        $check_s = mysqli_query($con, $sql = "SELECT * FROM `schools`");
    while ($row_s = mysqli_fetch_assoc($check_s)){
        $name = $row_s['name'];
        $short = $row_s['short_name'];
        $location = $row_s['location'];
        $shrt_name= $row_d['short_name'];
        array_push($classes, $name);
    }

     while ($row_d = mysqli_fetch_assoc($check_d)){
        $school = $row_d['school_name'];
        $class = $row_d['name'];
        $teacher = $row_d['id'];
        $school_id = $row_d['school_id'];
  
        $clas            = $row_d['class_type'];
        $bio             = $row_d['bio'];
        $teachername     = ucwords(str_replace("_", "", strstr($clas, '_'))); //remove everything behind _, then replace
        array_push($classes, $class. ' '.$teachername);

    }
    while ($row_u = mysqli_fetch_assoc($check_u)){
        $fname = $row_u['fname'];
        $lname = $row_u['lname'];
        $uname = $row_u['username'];
        $grade = $row_u['grade'];
    }
     $check_classes = mysqli_query($con, $sql = "SELECT * FROM `users` WHERE school_id='".$school_id."'");
        $num_school_classes = mysqli_num_rows($check_classes);
$num_data =  count($classes);

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

body {
  font: 16px Arial;  
}

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  display: inline-block;
}

.autocomplete-items {

}

.autocomplete-items div {
display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    padding-top: 8px;
    padding-bottom: 8px;
    padding-left: 10px;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -ms-flex-align: center;
    align-items: center;
    
}

.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9; 
}

.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
    <link href="./nav_files/studentscholar.webflow.1ab591037.css" rel="stylesheet" type="text/css">
    <script src="./nav_files/webfont.js.download" type="text/javascript"></script>
    <link rel="stylesheet" href="./nav_files/css">
    
</head>     

<body>


      <div data-collapse="medium" data-animation="default" data-duration="400" data-w-id="4e3dc43a-8655-e3e8-eb2c-f79d216110ef" class="navbar w-nav">

          <div data-w-id="4e3dc43a-8655-e3e8-eb2c-f79d216110f4" class="nav-search nav-shrink-mobile">
                <a class="w-inline-block"><img src="./dashboard_files/5b535ceaeadb587329b81bb7_icons8-search-128 (1).png" width="32"></a>
      
                
                <!--Make sure the form has the autocomplete function switched off:-->
                <form autocomplete="off" action="search.php" method="POST" style="width: 100%;" action="search.php">
               
                    <input type="text" class="input invis-mobile-2 w-input" maxlength="256" id="myInput" name="search" data-name="Field 5" placeholder="Search for schools and classes" id="field-5" required="">
                                    <div class="nav-suggest-div w-hidden-small w-hidden-tiny" style="display:block;">
                </div>

                    <button style="display: none;" name="searching" class="search">Search</button></p>
   
                </form>
         
            </div>

            <a href="#" class="icon-button w-inline-block"><img src="./dashboard_files/5b5ef0392461b343595d2066_icons8-jingle-bell-64.png" width="32" height="32">
                <div class="mail-notif">
                    <div>2</div>
                </div>
            </a>
            <a href="#" class="icon-button margin-15l w-inline-block"><img src="./dashboard_files/5b5e7ddee90d4808d9a342d3_icons8-communication-64.png" width="32" height="32">
                <div class="mail-notif">
                    <div>19</div>
                </div>
            </a>
            <div data-w-id="fdac4fc6-6f79-0549-b76b-d4d59fdb31d3" class="nav-user"><img src="./dashboard_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="32" height="32" class="user">
                <div class="margin-5l flex-stretch invisible w-hidden-tiny">
                    <div><strong><?php echo $fname . ' ' . $lname; ?></strong></div>
                    <div>@<?php echo $uname; ?></div>
                </div>
                <div class="nav-user-drop-down">
                    <div class="nav-user-div"><img src="./dashboard_files/5b52dbafe5d2a8e35f98ad0b_icons8-ping-pong-100.png" width="48" height="48">
                        <div class="nav-user-name-div">
                            <div class="semi-bold"><?php echo $fname . ' ' . $lname; ?></div>
                            <div>@<?php echo $uname; ?></div>
                        </div>
                    </div>
                    <a href="profile.php" class="nav-user-drop-down-item w-inline-block"><img src="./dashboard_files/5ba7d0d99ad7871f811f368a_icons8-user-24.png" width="16">
                        <div class="margin-5l w-hidden-tiny">My Profile</div>
                    </a>
                    <div class="nav-user-drop-down-line"></div>
                    <a href="?action=logout" class="nav-user-drop-down-item w-inline-block"><img src="./dashboard_files/5ba7d132e33cb62d251c38a6_icons8-exit-24.png" width="16">
                        <div class="margin-5l w-hidden-tiny">Log Out</div>
                    </a>
                </div>
            </div>
            <nav role="navigation" class="nav-menu-mobile w-nav-menu"><a href="index.php" class="nav-link smal w-nav-link">Home</a><a href="about.php" class="nav-link smal w-nav-link">About</a><a href="contact.php" class="nav-link smal w-nav-link">Contact</a>
                <a href="sign-up.php" class="button color verse margin-10l w-inline-block">
                    <div>Sign Up</div>
                </a>
                <a href="login.php" class="button color inverse margin-10l w-inline-block">
                    <div>Log In</div>
                </a>
            </nav>
            <div data-w-id="4e3dc43a-8655-e3e8-eb2c-f79d21611112" class="nav-menu-button w-nav-button">
                <div class="w-icon-nav-menu"></div>
            </div>
            <div data-w-id="cfcae85b-68dc-c03b-6788-e7f6d463d00b" class="nav-search-bot" style="opacity: 0;">
                <div class="nav-search nav-shrink-mobile">
                    <input type="text" class="input w-input" maxlength="256" name="field-4" data-name="Field 4" placeholder="Search for schools and classes" id="field-4" required="">
                </div>
            </div>
            <div class="w-nav-overlay" data-wf-ignore=""></div>
<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += "<strong>" + arr[i].substr(val.length) + "<strong>";
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

</script>
<script type="text/javascript">
var countries = <?php echo json_encode($classes); ?>;
autocomplete(document.getElementById("myInput"), countries)

</script>



</body>
</html>
<?php
     echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'none';
     
     
     </script>";} else {
        echo "not logged in";
        echo "<script>
     document.querySelector('.w-nav-menu').style.display = 'block';
     
     
     </script>";
    }
?>
