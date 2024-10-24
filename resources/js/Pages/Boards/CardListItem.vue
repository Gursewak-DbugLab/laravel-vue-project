<script setup>
import { PencilIcon } from "@heroicons/vue/24/outline";
import { computed, nextTick, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import { store } from "@/store";

const props = defineProps({
  card: Object,
});
const emit = defineEmits(["created"]);

async function showForm() {
  store.value.editingCardId = props.card.id;
  await nextTick();
  inputTitleRef.value.focus();
}

function onSubmit() {
  form.put(route("cards.update", { card: props.card.id }), {
    onSuccess: () => (store.editingCardId = null),
  });
}
const form = useForm({
  title: props.card.title,
});
const inputTitleRef = ref();

const isShowingForm = computed(
  () => props.card.id === store.value.editingCardId
);
</script>

<template>
  <li
    class="relative p-3 bg-white border-b border-gray-300 group shadow-rounded-md hover:border-gray-500"
  >
    <form
      @keydown.esc="isShowingForm = false"
      v-if="isShowingForm"
      @submit.prevent="onSubmit()"
      class="p-3 bg-gray-200 rounded-md"
    >
      <textarea
        v-model="form.title"
        ref="inputTitleRef"
        @keydown.enter.prevent="onSubmit()"
        rows="3"
        class="block w-full text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-400 focus:ring-blue-400"
        placeholder="Enter Card title..."
      ></textarea>
      <div class="mt-2 space-x-2">
        <Button
          type="submit"
          class="px-4 py=2 text-sm font-medium text-white bg-rose-600 hover:bg-rose-500 rounded-md shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
          >Save Card</Button
        >
        <Button
          type="button"
          @click="store.editingCardId = null"
          class="px-4 py=2 text-sm font-medium text-gray-700 hover:text-black rounded-md focus:ring-2 focus:ring-offset-2 focus:ring-rose-500 focus:outline-none"
          >Cancel</Button
        >
      </div>
    </form>
    <template v-if="!isShowingForm">
      <a href="#" class="text-sm">
        {{ card.title }}
      </a>
      <button
        @click="showForm()"
        class="absolute hidden w-8 h-8 text-gray-600 bg-gray-500 rounded-md group-hover:grid top-1 right-1 place-content-center hover:text-black hover:bg-gray-200"
      >
        <PencilIcon class="w-5 h-5" />
      </button>
    </template>
  </li>
</template>
