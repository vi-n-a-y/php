ok<div class="signup-form-1">
    <label for="email">Email</label>
    <div class="input-with-icon">
        [email email id:email-class class:input-with-icon-text]
        <i class="fa fa-envelope"></i>
    </div>

    <label for="phone">Phone Number</label>
    <div class="input-with-icon">
        [tel* your-phone id:phone-class class:input-with-icon-text]
        <i class="fa fa-phone"></i>
    </div>

    <label>Best Way to Reach You (optional)</label>
    [radio bestway "Email" "Phone"]

    <label for="address">Address</label>
    [text address id:address1-class]

    
    <div class="row">
        <div class="column">
<label for="city">City</label>
            [text your-city id:city-class]
        </div>
        <div class="column">
            <label for="state">State</label>
            [text state id:state-class]
        </div>
        <div class="column1">
            <label for="zip-code">Zip Code</label>
            [text zip-code id:zip-class]
        </div>
<div class="column">
           <label for="country">Country</label>
    [select country id:country-class default:USA "USA" "Canada" "UK" "India" "China" "Japan" "Brazil" "South Africa" "Russia" "New Zealand" "Other"] 
        </div>
    </div>

    

    <div id="registrants">
        <div class="registrant">
            
            <div class="row">
                <div class="column">
<label for="first_name1">First Name</label>
                    [text first_name1 id:first_name1-class]
                </div>
                <div class="column">
                    <label for="last_name1">Last Name</label>
                    [text last_name1 id:last_name1-class]
                </div>
            </div>
        </div>
    </div>

    <button type="button" id="addRegistrant" class="add-registrant-btn">Add Another Registrant</button>
    [submit class:submit-btn "Submit"]
</div>




<style>

.signup-form-1 {
    max-width: 850px; /* Set the maximum width of the form */
    margin: 0 auto; /* Center the form */
    padding: 20px; /* Add padding */
    background-color: #f9f9f9; /* Light background color */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    box-sizing: border-box; /* Include padding and border in element's total width and height */
}

.signup-form-1 label {
    display: block; /* Make labels block elements */
    margin-bottom: 5px; /* Space below labels */
/*     font-weight: bold; /* Bold text for labels */ */
}

.input-with-icon {
    position: relative; /* Position relative for icon alignment */
    margin-bottom: 15px; /* Space between input fields */
}

.input-with-icon input {
    width: 100%; /* Full width for input fields */
    padding: 10px 40px; /* Space for icon */
    border: 1px solid #ccc; /* Border style */
    border-radius: 4px; /* Rounded corners */
    box-sizing: border-box; /* Include padding and border in width */
}

.input-with-icon i {
    position: absolute; /* Position icon inside the input */
    left: 10px; /* Space from the left */
    top: 50%; /* Center vertically */
    transform: translateY(-50%); /* Adjust for perfect centering */
    color: #aaa; /* Icon color */
}

.row {
    display: flex; /* Use flexbox for layout */
    flex-wrap: wrap; /* Allow wrapping of columns */
    margin-bottom: 15px; /* Space below rows */
}

.column {
    flex: 1; /* Allow columns to grow equally */
    min-width: 200px; /* Minimum width for columns */
    margin-right: 10px; /* Space between columns */
    box-sizing: border-box; /* Include padding and border in width */
}

.column1{
	
	    flex: 1; /* Allow columns to grow equally */
    min-width: 150px; /* Minimum width for columns */
    margin-right: 10px; /* Space between columns */
    box-sizing: border-box; /* Include padding and border in width */
	
}

.column:last-child {
    margin-right: 0; /* Remove margin from the last column */
}

select, input[type="text"], input[type="tel"] {
    width: 100%; /* Full width for select and text inputs */
    padding: 10px; /* Padding for input fields */
    border: 1px solid #ccc; /* Border style */
    border-radius: 4px; /* Rounded corners */
    box-sizing: border-box; /* Include padding and border in width */
}

button.add-registrant-btn {
    background-color: #243144; /* Button background color */
    color: white; /* Button text color */
	
    border: none; /* Remove border */
    padding: 10px 15px; /* Button padding */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer on hover */
    margin-top: 10px; /* Space above the button */
	margin-right:10px;
}

button.add-registrant-btn:hover {
    background-color: #243146; /* Darker color on hover */
}

.submit-btn {
    background-color: #243144; /* Submit button color */
    color: white; /* Text color */
    border: none; /* Remove border */
    padding: 10px 60px; /* Button padding */
    border-radius: 4px; /* Rounded corners */
    cursor: pointer; /* Pointer on hover */
    margin-top: 10px; /* Space above the button */
}

.submit-btn:hover {
    background-color: #243144; /* Darker color on hover */
}

</style>
