
// const searchBtn = document.getElementById("searchBtn");
// const cityInput = document.getElementById("cityInput");
// const weatherResult = document.getElementById("weatherResult");
// const loadingMessage = document.getElementById("loadingMessage");
    
// searchBtn.addEventListener("click",getCoordinates);
// async function getCoordinates() {

//     const city = cityInput.value.trim();
//     if (city === "") {
//         loadingMessage.textContent = "Please enter a city name";
//         return;
//     }
//     loadingMessage.textContent = "Loading weather...";
//     try {
//     const geoUrl = `https://geocoding-api.open-meteo.com/v1/search?name=${city}`;
//     const response = await fetch(geoUrl);
//     const data = await response.json();
//     console.log(data);
    
//     if (!data.results) {
//         console.log("City not found");
//         loadingMessage.textContent = "City not found";
//         weatherResult.innerHTML = "";
//         return;
//     }
//     const place = data.results[0];
//     console.log(place);
//     const latitude = place.latitude;
//     const longitude = place.longitude;
//     console.log("Latitude:",latitude);
//     console.log("Longitude:",longitude);
//     const weatherUrl =`https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current=temperature_2m,relative_humidity_2m,wind_speed_10m`;
//     console.log(weatherUrl);
//     const weatherResponse = await fetch(weatherUrl);
//     const weatherData = await weatherResponse.json();
//     console.log(weatherData);
//     const current = weatherData.current;
//     console.log(current);
    
//     const temperature = current.temperature_2m;
//     console.log("Temperature:", temperature);
//     const humidity = current.relative_humidity_2m;
//     console.log("Humidity:", humidity);
//     const windSpeed = current.wind_speed_10m;
//     console.log("Wind Speed:", windSpeed);
//     const time = current.time;
//     console.log("Time:", time);

//     weatherResult.innerHTML = `
//         <h2>${place.name}</h2>
//         <p>Temperature:${temperature}°C</p>
//         <p>Humidity:${humidity}%</p>
//         <p>Wind Speed:${windSpeed} km/h</p>
//         <p>Time:${time}</p>
//     `;

//     loadingMessage.textContent = "";
//     }
//     catch (error) {
//         loadingMessage.textContent = "Error fetching coordinates";
//         console.error("Error fetching coordinates:", error);
//     }
    
    
// }
const forecastTitle =
    document.getElementById("forecastTitle");
const searchBtn =
    document.getElementById("searchBtn");

const cityInput =
    document.getElementById("cityInput");

const weatherResult =
    document.getElementById("weatherResult");

const loadingMessage =
    document.getElementById("loadingMessage");

const historyList =
    document.getElementById("historyList");

const forecastContainer =
    document.getElementById("forecastContainer");

const themeBtn =
    document.getElementById("themeBtn");


searchBtn.addEventListener(
    "click",
    getCoordinates
);


themeBtn.addEventListener(
    "click",
    () => {

        document.body.classList.toggle("dark");

        if(document.body.classList.contains("dark")){
            themeBtn.textContent =
                "☀ Light Mode";
        }
        else{
            themeBtn.textContent =
                "🌙 Dark Mode";
        }

    }
);


loadHistory();

cityInput.addEventListener(
    "focus",
    () => {

        if(historyList.children.length > 0){

            historyList.style.display =
                "block";
        }

    }
);

document.addEventListener(
    "click",
    (e) => {

        if(
            !cityInput.contains(e.target)
            &&
            !historyList.contains(e.target)
        ){

            historyList.style.display =
                "none";
        }

    }
);

async function getCoordinates(){

    const city =
        cityInput.value.trim();

    if(city === ""){

        loadingMessage.textContent = "Please enter a city name";

        weatherResult.style.display = "none";

        forecastContainer.style.display = "none";

        return;
    }

    loadingMessage.textContent =
        "Loading weather...";

    try{

        const geoUrl =
            `https://geocoding-api.open-meteo.com/v1/search?name=${city}`;

        const response =
            await fetch(geoUrl);

        const data =
            await response.json();

        if(!data.results){

            loadingMessage.textContent = "City not found";

            weatherResult.innerHTML = "";

            weatherResult.style.display = "none";

            forecastContainer.innerHTML = "";

            forecastContainer.style.display = "none";

            return;
        }

        const place =
            data.results[0];

        saveHistory(place.name);

        const latitude =
            place.latitude;

        const longitude =
            place.longitude;

        const weatherUrl =
            `https://api.open-meteo.com/v1/forecast?latitude=${latitude}&longitude=${longitude}&current=temperature_2m,relative_humidity_2m,wind_speed_10m&daily=temperature_2m_max,temperature_2m_min&forecast_days=5`;

        const weatherResponse =
            await fetch(weatherUrl);

        const weatherData =
            await weatherResponse.json();

        const current =
            weatherData.current;

        weatherResult.innerHTML = `
            <h2>${place.name}</h2>

            <p>🌡 Temperature:
            ${current.temperature_2m}°C</p>

            <p>💧 Humidity:
            ${current.relative_humidity_2m}%</p>

            <p>🌬 Wind Speed:
            ${current.wind_speed_10m} km/h</p>

            <p>⏰ Time:
            ${current.time}</p>
        `;
        weatherResult.style.display = "block";
        displayForecast(weatherData);

        loadingMessage.textContent = "";

    }
    catch(error){

    weatherResult.style.display = "none";

    forecastContainer.style.display = "none";

    forecastContainer.innerHTML = "";

    loadingMessage.textContent = "Unable to fetch weather data";

    console.error(error);

}

}


function saveHistory(city){

    let history =
        JSON.parse(
            localStorage.getItem("history")
        ) || [];

    if(!history.includes(city)){
        history.unshift(city);
    }

    history =
        history.slice(0,5);

    localStorage.setItem(
        "history",
        JSON.stringify(history)
    );

    loadHistory();

    historyList.style.display = "none";
}


function loadHistory(){

    let history =
        JSON.parse(
            localStorage.getItem("history")
        ) || [];

    historyList.innerHTML = "";

    history.forEach(city => {

        const li =
            document.createElement("li");

        li.textContent = city;

        li.addEventListener(
            "click",
            () => {

                cityInput.value = city;

                historyList.style.display =
                    "none";

                getCoordinates();

            }
        );

        historyList.appendChild(li);

    });

}


function displayForecast(weatherData){
    forecastTitle.style.display = "block";
    forecastContainer.style.display = "flex";
    forecastContainer.innerHTML = "";

    const days =
        weatherData.daily.time;

    const maxTemps =
        weatherData.daily.temperature_2m_max;

    const minTemps =
        weatherData.daily.temperature_2m_min;

    for(let i=0;i<5;i++){

        forecastContainer.innerHTML += `
            <div class="forecast-card">

                <h4>${days[i]}</h4>

                <p>⬆ ${maxTemps[i]}°C</p>

                <p>⬇ ${minTemps[i]}°C</p>

            </div>
        `;
    }
}


