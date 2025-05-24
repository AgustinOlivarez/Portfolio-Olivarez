<template>
    <section class="p-2 max-w-8xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-teal-400">
            Tecnologías Utilizadas para este proyecto
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
