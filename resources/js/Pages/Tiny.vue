<script setup>
import Editor from "@tinymce/tinymce-vue";
</script>

<template>
  <main id="sample">
    <img
      alt="Link aja logo"
      class="logo"
      src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRpc73imblpGmkZJYUS5LQaIJ3JQTmJwl4NoQ&s"
      width="125"
      height="125"
    />
    <Editor
      api-key="xbt61wc0b6sbz9pvdnksq90g5fdtnz6lhhdgkhofet5164ph"
      :init="{
        plugins: 'lists link image table code help wordcount',
      }"
    />
  </main>
</template>

<style scoped>
.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  #sample {
    display: flex;
    flex-direction: column;
    place-items: center;
    width: 1000px;
  }
}
</style>
