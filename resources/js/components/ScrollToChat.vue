<template>
  <button
    @click="scrollToTarget"
    class="fixed bottom-4 right-4 bg-teal-500 hover:bg-teal-600 text-white p-3 rounded-full shadow-lg transition-all z-50"
  >
    <i class="fas fa-comments"></i>
  </button>
</template>

<script setup lang="ts">
const scrollToTarget = () => {
  const el = document.getElementById('chat-section');
  if (el) {
    el.scrollIntoView({ behavior: 'smooth' });
  }
};
</script>
