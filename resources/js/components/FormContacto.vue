<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-gray-900 rounded-2xl shadow-lg animate__animated overflow-x-hidden" data-animation="animate__fadeInRight">
        <form @submit.prevent="submitForm" class="space-y-6">
            <div>
                <h1 class="text-teal-400 text-lg font-semibold mb-3 text-center"><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Contactame</h1>
                <label
                    for="name"
                    class="block text-sm font-medium text-teal-400"
                    >Nombre:</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="name"
                    required
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
                />
            </div>
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-teal-400"
                    >Correo electrónico:</label
                >
                <input
                    type="email"
                    id="email"
                    v-model="email"
                    required
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
                />
            </div>
            <div>
                <label
                    for="message"
                    class="block text-sm font-medium text-teal-400"
                    >Mensaje:</label
                >
                <textarea
                    id="message"
                    v-model="message"
                    required
                    rows="4"
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400"
                ></textarea>
            </div>
            <button
                type="submit"
                class="w-full bg-teal-500 text-white py-2 px-4 rounded-lg hover:bg-teal-600 transition duration-200 justify-center inline-flex items-center space-x-2"
            >
                <i class="fas fa-paper-plane"></i>
                <span>Enviar</span>
            </button>
        </form>
    </div>
</template>

<script>
export default {
    data() {
        return {
            name: "",
            email: "",
            message: "",
        };
    },
    methods: {
        submitForm() {
            const apiBaseUrl = import.meta.env.VITE_API_BASE_URL;

            fetch(`${apiBaseUrl}/api/contact`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    nombre: this.name,
                    mail: this.email,
                    mensaje: this.message,
                }),
            })
                .then((res) => res.json())
                .then((data) => {
                    if (data.success) {
                        alert("Este formulario ha enviado un mail a mi correo, lo veré pronto");
                        this.name = "";
                        this.email = "";
                        this.message = "";
                    } else {
                        alert("Error al enviar el mensaje en data");
                    }
                })
                .catch((error) => {
                    console.error("Error:", error);
                    alert("Error al enviar el mensaje en catch");
                });
        },
    },
};


// Código JavaScript para activar la animación al hacer scroll
const observer = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;
      const animationClass = el.dataset.animation;
      el.classList.add(animationClass);
      observer.unobserve(el); // Opcional: evita que se repita
    }
  });
}, {
  threshold: 0.1 // 10% del elemento visible
});

// Observar los elementos que quieras animar
document.querySelectorAll('[data-animation]').forEach(el => {
  observer.observe(el);
});

</script>
