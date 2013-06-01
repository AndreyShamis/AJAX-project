<?php
// Report all PHP errors (see changelog)
error_reporting(E_ALL);
    session_start();
?>
<h2>Second section</h2>
<form id="section2" name="section2" method="post">
<input type="hidden" name="page" value="2" />
<script type="text/javascript">
$(function(){
    $.datepicker.setDefaults({
      changeYear: true ,
      changeMonth: true ,
      yearRange: "-120:+0",
      },
        $.extend($.datepicker.regional["he"]));
    $("#bdate").datepicker();
});

$.validator.addMethod("phoneValidate", function(number, element) {
  return this.optional(element) ||  number.match(/^\d*$/);
}, "Please specify a valid phone number");

$("#btnPrev").click(function(){
    LoadPage1();
});

$("#btnNext").click(function(){
    if($("#section2").valid()) {
        $.post("new_user_reciver.php" , $("#section2").serializeArray() ,function(data) {
        LoadPage3();
        }); }
});

$("#btnOk").click(function(){
    if($("#section2").valid()) {
        $.post("new_user_reciver.php" , $("#section2").serializeArray() ,function(data) {
        LoadPage3();
        });}
});


$("#phoneNumber").keypress(function(evt){
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
  }
});

$("#section2").validate({

   onclick: false,
   onkeyup: false,
   errorClass: "invalid",

   onfocusout: false,
     showErrors: function(errorMap, errorList) {
       var counter = 0;
       var output = '';
        for (property in errorMap) {
          output += errorMap[property] +'\n';
            counter++;
        }

        if(counter > 0)
        {
            alert("Your data contains "    + this.numberOfInvalids()
                                   + " errors, see details below.\n\n" + output);

        }
        this.defaultShowErrors();
  } ,
  rules: {
    phoneNumber: {
      required: true,
      minlength: 7 ,
      maxlength: 14,
      phoneValidate: true
    },
    zipcode:{
      minlength: 5 ,
      maxlength: 5
    },
    bdate:{
      required: true,
      minlength: 10 ,
      maxlength: 10
    }
  }
  ,
    messages:{
      phoneNumber:{
        required : "Please provide your phone number.",
        minlength: "Phone number can contain at least 7 digits.",
        maxlength: "Phone number should contain at most 14 digits.",
      },
      zipcode:{
        minlength: "Zip code must include 5 digits.",
        maxlength: "Zip code must include 5 digits.",
      },
      bdate:{
        required : "Please provide birthdate.",
      },
    }
});

</script>

<?php
  $bdate          = isset($_SESSION["bdate"])? $_SESSION["bdate"] : "" ;
  $address        = isset($_SESSION["address"])? $_SESSION["address"] : "";
  $country        = isset($_SESSION["country"])? $_SESSION["country"] : "";
  $city           = isset($_SESSION["city"])? $_SESSION["city"] : "";
  $zipcode        = isset($_SESSION["zipcode"])? $_SESSION["zipcode"] : "";
  $phoneNumber    = isset($_SESSION["phoneNumber"])? $_SESSION["phoneNumber"] : "";

?>
<table>
  <tr>
    <td class="table_res"><label for="bdate"> Birth date </label> </td>
    <td><span class="star">*</span></td>
    <td><input type="text" readonly="readonly" maxlength="150" id="bdate" value="<?php echo $bdate;?>" name="bdate" /><br /> </td>

  </tr>
  <tr>
    <td class="table_res"><label for="address"> Address </label> </td>
    <td></td>
    <td><input type="text" maxlength="150" id="address" value="<?php echo $address;?>" name="address" /><br /></td>

  </tr>
  <tr>
    <td class="table_res"><label for="countryList"> Country </label> </td>
    <td></td>
    <td><input type="text" id="countryList" name="countryList" value="<?php echo $country;?>" /></td>

  </tr>
  <tr>
    <td class="table_res"><label for="city"> City </label> </td>
    <td></td>
    <td><input type="text" maxlength="150" id="city" value="<?php echo $city;?>" name="city" /><br /></td>

  </tr>
  <tr>
    <td class="table_res"><label for="zipcode"> Zipcode </label> </td>
    <td></td>
    <td><input type="text" maxlength="150" id="zipcode" value="<?php echo $zipcode;?>" name="zipcode" /><br /></td>

  </tr>
  <tr>
    <td class="table_res"><label for="phoneNumber"> Phone number </label> </td>
    <td><span class="star">*</span></td>
    <td><input type="tel" maxlength="150" id="phoneNumber" value="<?php echo $phoneNumber;?>" name="phoneNumber" /><br /></td>
  </tr>
</table>
<?php
    if(isset($_SESSION['editable']) && $_SESSION['editable'] == 1){
?>
    <input type="button" id="btnOk"  value="Ok" />
<?php
    }
    else
    {
?>
<input type="button" id="btnPrev" value="Previous"/>
<input type="button" id="btnNext" value="Next" /><br />
<?php
    }
?>
      <div> <span class="star">You must provide information for all items with red start *</span></div>
</form>

<script>
  $(document).ready(function() {
    $("input#countryList").autocomplete({ minLength: 1,
    source: [		"Afghanistan",
		"Albania",
		"Algeria",
		"Andorra",
		"Angola",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegovina",
		"Botswana",
		"Brazil",
		"Brunei",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Colombi",
		"Comoros",
		"Congo (Brazzaville)",
		"Congo",
		"Costa Rica",
		"Cote d'Ivoire",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor (Timor Timur)",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Fiji",
		"Finland",
		"France",
		"Gabon",
		"Gambia, The",
		"Georgia",
		"Germany",
		"Ghana",
		"Greece",
		"Grenada",
		"Guatemala",
		"Guinea",
		"Guinea-Bissau",
		"Guyana",
		"Haiti",
		"Honduras",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea, North",
		"Korea, South",
		"Kuwait",
		"Kyrgyzstan",
		"Laos",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Mauritania",
		"Mauritius",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepa",
		"Netherlands",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Poland",
		"Portugal",
		"Qatar",
		"Romania",
		"Russia",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Serbia and Montenegro",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"Spain",
		"Sri Lanka",
		"Sudan",
		"Suriname",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syria",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City",
		"Venezuela",
		"Vietnam",
		"Yemen",
		"Zambia",
		"Zimbabwe"]
});
  });
</script>