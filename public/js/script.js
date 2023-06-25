function updateTemperature() {
    fetch('https://api.open-meteo.com/v1/forecast?latitude=48.85&longitude=2.35&current_weather=true')
        .then(response => response.json())
        .then(data => {
            const tempElement = document.getElementById('temperature');
            tempElement.textContent = data.current_weather.temperature;

            const gen = document.getElementById('generation');
            gen.textContent = data.generationtime_ms;
        });
}

setInterval(updateTemperature, 5000);  // On lance la mise à jour toutes les 5 secondes
updateTemperature();