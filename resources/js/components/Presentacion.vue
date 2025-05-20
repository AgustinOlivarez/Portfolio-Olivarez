<template>
  <!-- Presentación -->
  <section
    ref="infoSection"
    class="bg-gray-950 py-20 px-6 md:px-24 text-white flex flex-col md:flex-row items-center gap-12"
  >
    <!-- Imagen a la izquierda -->
    <div class="w-full md:w-1/4 flex justify-center">
      <img
        :src="('@/../images/Agus.jpg')"
        alt="Agustín Olivarez"
        class="w-60 h-60 md:w-72 md:h-72 rounded-full border-4 border-teal-400 shadow-lg hover:scale-105 transition-transform duration-300"
      />
    </div>

    <!-- Texto a la derecha -->
    <div class="w-full md:w-1/2 space-y-6">
      <h2 class="text-4xl md:text-5xl text-teal-400 font-bold">
        ¡Hola! Soy Agustín, te cuento un poco sobre mi de manera tradicional:
      </h2>
      <p class="text-slate-400 leading-relaxed text-lg">
        Soy un desarrollador full stack con experiencia en Laravel, Vue.js y
        más. Estudio en UCES desde 2024 y me formo de forma autodidacta desde
        2021. Actualmente trabajo en el Ejército Argentino como desarrollador de
        software y bases de datos. Actualmente busco un nuevo desafío laboral en el
        que pueda seguir creciendo profesionalmente y aprendiendo de manera constante y competitiva.
      </p>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
        <div>
          <h3
            class="text-teal-300 text-lg font-semibold mb-2 flex items-center"
          >
            <i class="fas fa-graduation-cap mr-2"></i> Formación
          </h3>
          <ul class="text-slate-400 text-sm list-disc ml-5 space-y-1">
            <li>
              Tecnicatura en programación en sistemas - UCES (Enero 2024 -
              actualidad)
            </li>
            <li>Aprendizaje de forma autodidacta (2021 - actualidad)</li>
          </ul>
        </div>
        <div>
          <h3
            class="text-teal-300 text-lg font-semibold mb-2 flex items-center"
          >
            <i class="fas fa-code mr-2"></i> Tecnologías
          </h3>
          <ul class="text-slate-400 text-sm list-disc ml-5 space-y-1">
            <li>Frontend: Vue.js, Tailwind, JS</li>
            <li>Backend: PHP, Laravel</li>
            <li>DB: MySQL, PostgreSQL, HeidiSQL</li>
          </ul>
        </div>
      </div>

      <!-- Botones opcionales -->
      <div class="mt-6 flex gap-4">
        <a
          href="/files/CV_Olivarez_Agustin.pdf"
          download
          class="inline-flex items-center bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300 mt-4"
        >
          <i class="fas fa-download mr-2"></i> Descargar CV
        </a>
      </div>
    </div>
  </section>
</template>

