<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clima - {{ ucfirst($city) }}</title>

  <!-- Include Tailwind CSS from CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Custom styles for dynamic background gradients and fade-in animation -->
  <style>
    /* Dynamic background gradients based on weather condition */
    .clear-day {
      background: linear-gradient(135deg, #ffeb3b, #f57c00);
    }
    .clear-night {
      background: linear-gradient(135deg, #1A237E, #000);
    }
    .clouds {
      background: linear-gradient(135deg, #04445f, #455A64);
    }
    .rain {
      background: linear-gradient(135deg, #37474F, #263238);
    }
    .snow {
      background: linear-gradient(135deg, #90CAF9, #E3F2FD);
    }

    /* Fade-in animation for the card */
    .fade-in {
      opacity: 0;
      animation: fadeIn 1s forwards;
    }
    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }
  </style>
</head>
<body class="h-screen flex justify-center items-center font-sans overflow-hidden m-0 transition-colors duration-1000 p-5 {{ strtolower($weather['weather'][0]['main']) }}">
  <!-- Fixed search bar (appbar) with label and input -->
  <div class="absolute top-5 left-1/2 transform -translate-x-1/2 md:left-5 md:translate-x-0">
    <!-- The form uses flex-col on mobile and flex-row on larger screens, aligning items center on mobile -->
    <form method="GET" action="{{ url('/weather') }}" class="flex flex-col md:flex-row items-center">
      <!-- Label with white background on mobile and transparent on larger screens -->
      <label for="city" class="text-3xl font-bold text-white drop-shadow-lg mb-1 md:mb-0 md:mr-2">
        Weather PHP
      </label>
      <input
        type="text"
        id="city"
        name="city"
        placeholder="Digite a cidade"
        required
        class="rounded-full px-5 py-2 w-64 shadow-md border-2 border-cyan-600 opacity-80 focus:outline-none"
      />
      <button
        type="submit"
        class="mt-2 md:mt-0 md:ml-2 rounded-full bg-cyan-600 text-white px-4 py-2 shadow-md hover:bg-cyan-700 focus:outline-none"
      >
        Buscar
      </button>
    </form>
  </div>

  <!-- Minimalist card for weather information -->
  <div class="fade-in bg-[rgba(255,255,255,0.15)] backdrop-blur-lg rounded-2xl p-6 text-center text-white shadow-xl w-full max-w-sm">
    <h2 class="text-2xl font-bold mb-3">{{ ucfirst($city) }}</h2>

    @if(isset($error))
      <!-- Display error if available -->
      <div class="bg-red-500 text-white p-2 rounded mb-4">{{ $error }}</div>
    @else
      <!-- Weather icon -->
      <img
        class="w-32 h-32 mx-auto"
        src="https://openweathermap.org/img/wn/{{ $weather['weather'][0]['icon'] }}@2x.png"
        alt="Weather Icon"
      />
      <!-- Temperature -->
      <p class="text-5xl font-bold">{{ round($weather['main']['temp']) }}°C</p>
      <!-- Weather description -->
      <p class="text-base opacity-80">{{ ucfirst($weather['weather'][0]['description']) }}</p>

      <!-- Additional weather details -->
      <ul class="list-none mt-3">
        <li class="mb-1"><strong>Sensação térmica:</strong> {{ round($weather['main']['feels_like']) }}°C</li>
        <li class="mb-1"><strong>Umidade:</strong> {{ $weather['main']['humidity'] }}%</li>
        <li class="mb-1"><strong>Vento:</strong> {{ round($weather['wind']['speed']) }} m/s</li>
      </ul>
    @endif
  </div>

  <!-- Footer with background, text, and social icons -->
  <footer class="absolute bottom-0 w-full text-center text-black text-sm bg-white py-2">
    <div class="flex justify-center items-center space-x-4">
      <span>© 2025 Luis Amorim</span>
      <!-- GitHub Icon -->
      <a href="https://github.com/luishramorim" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 .5C5.649.5.5 5.649.5 12c0 5.092 3.293 9.406 7.865 10.937.576.106.788-.25.788-.556 0-.274-.01-1.002-.015-1.966-3.201.696-3.877-1.543-3.877-1.543-.524-1.335-1.278-1.692-1.278-1.692-1.044-.714.079-.7.079-.7 1.153.082 1.758 1.184 1.758 1.184 1.026 1.757 2.693 1.25 3.35.956.105-.743.401-1.25.729-1.537-2.555-.29-5.239-1.278-5.239-5.69 0-1.257.449-2.285 1.184-3.092-.119-.291-.513-1.462.113-3.048 0 0 .967-.31 3.17 1.18.92-.256 1.91-.384 2.892-.388.982.004 1.972.132 2.893.388 2.2-1.49 3.165-1.18 3.165-1.18.628 1.586.234 2.757.115 3.048.738.807 1.183 1.835 1.183 3.092 0 4.423-2.688 5.395-5.253 5.679.413.355.782 1.055.782 2.127 0 1.536-.014 2.777-.014 3.154 0 .31.208.667.793.553C20.712 21.406 24 17.092 24 12c0-6.351-5.149-11.5-11.5-11.5z"/>
        </svg>
      </a>
      <!-- LinkedIn Icon -->
      <a href="https://www.linkedin.com/in/luishamorim" target="_blank" rel="noopener noreferrer" class="hover:text-cyan-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="currentColor" viewBox="0 0 24 24">
          <path d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.77 0 5-2.24 5-5v-14c0-2.76-2.23-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.27c-.97 0-1.75-.78-1.75-1.75s.78-1.75 1.75-1.75 1.75.78 1.75 1.75-.78 1.75-1.75 1.75zm13.5 11.27h-3v-5.5c0-1.32-.02-3.02-1.85-3.02-1.85 0-2.14 1.44-2.14 2.93v5.59h-3v-10h2.88v1.36h.04c.4-.75 1.38-1.54 2.84-1.54 3.04 0 3.6 2 3.6 4.59v5.59z"/>
        </svg>
      </a>
    </div>
  </footer>

  <!-- Script to set dynamic background classes based on weather condition -->
  <script>
    // Get the weather condition from the backend (in lowercase)
    const weatherCondition = "{{ strtolower($weather['weather'][0]['main']) }}";
    // Remove any existing background classes from the body
    document.body.classList.remove("clear-day", "clear-night", "clouds", "rain", "snow");

    // Add the appropriate background class based on the weather condition
    if (weatherCondition.includes("clear")) {
      document.body.classList.add("clear-day");
    } else if (weatherCondition.includes("clouds")) {
      document.body.classList.add("clouds");
    } else if (weatherCondition.includes("rain") || weatherCondition.includes("drizzle")) {
      document.body.classList.add("rain");
    } else if (weatherCondition.includes("snow")) {
      document.body.classList.add("snow");
    } else if (weatherCondition.includes("night")) {
      document.body.classList.add("clear-night");
    }
  </script>
</body>
</html>
