<template>
    <div class="max-w-md mx-auto mt-10 p-6 bg-gray-900 rounded-2xl shadow-lg">
        <form @submit.prevent="submitForm" class="space-y-6">
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium text-gray-200"
                    >Nombre:</label
                >
                <input
                    type="text"
                    id="name"
                    v-model="name"
                    required
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium text-gray-200"
                    >Correo electrónico:</label
                >
                <input
                    type="email"
                    id="email"
                    v-model="email"
                    required
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label
                    for="message"
                    class="block text-sm font-medium text-gray-200"
                    >Mensaje:</label
                >
                <textarea
                    id="message"
                    v-model="message"
                    required
                    rows="4"
                    class="mt-1 w-full px-4 py-2 border border-gray-700 bg-gray-800 text-gray-100 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                ></textarea>
            </div>
            <button
                type="submit"
                class="w-full bg-blue-700 text-white py-2 px-4 rounded-lg hover:bg-blue-800 transition duration-200"
            >
                Enviar
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
            fetch("http://localhost:8000/api/contact", {
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
                        alert("Mensaje enviado correctamente");
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
</script>
