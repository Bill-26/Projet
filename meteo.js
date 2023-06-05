// Remplacez "YOUR_API_KEY" par votre clé d'API de service météo
const apiKey = "ae8c71a2a2875dbaf6beab9456c131f9";
// Remplacez "CITY_NAME" par le nom de la ville pour laquelle vous souhaitez afficher la météo
const city = "";

const locationElement = document.getElementById("location");
const temperatureElement = document.getElementById("temperature");
const descriptionElement = document.getElementById("description");

// Appel à l'API de service météo
fetch(`https://api.openweathermap.org/data/2.5/weatfher?q=${city}&appid=${apiKey}&units=metric`)
  .then(response => {
    if (response.ok) {
      return response.json();
    } else {
      throw new Error("Erreur lors de la récupération des données météo.");
    }
  })
  .then(data => {
    // Récupération des données de météo
    const location = data.name;
    const temperature = data.main.temp;
    const description = data.weather[0].description;

    // Mise à jour de l'interface avec les données de météo
    locationElement.textContent = `Lieu: ${location}`;
    temperatureElement.textContent = `Température: ${temperature}°C`;
    descriptionElement.textContent = `Description: ${description}`;
  })
  .catch(error => {
    console.log("Une erreur s'est produite lors de l'appel à l'API météo:", error);
  });
