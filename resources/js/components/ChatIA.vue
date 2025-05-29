<template>
  <div class="h-auto bg-gray-950 text-slate-300 font-sans flex flex-wrap overflow-x-hidden">
    <section
      class="p-4 sm:p-6 flex-grow animate__animated animate__zoomIn w-full md:w-3/4"
    >
      <div
        class="bg-gray-900 p-3 sm:p-4 rounded-lg shadow-md h-[350px] sm:h-[500px] md:h-[600px] overflow-y-auto mb-3 sm:mb-4 space-y-2"
      >
        <div
          v-for="(msg, index) in messages"
          :key="index"
          :class="{ 'text-right': msg.from === 'user' }"
        >
          <p>
            <strong class="text-teal-400">{{ msg.from === "user" ? "Vos" : "Olibot" }}:</strong>
            {{ msg.text }}
          </p>
        </div>
      </div>

      <div class="flex flex-col gap-2 sm:flex-row sm:gap-0 sm:space-x-2">
        <!-- INPUT -->
        <input
          v-model="input"
          @keyup.enter="send"
          class="bg-gray-900 border border-slate-600 text-white p-2 rounded-lg placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500 text-sm w-full sm:w-7/12"
          placeholder="Escribí algo..."
        />

        <!-- BOTONES agrupados -->
        <div class="flex w-full sm:w-5/12 space-x-2">
          <button
            @click="send"
            class="bg-teal-500 text-white p-2 w-1/2 rounded-lg hover:bg-teal-600 inline-flex items-center justify-center space-x-2"
          >
            <i class="fas fa-paper-plane"></i>
            <span>Enviar</span>
          </button>
          <button
            @click="clearChat"
            class="bg-rose-900 text-white p-2 w-1/2 rounded-lg hover:bg-rose-950 inline-flex items-center justify-center space-x-2"
          >
            <i class="fas fa-trash-alt"></i>
            <span>Borrar Chat</span>
          </button>
        </div>
      </div>
    </section>


    <!-- Panel lateral de sugerencias -->
    <aside
      class="sugerencia hidden md:flex w-1/4 p-4 bg-gray-950 rounded-lg shadow-md h-[700px] flex-col justify-between animate__animated animate__fadeInRight"
    >
      <div>
        <h2 class="text-teal-400 text-lg font-semibold mb-3 border-b border-slate-600 pb-1 sm:text-base">
          Sugerencias de preguntas:
        </h2>
        <ul class="space-y-2 overflow-y-auto">
          <li
            v-for="(sugerencia, index) in sugerenciasVisibles"
            :key="index"
            @click="usarSugerencia(sugerencia)"
            class="cursor-pointer listPre"
          >
            <div class="pre bg-teal-500 mr-2"></div><p>{{ sugerencia }}</p>
          </li>
        </ul>
      </div>
      <!-- Botón scroll -->
      <div class="flex justify-center mt-4">
        <button
          @click="scrollToInfo"
          class="bg-teal-500 text-white py-2 px-5 rounded-lg hover:bg-teal-600 transition inline-flex items-center space-x-2"
        >
          <i class="fas fa-angle-double-down animate-bounce"></i>
          <span>Ver más sobre Agustín</span>
        </button>
      </div>
    </aside>
  </div>
</template>

<script setup lang="ts">
import { ref, onMounted } from "vue";

const messages = ref<{ from: string; text: string }[]>([]);
const input = ref("");
const infoSection = ref<HTMLElement | null>(null);

async function send() {
  if (!input.value.trim()) return;
    const apiBaseUrl = import.meta.env.VITE_API_BASE_URL;

  messages.value.push({ from: "user", text: input.value });

  const res = await fetch(`${apiBaseUrl}/api/chat`, {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ message: input.value }),
  });

  const data = await res.json();
  messages.value.push({ from: "ia", text: data.reply });
  input.value = "";
}

function clearChat() {
  messages.value = []; // Limpiar los mensajes del chat
}
const sugerencias = [
  "¿Cuál es el rol de Agustín en el Ejército Argentino?",
  "¿Qué tecnologías domina Agustín en el desarrollo web?",
  "¿Dónde estudia actualmente Agustín?",
  "¿Desde cuándo se dedica a la programación?",
  "¿Qué idiomas habla Agustín y con qué nivel?",
  "¿Cuáles son los intereses personales de Agustín fuera del trabajo?",
  "¿Qué tipo de música escucha Agustín y cuáles son sus artistas favoritos?",
  "¿Cuáles son los videojuegos favoritos de Agustín?",
  "¿Cómo se describe la personalidad de Agustín?",
  "¿Cuál es el artista favorito de Agustín?",
  "¿Cómo empezó Agustín a interesarse por la programación?",
  "¿Le gusta entrenar o ir al gimnasio?",
  "¿Cuál es el lugar donde nació y dónde vive ahora?",
  "¿Cuál es el equipo de fútbol de Agustín?",
  "¿Cuánto mide Agustín?",
  "¿Cuántos años tiene Agustín?",
  "¿Cómo lo puedo contactar?",
  "¿Cómo funciona este proyecto?",
];

const sugerenciasVisibles = ref<string[]>([]);

function obtener10SugerenciasAleatorias() {
  const mezcladas = [...sugerencias].sort(() => Math.random() - 0.5);
  sugerenciasVisibles.value = mezcladas.slice(0, 7);
}

function usarSugerencia(texto: string) {
  input.value = texto;
}

onMounted(() => {
  obtener10SugerenciasAleatorias();
  setInterval(obtener10SugerenciasAleatorias, 20000);
    messages.value.push({
    from: "ia",
    text: "Hola, soy Olibot, el asistente de Agus. Estoy entrenado para responderte cualquier pregunta sobre él o sobre este proyecto.",
    });
});

function scrollToInfo() {
  const target = document.getElementById("info-section");
  if (target) {
    target.scrollIntoView({ behavior: "smooth" });
  }
}

</script>

<style scoped>
.listPre {
    list-style: none;
    width: 100%;
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap');
    font-family: 'Roboto Condensed', sans-serif;
}
.listPre:hover {
    color: #fff ;
    transition: 0.3s;
}
.listPre:hover .pre {
    transition: 0.3s;
    width: 28px;
}
.listPre p{
    display: inline-block;
    width: 80%;
}
 .pre {
    clip-path: polygon(100% 0%, 83.46% 52.34%, 68.4% 100%, 0% 100%, 0% 0%);
    width: 20px;
    height: 10px;
    display: inline-block;
    vertical-align: top;
    margin-top: 7px;
    transition: 0.3s;
 }

</style>
