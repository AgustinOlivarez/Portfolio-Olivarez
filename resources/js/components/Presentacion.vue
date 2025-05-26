<template>
<!-- Sección principal -->
<section class="bg-gray-950 text-white py-20 px-6 md:px-24 flex flex-col items-center gap-24 overflow-hidden">

  <!-- FOTO + SOBRE MÍ -->
  <div class="w-full flex flex-col md:flex-row items-center gap-12 max-w-4xl animate__animated" data-animation="animate__fadeInUp">
    <div class="flex justify-center md:w-1/4">
      <img
        :src="('@/../images/Agus.jpg')"
        alt="Agustín Olivarez"
        class="w-45 h-45 md:w-50 md:h-50 rounded-full border-4 border-teal-400 shadow-lg hover:scale-105 transition-transform duration-300"
      />
    </div>
    <div class="md:w-3/4 space-y-6 text-center md:text-left">
      <h2 class="text-4xl md:text-5xl text-teal-400 font-semibold">
        <i class="fa fa-id-card mr-2"></i> Sobre mí
      </h2>
      <p class="text-slate-400 leading-relaxed text-lg">
        Soy un desarrollador full stack con experiencia en Laravel, Vue.js y más.
        Estudio en UCES desde 2024 y me formo de forma autodidacta desde 2021.
        Actualmente trabajo en el Ejército Argentino como desarrollador de software y bases de datos.
        Busco desafiarme y aprender constantemente, disfruto mucho lo que hago.
      </p>
      <a
        href="/files/CV_Olivarez_Agustin.pdf"
        download
        class="inline-flex items-center bg-teal-500 hover:bg-teal-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-300"
      >
        <i class="fas fa-download mr-2"></i> Descargar CV
      </a>
    </div>
  </div>

  <!-- EXPERIENCIA LABORAL -->
  <section class="w-full max-w-4xl text-center animate__animated" data-animation="animate__fadeInRight">
    <h3 class="text-3xl text-teal-300 font-semibold mb-4"><i class="fa fa-briefcase mr-2"></i>Experiencia Laboral</h3>
    <h4 class="text-xl text-slate-400 font-bold">Desarrollador de Software y administrador de bases de datos - Ejército Argentino</h4>
    <p class="text-slate-400 text-lg leading-relaxed">
      Me desempeño en el desarrollo y mantenimiento de aplicaciones internas, uso tecnologías como JavaScript, PHP, Laravel, MySQL, Vue y herramientas de gestión, pero siempre aprendo o pruebo cosas nuevas.
    </p>
  </section>

  <!-- FORMACIÓN -->
  <section class="w-full max-w-4xl text-center animate__animated" data-animation="animate__fadeInLeft">
    <h3 class="text-3xl text-teal-300 font-semibold mb-4"><i class="fas fa-graduation-cap mr-2"></i>Formación Académica</h3>
    <ul class="text-slate-400 text-lg list-disc list-inside space-y-2">
      <li>Tecnicatura en programación en sistemas - UCES (Enero 2024 - actualidad)</li>
      <li>Aprendizaje de forma autodidacta (2021 - actualidad)</li>
    </ul>
  </section>

  <!-- TECNOLOGÍAS -->
  <section class="w-full max-w-4xl text-center animate__animated" data-animation="animate__fadeInRight">
    <h3 class="text-3xl text-teal-300 font-semibold mb-4"><i class="fas fa-code mr-2"></i>Tecnologías</h3>
    <ul class="text-slate-400 text-lg list-disc list-inside space-y-2">
      <li><strong>Frontend:</strong> Vue.js, Tailwind, Bootstrap, JavaScript</li>
      <li><strong>Backend:</strong> PHP, Laravel, Typescript, Express, Nuxt.js</li>
      <li><strong>Bases de datos:</strong> MySQL, PostgreSQL, HeidiSQL</li>
    </ul>
  </section>

</section>

</template>

<script setup lang="ts">
document.addEventListener('DOMContentLoaded', () => {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const el = entry.target as HTMLElement;
        const animationClass = el.dataset.animation;
        if (animationClass) {
          el.classList.add(animationClass);
          observer.unobserve(el);
        }
      }
    });
  }, {
    threshold: 0.1,
  });

  const animatableElements = document.querySelectorAll<HTMLElement>('[data-animation]');
  animatableElements.forEach((el) => observer.observe(el));
});
</script>

