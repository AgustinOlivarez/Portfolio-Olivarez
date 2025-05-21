<script setup lang="ts">
import ChatIA from './components/ChatIA.vue'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Presentacion from './components/Presentacion.vue'
import FormContacto from './components/FormContacto.vue'
</script>

<template>
  <header class="bg-gray-950 shadow p-6 flex justify-center">
    <Header />
  </header>
    <main>
    <ChatIA />
  </main>
  <section id="info-section">
    <Presentacion />
  </section>
  <section id="form-section" class="bg-gray-950 py-20 px-6 md:px-24 text-white">
    <FormContacto />
  </section>
  <div>
    <Footer />
  </div>
</template>