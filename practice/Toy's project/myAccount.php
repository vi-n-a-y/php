<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- <link rel="stylesheet" href="styles.css"> -->
    <style>
        /* styles.css */



        .error { color: red; }
        .error-message { display: block; color: red; font-size: 0.875em; margin-top: 0.5em; }
        /* .required:after { content: " *"; color: red; } */
        .error-icon { color: red; margin-right: 0.5em; }
        .error-icon::before { content: "\f071"; font-family: "Font Awesome 6 Free"; font-weight: 900; } /* ⚠️ icon */
        
        .password-container {
            position: relative;
        }
        .password-container input {
            padding-right: 2.5em; /* Adjust for icon */
          /* relative */
        }
        .password-container .fa-eye, .password-container .fa-eye-slash {
            position: absolute;
            right: 0.5em;
            top: 35%;
            transform: translateY(10%);
            cursor: pointer;
            color: #000;
        }

        /* Apply a fun background to the entire page */
        body {
            background: url('images/teddy_bear_2.avif') no-repeat center center fixed;
            background-size: cover;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Style the form container */
        .form-container {
            background: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 100%;
        }


        .kids-form h1 {
            color: #ff5722;
            /* Bright, playful color for the header */
            text-align: center;
            font-size: 2rem;
        }

        .kids-form label {
            display: block;
            margin: 10px 0 5px;
            font-size: 1.1rem;
        }

        .kids-form input {
            width: 94%;
            padding: 10px;
            color:black;

            margin-top: 15px;
            border: 2px solid #ff5722;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
            
        }


        #gender{
            width: 100%;
            padding: 10px;

            margin-top: 15px;
            border: 2px solid #ff5722;
            border-radius: 5px;
            font-size: 1rem;
            background-color: whitesmoke;
            opacity: 0.8;
        }

        .kids-form input::placeholder {
            color: #ff5722;
            /* Match the placeholder color with the theme */
        }

        .kids-form button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #ff5722;
            /* Fun and bright button color */
            color: white;
            font-size: 1.2rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .kids-form button:hover {
            background-color: #e64a19;
            /* Slightly darker shade for the hover effect */
        }

        .input-text-first-last {
            display: grid;
            grid-template-columns: 180px 180px;
            column-gap: 20px;
        }

        .con-st-region {
            display: flex;
            gap: 5px;
            font-size: 2px;

        }

        .con-st-region input {
            padding-left: 8px;
            padding-right: 5px;
            border: 2px solid #ff5722;
        }


        /* .input-group{
  position: relative;
}
.input-group::after{
  content: '*';
  position: absolute;
  top: 0px;
  left: 46px;
  color: #f00;
} */

/* placeholder text style */
/* input[type="date"]::-webkit-datetime-edit-text,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field,
input[type="date"]::-webkit-datetime-edit-year-field {
  color: #e64a19;
  
} */













        :root {
            --primary: #111;
            --secondary: #fd0;
        }



        .select-box {
            position: relative;

            /* width: 26rem; */
            /* margin: 7rem auto; */
            /* margin-bottom: 15px; */

        }


        input[type="date"]::placeholder {
            color: #e64a19; /* Change this color to your preferred placeholder color */
        }

        /* .select-box input {
    width: 100%;
    padding: 1rem .6rem;
    font-size: 1.1rem;
    
    border: .1rem solid transparent;
    outline: none;
} */

        /* input[type="tel"] {
    border-radius: 0 .5rem .5rem 0;
} */


        .selected-option input[type="number"] {
            margin-bottom: 0;
            border: none;
            border-radius: 5px;
            margin-top:1px;
        }

        /* .select-box input:focus {
    border: .1rem solid var(--primary);
} */

        .selected-option {
            background-color: #eee;
            border-radius: .5rem;
            overflow: hidden;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 2px solid #ff5722;
            margin-top:15px;
        }

        .selected-option div {
            position: relative;

            width: 6rem;
            padding: 0 2.8rem 0 .5rem;
            text-align: center;
            cursor: pointer;
        }

        .options{
            position:relative;
            z-index: 100;
        }

        .selected-option div::after {
            position: absolute;
            content: "";
            right: .8rem;
            top: 30%;
            transform: translateY(-50%) rotate(45deg);

            width: .8rem;
            height: .8rem;
          border-right: .12rem solid #ff5722;
            border-bottom: .12rem solid #ff5722;

            transition: .2s;
        }

        .selected-option div.active::after {
            transform: translateY(-50%) rotate(225deg);
        }

        .select-box .options {
            position: absolute;
            top: 3.3rem;

            width: 100%;
            background-color: #fff;
            border-radius: .5rem;

            display: none;
        }

        .select-box .options.active {
            display: block;
        }

        .select-box .options::before {
            position: absolute;
            content: "";
            left: 1rem;
            top: -1.2rem;

            width: 0;
            height: 0;
            border: .6rem solid transparent;
            border-bottom-color: var(--primary);
        }

        input.search-box {
            /* background-color: var(--primary); */
            color: black;
            /* border-radius: .5rem .5rem 0 0; */
            padding: 1rem 0.631rem;
            margin-bottom:0;
            /* width: 94%; */
        }

        .select-box ol {
            margin-top:10px;
            list-style: none;
            max-height: 150px;
            overflow: overlay;
            position:relative;
            z-index: 10;
            /* height: 300px; */
        }

        .select-box ol::-webkit-scrollbar {
            width: 0.6rem;
        }

        .select-box ol::-webkit-scrollbar-thumb {
            width: 0.4rem;
            height: 3rem;
            background-color: #ccc;
            border-radius: .4rem;
        }

        .select-box ol li {
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            cursor: pointer;
        }

        .select-box ol li.hide {
            display: none;
        }

        .select-box ol li:not(:last-child) {
            border-bottom: .1rem solid #eee;
        }

        .select-box ol li:hover {
            background-color: lightcyan;
        }

        .select-box ol li .country-name {
            margin-left: .4rem;
        }


        input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}




input[type="file"] {
            background-color: #fff;
            border: 2px solid #ff5722;
            border-radius: 5px;
            padding: 10px;
            cursor: pointer;
            width: 94%;
            margin-bottom: 15px;
            opacity: 0.8;
        }

        input[type="file"]::-webkit-file-upload-button {
            background: #ff5722;
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        input[type="file"]::placeholder {
            color: #ff5722;
        }
      

/* Firefox */
/* input[type=number] {
  -moz-appearance: textfield;
}

input[type=tel] {
  -moz-appearance: textfield;
} */



    </style>


</head>

<body>
<div class="form-container">
        <form class="kids-form" id="signup-form" method="post" enctype="multipart/form-data">
            <h1>Sign Up</h1>
            
            <div class="input-text-first-last">
                <div class="first-name">
                <input type="text" name="firstName" id="name" class="required" placeholder="Name">
                <span id="nameError" class="error-message"></span>
                </div>

                <div class="last-name">
                <input type="text" id="lastName"  name="lastName" class="required" placeholder="Last Name">
                <span id="lastNameError" class="error-message"></span>
                </div>
               
            </div>

            <input type="date" id="dob" name="dob" class="required" placeholder="Date of Birth">
            <span id="dobError" class="error-message"></span>

            <select id="gender" name="gender" >
            
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

            <input type="email" id="email" name="email" class="required" placeholder="Email">
            <span id="emailError" class="error-message"></span>

            <!-- <div class="select-box">
                <div class="selected-option">
                    <div>
                        <span class="iconify" data-icon="flag:in-4x3"></span>
                        <strong>+91</strong>
                    </div>
                    <input type="number" name="number" class="required" placeholder="Phone Number">
                    
                </div>
            </div>
            <span id="phoneError" class="error-message"></span> -->


            <div class="select-box">
                <div class="selected-option">
                    <div>
                        <span class="iconify" data-icon="flag:in-4x3"></span>
                        <strong>+91</strong>
                    </div>
                    
                    <input type="number" name="number" placeholder="Phone Number">
                </div>
                <div class="options">
                    <input type="text" class="search-box" placeholder="Search Country Name">
                    <ol>

                    </ol>
                </div>
            </div>
             <span id="phoneError" class="error-message"></span>

            <div class="con-st-region">
                <input type="text" id="district" name="district" placeholder="District" readonly>
                <span id="districtError" class="error-message"></span>
                <input type="text" id="pincode" name="pincode" placeholder="PinCode" readonly>
                <span id="pincodeError" class="error-message"></span>
            </div>

            <div class="con-st-region">
                <input type="text" id="state" name="state" placeholder="State" readonly>
                <span id="stateError" class="error-message"></span>
                <input type="text" id="country" name="country" placeholder="Country" readonly>
                <span id="countryError" class="error-message"></span>
            </div>
            
            <div class="password-container">
                <input type="password" name="password" id="password" class="required" placeholder="Password">
                <!-- <i id="togglePassword" class="fa fa-eye"></i> -->
                <span id="passwordError" class="error-message"></span>
            </div>
            
            <div class="password-container">
                <input type="password" name="confirmPassword" id="confirmPassword" class="required" placeholder="Confirm Password">
                <!-- <i id="toggleConfirmPassword" class="fa fa-eye"></i> -->
                <span id="confirmPasswordError" class="error-message"></span>
            </div>
            
            <input type="file" name="profile_pic" id="file" accept="image/*">
            <span id="fileError" class="error-message"></span>
            
            <button type="submit">Submit</button>
        </form>
    </div>

</body>

<script src="geolocation.js"></script>
<script src="inputValidation.js"></script>
<script>
    // 253 countries
    const countries = [{
                name: "Afghanistan",
                code: "AF",
                phone: 93
            },
            {
                name: "Aland Islands",
                code: "AX",
                phone: 358
            },
            {
                name: "Albania",
                code: "AL",
                phone: 355
            },
            {
                name: "Algeria",
                code: "DZ",
                phone: 213
            },
            {
                name: "American Samoa",
                code: "AS",
                phone: 1684
            },
            {
                name: "Andorra",
                code: "AD",
                phone: 376
            },
            {
                name: "Angola",
                code: "AO",
                phone: 244
            },
            {
                name: "Anguilla",
                code: "AI",
                phone: 1264
            },
            {
                name: "Antarctica",
                code: "AQ",
                phone: 672
            },
            {
                name: "Antigua and Barbuda",
                code: "AG",
                phone: 1268
            },
            {
                name: "Argentina",
                code: "AR",
                phone: 54
            },
            {
                name: "Armenia",
                code: "AM",
                phone: 374
            },
            {
                name: "Aruba",
                code: "AW",
                phone: 297
            },
            {
                name: "Australia",
                code: "AU",
                phone: 61
            },
            {
                name: "Austria",
                code: "AT",
                phone: 43
            },
            {
                name: "Azerbaijan",
                code: "AZ",
                phone: 994
            },
            {
                name: "Bahamas",
                code: "BS",
                phone: 1242
            },
            {
                name: "Bahrain",
                code: "BH",
                phone: 973
            },
            {
                name: "Bangladesh",
                code: "BD",
                phone: 880
            },
            {
                name: "Barbados",
                code: "BB",
                phone: 1246
            },
            {
                name: "Belarus",
                code: "BY",
                phone: 375
            },
            {
                name: "Belgium",
                code: "BE",
                phone: 32
            },
            {
                name: "Belize",
                code: "BZ",
                phone: 501
            },
            {
                name: "Benin",
                code: "BJ",
                phone: 229
            },
            {
                name: "Bermuda",
                code: "BM",
                phone: 1441
            },
            {
                name: "Bhutan",
                code: "BT",
                phone: 975
            },
            {
                name: "Bolivia",
                code: "BO",
                phone: 591
            },
            {
                name: "Bonaire, Sint Eustatius and Saba",
                code: "BQ",
                phone: 599
            },
            {
                name: "Bosnia and Herzegovina",
                code: "BA",
                phone: 387
            },
            {
                name: "Botswana",
                code: "BW",
                phone: 267
            },
            {
                name: "Bouvet Island",
                code: "BV",
                phone: 55
            },
            {
                name: "Brazil",
                code: "BR",
                phone: 55
            },
            {
                name: "British Indian Ocean Territory",
                code: "IO",
                phone: 246
            },
            {
                name: "Brunei Darussalam",
                code: "BN",
                phone: 673
            },
            {
                name: "Bulgaria",
                code: "BG",
                phone: 359
            },
            {
                name: "Burkina Faso",
                code: "BF",
                phone: 226
            },
            {
                name: "Burundi",
                code: "BI",
                phone: 257
            },
            {
                name: "Cambodia",
                code: "KH",
                phone: 855
            },
            {
                name: "Cameroon",
                code: "CM",
                phone: 237
            },
            {
                name: "Canada",
                code: "CA",
                phone: 1
            },
            {
                name: "Cape Verde",
                code: "CV",
                phone: 238
            },
            {
                name: "Cayman Islands",
                code: "KY",
                phone: 1345
            },
            {
                name: "Central African Republic",
                code: "CF",
                phone: 236
            },
            {
                name: "Chad",
                code: "TD",
                phone: 235
            },
            {
                name: "Chile",
                code: "CL",
                phone: 56
            },
            {
                name: "China",
                code: "CN",
                phone: 86
            },
            {
                name: "Christmas Island",
                code: "CX",
                phone: 61
            },
            {
                name: "Cocos (Keeling) Islands",
                code: "CC",
                phone: 672
            },
            {
                name: "Colombia",
                code: "CO",
                phone: 57
            },
            {
                name: "Comoros",
                code: "KM",
                phone: 269
            },
            {
                name: "Congo",
                code: "CG",
                phone: 242
            },
            {
                name: "Congo, Democratic Republic of the Congo",
                code: "CD",
                phone: 242
            },
            {
                name: "Cook Islands",
                code: "CK",
                phone: 682
            },
            {
                name: "Costa Rica",
                code: "CR",
                phone: 506
            },
            {
                name: "Cote D'Ivoire",
                code: "CI",
                phone: 225
            },
            {
                name: "Croatia",
                code: "HR",
                phone: 385
            },
            {
                name: "Cuba",
                code: "CU",
                phone: 53
            },
            {
                name: "Curacao",
                code: "CW",
                phone: 599
            },
            {
                name: "Cyprus",
                code: "CY",
                phone: 357
            },
            {
                name: "Czech Republic",
                code: "CZ",
                phone: 420
            },
            {
                name: "Denmark",
                code: "DK",
                phone: 45
            },
            {
                name: "Djibouti",
                code: "DJ",
                phone: 253
            },
            {
                name: "Dominica",
                code: "DM",
                phone: 1767
            },
            {
                name: "Dominican Republic",
                code: "DO",
                phone: 1809
            },
            {
                name: "Ecuador",
                code: "EC",
                phone: 593
            },
            {
                name: "Egypt",
                code: "EG",
                phone: 20
            },
            {
                name: "El Salvador",
                code: "SV",
                phone: 503
            },
            {
                name: "Equatorial Guinea",
                code: "GQ",
                phone: 240
            },
            {
                name: "Eritrea",
                code: "ER",
                phone: 291
            },
            {
                name: "Estonia",
                code: "EE",
                phone: 372
            },
            {
                name: "Ethiopia",
                code: "ET",
                phone: 251
            },
            {
                name: "Falkland Islands (Malvinas)",
                code: "FK",
                phone: 500
            },
            {
                name: "Faroe Islands",
                code: "FO",
                phone: 298
            },
            {
                name: "Fiji",
                code: "FJ",
                phone: 679
            },
            {
                name: "Finland",
                code: "FI",
                phone: 358
            },
            {
                name: "France",
                code: "FR",
                phone: 33
            },
            {
                name: "French Guiana",
                code: "GF",
                phone: 594
            },
            {
                name: "French Polynesia",
                code: "PF",
                phone: 689
            },
            {
                name: "French Southern Territories",
                code: "TF",
                phone: 262
            },
            {
                name: "Gabon",
                code: "GA",
                phone: 241
            },
            {
                name: "Gambia",
                code: "GM",
                phone: 220
            },
            {
                name: "Georgia",
                code: "GE",
                phone: 995
            },
            {
                name: "Germany",
                code: "DE",
                phone: 49
            },
            {
                name: "Ghana",
                code: "GH",
                phone: 233
            },
            {
                name: "Gibraltar",
                code: "GI",
                phone: 350
            },
            {
                name: "Greece",
                code: "GR",
                phone: 30
            },
            {
                name: "Greenland",
                code: "GL",
                phone: 299
            },
            {
                name: "Grenada",
                code: "GD",
                phone: 1473
            },
            {
                name: "Guadeloupe",
                code: "GP",
                phone: 590
            },
            {
                name: "Guam",
                code: "GU",
                phone: 1671
            },
            {
                name: "Guatemala",
                code: "GT",
                phone: 502
            },
            {
                name: "Guernsey",
                code: "GG",
                phone: 44
            },
            {
                name: "Guinea",
                code: "GN",
                phone: 224
            },
            {
                name: "Guinea-Bissau",
                code: "GW",
                phone: 245
            },
            {
                name: "Guyana",
                code: "GY",
                phone: 592
            },
            {
                name: "Haiti",
                code: "HT",
                phone: 509
            },
            {
                name: "Heard Island and McDonald Islands",
                code: "HM",
                phone: 0
            },
            {
                name: "Holy See (Vatican City State)",
                code: "VA",
                phone: 39
            },
            {
                name: "Honduras",
                code: "HN",
                phone: 504
            },
            {
                name: "Hong Kong",
                code: "HK",
                phone: 852
            },
            {
                name: "Hungary",
                code: "HU",
                phone: 36
            },
            {
                name: "Iceland",
                code: "IS",
                phone: 354
            },
            {
                name: "India",
                code: "IN",
                phone: 91
            },
            {
                name: "Indonesia",
                code: "ID",
                phone: 62
            },
            {
                name: "Iran, Islamic Republic of",
                code: "IR",
                phone: 98
            },
            {
                name: "Iraq",
                code: "IQ",
                phone: 964
            },
            {
                name: "Ireland",
                code: "IE",
                phone: 353
            },
            {
                name: "Isle of Man",
                code: "IM",
                phone: 44
            },
            {
                name: "Israel",
                code: "IL",
                phone: 972
            },
            {
                name: "Italy",
                code: "IT",
                phone: 39
            },
            {
                name: "Jamaica",
                code: "JM",
                phone: 1876
            },
            {
                name: "Japan",
                code: "JP",
                phone: 81
            },
            {
                name: "Jersey",
                code: "JE",
                phone: 44
            },
            {
                name: "Jordan",
                code: "JO",
                phone: 962
            },
            {
                name: "Kazakhstan",
                code: "KZ",
                phone: 7
            },
            {
                name: "Kenya",
                code: "KE",
                phone: 254
            },
            {
                name: "Kiribati",
                code: "KI",
                phone: 686
            },
            {
                name: "Korea, Democratic People's Republic of",
                code: "KP",
                phone: 850
            },
            {
                name: "Korea, Republic of",
                code: "KR",
                phone: 82
            },
            {
                name: "Kosovo",
                code: "XK",
                phone: 383
            },
            {
                name: "Kuwait",
                code: "KW",
                phone: 965
            },
            {
                name: "Kyrgyzstan",
                code: "KG",
                phone: 996
            },
            {
                name: "Lao People's Democratic Republic",
                code: "LA",
                phone: 856
            },
            {
                name: "Latvia",
                code: "LV",
                phone: 371
            },
            {
                name: "Lebanon",
                code: "LB",
                phone: 961
            },
            {
                name: "Lesotho",
                code: "LS",
                phone: 266
            },
            {
                name: "Liberia",
                code: "LR",
                phone: 231
            },
            {
                name: "Libyan Arab Jamahiriya",
                code: "LY",
                phone: 218
            },
            {
                name: "Liechtenstein",
                code: "LI",
                phone: 423
            },
            {
                name: "Lithuania",
                code: "LT",
                phone: 370
            },
            {
                name: "Luxembourg",
                code: "LU",
                phone: 352
            },
            {
                name: "Macao",
                code: "MO",
                phone: 853
            },
            {
                name: "Macedonia, the Former Yugoslav Republic of",
                code: "MK",
                phone: 389
            },
            {
                name: "Madagascar",
                code: "MG",
                phone: 261
            },
            {
                name: "Malawi",
                code: "MW",
                phone: 265
            },
            {
                name: "Malaysia",
                code: "MY",
                phone: 60
            },
            {
                name: "Maldives",
                code: "MV",
                phone: 960
            },
            {
                name: "Mali",
                code: "ML",
                phone: 223
            },
            {
                name: "Malta",
                code: "MT",
                phone: 356
            },
            {
                name: "Marshall Islands",
                code: "MH",
                phone: 692
            },
            {
                name: "Martinique",
                code: "MQ",
                phone: 596
            },
            {
                name: "Mauritania",
                code: "MR",
                phone: 222
            },
            {
                name: "Mauritius",
                code: "MU",
                phone: 230
            },
            {
                name: "Mayotte",
                code: "YT",
                phone: 262
            },
            {
                name: "Mexico",
                code: "MX",
                phone: 52
            },
            {
                name: "Micronesia, Federated States of",
                code: "FM",
                phone: 691
            },
            {
                name: "Moldova, Republic of",
                code: "MD",
                phone: 373
            },
            {
                name: "Monaco",
                code: "MC",
                phone: 377
            },
            {
                name: "Mongolia",
                code: "MN",
                phone: 976
            },
            {
                name: "Montenegro",
                code: "ME",
                phone: 382
            },
            {
                name: "Montserrat",
                code: "MS",
                phone: 1664
            },
            {
                name: "Morocco",
                code: "MA",
                phone: 212
            },
            {
                name: "Mozambique",
                code: "MZ",
                phone: 258
            },
            {
                name: "Myanmar",
                code: "MM",
                phone: 95
            },
            {
                name: "Namibia",
                code: "NA",
                phone: 264
            },
            {
                name: "Nauru",
                code: "NR",
                phone: 674
            },
            {
                name: "Nepal",
                code: "NP",
                phone: 977
            },
            {
                name: "Netherlands",
                code: "NL",
                phone: 31
            },
            {
                name: "Netherlands Antilles",
                code: "AN",
                phone: 599
            },
            {
                name: "New Caledonia",
                code: "NC",
                phone: 687
            },
            {
                name: "New Zealand",
                code: "NZ",
                phone: 64
            },
            {
                name: "Nicaragua",
                code: "NI",
                phone: 505
            },
            {
                name: "Niger",
                code: "NE",
                phone: 227
            },
            {
                name: "Nigeria",
                code: "NG",
                phone: 234
            },
            {
                name: "Niue",
                code: "NU",
                phone: 683
            },
            {
                name: "Norfolk Island",
                code: "NF",
                phone: 672
            },
            {
                name: "Northern Mariana Islands",
                code: "MP",
                phone: 1670
            },
            {
                name: "Norway",
                code: "NO",
                phone: 47
            },
            {
                name: "Oman",
                code: "OM",
                phone: 968
            },
            {
                name: "Pakistan",
                code: "PK",
                phone: 92
            },
            {
                name: "Palau",
                code: "PW",
                phone: 680
            },
            {
                name: "Palestinian Territory, Occupied",
                code: "PS",
                phone: 970
            },
            {
                name: "Panama",
                code: "PA",
                phone: 507
            },
            {
                name: "Papua New Guinea",
                code: "PG",
                phone: 675
            },
            {
                name: "Paraguay",
                code: "PY",
                phone: 595
            },
            {
                name: "Peru",
                code: "PE",
                phone: 51
            },
            {
                name: "Philippines",
                code: "PH",
                phone: 63
            },
            {
                name: "Pitcairn",
                code: "PN",
                phone: 64
            },
            {
                name: "Poland",
                code: "PL",
                phone: 48
            },
            {
                name: "Portugal",
                code: "PT",
                phone: 351
            },
            {
                name: "Puerto Rico",
                code: "PR",
                phone: 1787
            },
            {
                name: "Qatar",
                code: "QA",
                phone: 974
            },
            {
                name: "Reunion",
                code: "RE",
                phone: 262
            },
            {
                name: "Romania",
                code: "RO",
                phone: 40
            },
            {
                name: "Russian Federation",
                code: "RU",
                phone: 7
            },
            {
                name: "Rwanda",
                code: "RW",
                phone: 250
            },
            {
                name: "Saint Barthelemy",
                code: "BL",
                phone: 590
            },
            {
                name: "Saint Helena",
                code: "SH",
                phone: 290
            },
            {
                name: "Saint Kitts and Nevis",
                code: "KN",
                phone: 1869
            },
            {
                name: "Saint Lucia",
                code: "LC",
                phone: 1758
            },
            {
                name: "Saint Martin",
                code: "MF",
                phone: 590
            },
            {
                name: "Saint Pierre and Miquelon",
                code: "PM",
                phone: 508
            },
            {
                name: "Saint Vincent and the Grenadines",
                code: "VC",
                phone: 1784
            },
            {
                name: "Samoa",
                code: "WS",
                phone: 684
            },
            {
                name: "San Marino",
                code: "SM",
                phone: 378
            },
            {
                name: "Sao Tome and Principe",
                code: "ST",
                phone: 239
            },
            {
                name: "Saudi Arabia",
                code: "SA",
                phone: 966
            },
            {
                name: "Senegal",
                code: "SN",
                phone: 221
            },
            {
                name: "Serbia",
                code: "RS",
                phone: 381
            },
            {
                name: "Serbia and Montenegro",
                code: "CS",
                phone: 381
            },
            {
                name: "Seychelles",
                code: "SC",
                phone: 248
            },
            {
                name: "Sierra Leone",
                code: "SL",
                phone: 232
            },
            {
                name: "Singapore",
                code: "SG",
                phone: 65
            },
            {
                name: "St Martin",
                code: "SX",
                phone: 721
            },
            {
                name: "Slovakia",
                code: "SK",
                phone: 421
            },
            {
                name: "Slovenia",
                code: "SI",
                phone: 386
            },
            {
                name: "Solomon Islands",
                code: "SB",
                phone: 677
            },
            {
                name: "Somalia",
                code: "SO",
                phone: 252
            },
            {
                name: "South Africa",
                code: "ZA",
                phone: 27
            },
            {
                name: "South Georgia and the South Sandwich Islands",
                code: "GS",
                phone: 500
            },
            {
                name: "South Sudan",
                code: "SS",
                phone: 211
            },
            {
                name: "Spain",
                code: "ES",
                phone: 34
            },
            {
                name: "Sri Lanka",
                code: "LK",
                phone: 94
            },
            {
                name: "Sudan",
                code: "SD",
                phone: 249
            },
            {
                name: "Suriname",
                code: "SR",
                phone: 597
            },
            {
                name: "Svalbard and Jan Mayen",
                code: "SJ",
                phone: 47
            },
            {
                name: "Swaziland",
                code: "SZ",
                phone: 268
            },
            {
                name: "Sweden",
                code: "SE",
                phone: 46
            },
            {
                name: "Switzerland",
                code: "CH",
                phone: 41
            },
            {
                name: "Syrian Arab Republic",
                code: "SY",
                phone: 963
            },
            {
                name: "Taiwan, Province of China",
                code: "TW",
                phone: 886
            },
            {
                name: "Tajikistan",
                code: "TJ",
                phone: 992
            },
            {
                name: "Tanzania, United Republic of",
                code: "TZ",
                phone: 255
            },
            {
                name: "Thailand",
                code: "TH",
                phone: 66
            },
            {
                name: "Timor-Leste",
                code: "TL",
                phone: 670
            },
            {
                name: "Togo",
                code: "TG",
                phone: 228
            },
            {
                name: "Tokelau",
                code: "TK",
                phone: 690
            },
            {
                name: "Tonga",
                code: "TO",
                phone: 676
            },
            {
                name: "Trinidad and Tobago",
                code: "TT",
                phone: 1868
            },
            {
                name: "Tunisia",
                code: "TN",
                phone: 216
            },
            {
                name: "Turkey",
                code: "TR",
                phone: 90
            },
            {
                name: "Turkmenistan",
                code: "TM",
                phone: 7370
            },
            {
                name: "Turks and Caicos Islands",
                code: "TC",
                phone: 1649
            },
            {
                name: "Tuvalu",
                code: "TV",
                phone: 688
            },
            {
                name: "Uganda",
                code: "UG",
                phone: 256
            },
            {
                name: "Ukraine",
                code: "UA",
                phone: 380
            },
            {
                name: "United Arab Emirates",
                code: "AE",
                phone: 971
            },
            {
                name: "United Kingdom",
                code: "GB",
                phone: 44
            },
            {
                name: "United States",
                code: "US",
                phone: 1
            },
            {
                name: "United States Minor Outlying Islands",
                code: "UM",
                phone: 1
            },
            {
                name: "Uruguay",
                code: "UY",
                phone: 598
            },
            {
                name: "Uzbekistan",
                code: "UZ",
                phone: 998
            },
            {
                name: "Vanuatu",
                code: "VU",
                phone: 678
            },
            {
                name: "Venezuela",
                code: "VE",
                phone: 58
            },
            {
                name: "Viet Nam",
                code: "VN",
                phone: 84
            },
            {
                name: "Virgin Islands, British",
                code: "VG",
                phone: 1284
            },
            {
                name: "Virgin Islands, U.s.",
                code: "VI",
                phone: 1340
            },
            {
                name: "Wallis and Futuna",
                code: "WF",
                phone: 681
            },
            {
                name: "Western Sahara",
                code: "EH",
                phone: 212
            },
            {
                name: "Yemen",
                code: "YE",
                phone: 967
            },
            {
                name: "Zambia",
                code: "ZM",
                phone: 260
            },
            {
                name: "Zimbabwe",
                code: "ZW",
                phone: 263
            }
        ],

        select_box = document.querySelector('.options'),
        search_box = document.querySelector('.search-box'),
        input_box = document.querySelector('input[type="tel"]'),
        selected_option = document.querySelector('.selected-option div');

    let options = null;

    for (country of countries) {
        const option = `
    <li class="option">
        <div>
            <span class="iconify" data-icon="flag:${country.code.toLowerCase()}-4x3"></span>
            <span class="country-name">${country.name}</span>
        </div>
        <strong>+${country.phone}</strong>
    </li> `;

        select_box.querySelector('ol').insertAdjacentHTML('beforeend', option); //
        options = document.querySelectorAll('.option');
    }

    function selectOption() {
        console.log(this);
        const icon = this.querySelector('.iconify').cloneNode(true),
            phone_code = this.querySelector('strong').cloneNode(true);

        selected_option.innerHTML = '';
        selected_option.append(icon, phone_code);

        // input_box.value = phone_code.innerText;

        select_box.classList.remove('active');
        selected_option.classList.remove('active');

        search_box.value = '';
        select_box.querySelectorAll('.hide').forEach(el => el.classList.remove('hide'));
    }

    function searchCountry() {
        let search_query = search_box.value.toLowerCase();
        for (option of options) {
            let is_matched = option.querySelector('.country-name').innerText.toLowerCase().includes(search_query);
            option.classList.toggle('hide', !is_matched)
        }
    }


    selected_option.addEventListener('click', () => {
        select_box.classList.toggle('active');
        selected_option.classList.toggle('active');
    })

    options.forEach(option => option.addEventListener('click', selectOption));
    search_box.addEventListener('input', searchCountry);
</script>

</html>





<!-- CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    age_group VARCHAR(50),
    category_id INT,
    brand_id INT,
    stock_quantity INT DEFAULT 0,
    image_url VARCHAR(255),
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM('active', 'discontinued') DEFAULT 'active', 
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (brand_id) REFERENCES brands(id)
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);


CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    customer_name VARCHAR(255),
    rating INT CHECK (rating BETWEEN 1 AND 5),
    review_text TEXT,
    review_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending', 'Shipped', 'Delivered') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    registration_date DATETIME DEFAULT CURRENT_TIMESTAMP
); 


my table

CREATE TABLE customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    updateAt DATETIME DEFAULT CURRENT_TIMESTAMP,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    number VARCHAR(20),
    password1 varchar(255),
    address varchar(255),
    file varchar(255)
    
	
);

id ,
    
    firstName ,lastName ,email ,number ,password1 ,address ,file 



-->








<!-- <input
  type="date"
  name="date"
  className={(this.state.date) ? 'date-input--has-value' : ''}
  value={this.state.date}
  onChange={this.handleChange}
/> -->








<!-- input[type="date"]::-webkit-datetime-edit-text,
input[type="date"]::-webkit-datetime-edit-month-field,
input[type="date"]::-webkit-datetime-edit-day-field,
input[type="date"]::-webkit-datetime-edit-year-field {
  color: green;
}


input[type="date"].date-input--has-value::-webkit-datetime-edit-text,
input[type="date"].date-input--has-value::-webkit-datetime-edit-month-field,
input[type="date"].date-input--has-value::-webkit-datetime-edit-day-field,
input[type="date"].date-input--has-value::-webkit-datetime-edit-year-field {
  color: red;
} 

input{
color:black;

}  -->




<?php
    include_once 'db_connect.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $dob=$_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['number'];
        $gender=$_POST['gender'];
        // echo $gender;
        $district=$_POST['district'];       
        $pincode=$_POST['pincode'];       
        $state=$_POST['state'];       
        $country=$_POST['country'];   
        $address=$district.','.$pincode.','.$state.','.$country;
        // echo $address;
        
        $password1 = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $profilePic = null;

        if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['profile_pic'];
            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (in_array($file['type'], $allowedTypes)) {
                $fileName = basename($file['name']);
                $targetDir = 'images/';
                $targetFile = $targetDir . $fileName;

                if (!is_writable($targetDir)) {
                    echo "The directory is not writable.";
                } else {
                    // echo "The directory is writable.";
                }
                

                if (!is_dir($targetDir)) {
                    mkdir($targetDir, 0755, true);
                }

                if (move_uploaded_file($file['tmp_name'], $targetFile)) {
                    $profilePic = $fileName;
                    // echo "Profile Picture: $profilePic<br>";
                    // echo "Profile Picture1: $fileName<br>";
                } else {
                    echo "Failed to move uploaded file.";
                    exit;
                }
            } else {
                echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
                exit;
            }
        }
        // echo "Profile Picture: $profilePic<br>";
        // echo "Profile Picture1: $fileName<br>";

        $stmt = $conn->prepare("INSERT INTO customers (firstName ,lastName ,dob,gender,email ,number ,password1 ,address ,
profilePic) VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssss", $firstName, $lastName,$dob,$gender, $email, $contact, $password1,$address, $profilePic,);



        if ($stmt->execute()) {
          
            echo "<!DOCTYPE html>
            <html lang='en'>
            <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Success</title>
                <script>
                    window.onload = function() {
                        alert('Signup successful!');
                        setTimeout(function() {
                            window.location.href = 'adminHome.php';
                        }, 10); 
                    };
                </script>
            </head>
            <body>
            </body>
            </html>";
            //  header("Location: login.php");
            // exit();


            // echo "success fully inserted";
        } else {
            echo "error while inserting the records: " . $stmt->error;
        }


        $stmt->close();
        $conn->close();
    }

    ?>

