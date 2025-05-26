<template>
    <section class="p-2 max-w-8xl mx-auto animate__animated overflow-hidden" data-animation="animate__fadeInRight">
        <h1 class="text-3xl font-bold mb-6 text-teal-400">
            <i class="fa fa-lightbulb mr-2" aria-hidden="true"></i>
            Idea del proyecto
        </h1>
        <p class="text-slate-400 mb-4 text-xl">
            La idea de este proyecto fue que crear una carta de presentación interactiva,
            en este caso utilizando la API de OpenAI para que el usuario pueda interactuar conmigo de una manera más dinámica,
            lo que me pareció muy original e innovador, espero que opines lo mismo y que te haya gustado.
        </p>
        <h1 class="text-3xl font-bold mb-6 text-teal-400">
            <i class="fa fa-wrench mr-2" aria-hidden="true"></i>
            Tecnologías utilizadas para este proyecto
        </h1>

        <div class="grid md:grid-cols-2 gap-6">
            <!-- Frontend -->
            <div class=" p-6 rounded-2xl shadow-lg">
                <h2
                    class="text-xl font-semibold mb-4 text-teal-400 flex items-center"
                >
                    <i class="fas fa-desktop mr-2"></i> Frontend
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-slate-400">
                        <i class="fab fa-vuejs text-teal-600 mr-3 fa-lg"></i>
                        Vue.js
                    </li>
                    <li class="flex items-center text-slate-400">
                        <img
                            :src="('@/../images/tailwind.svg')"
                            alt="Tailwind CSS"
                            class="w-5 h-5 mr-3"
                        />
                        Tailwind CSS
                    </li>
                </ul>
            </div>


            <!-- Backend -->
            <div class="p-6 rounded-2xl shadow-lg ">
                <h2
                    class="text-xl font-semibold mb-4 text-teal-400 flex items-center"
                >
                    <i class="fas fa-server mr-2"></i> Backend
                </h2>
                <ul class="space-y-3">
                    <li class="flex items-center text-slate-400">
                        <i class="fab fa-laravel text-red-500 mr-3 fa-lg"></i>
                        Laravel
                    </li>
                    <li class="flex items-center text-slate-400">
                        <i class="fab fa-php text-indigo-500 mr-3 fa-lg"></i>
                        PHP
                    </li>
                    <li class="flex items-center text-slate-400">
                        <i class="fas fa-database text-blue-500 mr-3 fa-lg"></i>
                        MySQL
                    </li>
                </ul>
            </div>
        </div>
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