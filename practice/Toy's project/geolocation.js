// Replace 'YOUR_ACCESS_TOKEN' with your actual ipinfo.io access token
const accessToken = '79e72a2a89cf0c';

// Mapping of country codes to country names
const countryCodeToName = {
    'IN': 'India',
    'US': 'United States',
    'GB': 'United Kingdom',
    'FR': 'France',
    // Add more country codes and names as needed
};

// Function to fetch geolocation data
async function getGeolocation() {
    const url = `https://ipinfo.io/json?token=${accessToken}`;
    try {
        const response = await fetch(url);
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        const data = await response.json();
        updateInputFields(data);
    } catch (error) {
        console.error('Error fetching geolocation data:', error);
    }
}

// Function to update input fields with geolocation data
function updateInputFields(data) {
    // document.getElementById('ip').value = data.ip || 'N/A';
    document.getElementById('city').value = data.city || 'N/A';
    document.getElementById('region').value = data.region || 'N/A';
    
    // Convert country code to country name
    const countryName = countryCodeToName[data.country] || data.country || 'N/A';
    document.getElementById('country').value = countryName;
}

// Fetch and display the geolocation data when the page loads
getGeolocation();
