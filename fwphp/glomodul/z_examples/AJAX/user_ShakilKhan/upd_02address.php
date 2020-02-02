<?php
// J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\upd_02address.php
//I N C L U D E D  only  i n  i n d e x.p h p
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5

include 'frm_func.php';

if(!isset($_SESSION['user_id_loggedin'])):
   $_SESSION['unutherrized'] = "Please Enter Email & Password";
   header("location:index.php"); //header("location:f rm.php");
endif;

$css1 = 'style.css';
$css2 = 'profile.css';
include 'hdr.php';

include 'nav.php';

    $r = $db->get_byid($db, $_SESSION['user_id_loggedin']);

    if(empty($r->address)){ $title = "Add Address";
    } else { $title = "Update Address"; }
?>
<div class="container contents">
  <div class="row">
    <div class="col-md-3">
      <div class="left-area"><?php links($db); ?></div>
    </div>
    <div class="col-md-9">
      <div class="right-area">
        <h4><?php echo $title; ?></h4><hr>
        <div class="form-group"></div>

        <!--onFocus="geolocate()" -->
        <form>
          <div class="form-group">
              <input id="autocomplete" placeholder="Enter your address"
                     type="text" class="form-control profile-input" 
                     value="<?php if(isset($r->address)): echo $r->address; endif;?>">
              </input>
              <div class="address-error error"></div>
          </div><!-- e n d  form-group -->
          <div class="form-group">
              <button type="button" name="picture" class="btn btn-success"
                      onclick="add_ed_address(this.form.autocomplete.value);">Save
              </button>
          </div><!-- e n d  form-group -->
        </form>

             <?php
             include 'upd_03bio.php';
             include 'upd_04facebook.php';
             include 'upd_05linkedin.php';
             include 'upd_01name.php';
             include 'upd_09password_frm.php';
             ?>
      </div><!-- right-area -->
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->

<?php include 'ftr.php'; ?>

  <!--script type="text/javascript" src="../assets/js/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script-->

    <script type="text/javascript" src="frm.js"></script>

    <!--script>
      // This example displays an address form, using the autocomplete feature
      // of the Google Places API to help users fill in the information.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var placeSearch, autocomplete;
      var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
      };

      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // l ocation types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the drop down, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }

      // Bias the autocomplete object to the user's geographical l ocation,
      // as supplied by the browser's 'navigator.geol ocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
    </script--->

    <!--script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeAbS14Ka7henn3Ktj8fpHiJS1X2mZ9DQ&libraries=places&callback=initAutocomplete"
        async defer>
    </script-->


</body>
</html>