<script setup lang="ts">
import ChatIA from './components/ChatIA.vue'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Presentacion from './components/Presentacion.vue'
import FormContacto from './components/FormContacto.vue'
import StackUtilizado from './components/StackUtilizado.vue'
import ScrollToChat from './components/ScrollToChat.vue'
</script>

<template>
  <header class="bg-gray-950 shadow p-6 flex justify-center">
    <Header />
  </header>
    <main id="chat-section">
    <ChatIA />
    <ScrollToChat />
  </main>
  <section id="info-section">
    <Presentacion />
  </section>
<section class="bg-gray-950 py-10 px-6 md:px-24">
  <div class="flex flex-col md:flex-row gap-8">
    <div id="form-section" class="w-full md:w-1/2">
      <StackUtilizado />
    </div>
    <div id="stack-section" class="w-full md:w-1/2">
      <FormContacto />
    </div>
  </div>
</section>

  <div>
    <Footer />
  </div>
</template>

