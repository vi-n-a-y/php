// // Replace 'YOUR_ACCESS_TOKEN' with your actual ipinfo.io access token
// const accessToken = '79e72a2a89cf0c';

// // Mapping of country codes to country names
// const countryCodeToName = {
//     'IN': 'India',
//     'US': 'United States',
//     'GB': 'United Kingdom',
//     'FR': 'France',
//     // Add more country codes and names as needed
// };

// // Function to fetch geolocation data
// async function getGeolocation() {
//     const url = `https://ipinfo.io/json?token=${accessToken}`;
//     try {
//         const response = await fetch(url);
//         if (!response.ok) {
//             throw new Error('Network response was not ok ' + response.statusText);
//         }
//         const data = await response.json();
//         updateInputFields(data);
//     } catch (error) {
//         console.error('Error fetching geolocation data:', error);
//     }
// }

// // Function to update input fields with geolocation data
// function updateInputFields(data) {
//     // document.getElementById('ip').value = data.ip || 'N/A';
//     document.getElementById('city').value = data.city || 'N/A';
//     document.getElementById('region').value = data.region || 'N/A';
    
//     // Convert country code to country name
//     const countryName = countryCodeToName[data.country] || data.country || 'N/A';
//     document.getElementById('country').value = countryName;
// }

// // Fetch and display the geolocation data when the page loads
// getGeolocation();



document.addEventListener('DOMContentLoaded', function() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
});

function showPosition(position) {
    const latitude = position.coords.latitude;
    const longitude = position.coords.longitude;

    // Fetch detailed address data using reverse geocoding
    fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}&addressdetails=1`)
        .then(response => response.json())
        .then(data => {
            const address = data.address;
            
            // Populate input fields with address components
            document.getElementById('country').value = address.country || '';
            document.getElementById('state').value = address.state || '';
            document.getElementById('district').value = address.county || address.district || '';
            // document.getElementById('mandal').value = address.area || address.suburb || address.neighborhood || '';
            document.getElementById('pincode').value = address.postcode || '';
            document.getElementById('address').value = `${address.road || ''}, ${address.area || address.suburb || ''}, ${address.city || ''}, ${address.state || ''}, ${address.country || ''}, ${address.postcode || ''}`;
        })
        .catch(error => {
            console.error('Error fetching address:', error);
        });
}

function showError(error) {
    let errorMessage;
    switch (error.code) {
        case error.PERMISSION_DENIED:
            errorMessage = "User denied the request for Geolocation.";
            break;
        case error.POSITION_UNAVAILABLE:
            errorMessage = "Location information is unavailable.";
            break;
        case error.TIMEOUT:
            errorMessage = "The request to get user location timed out.";
            break;
        case error.UNKNOWN_ERROR:
            errorMessage = "An unknown error occurred.";
            break;
    }
    alert(`Error: ${errorMessage}`);
}

